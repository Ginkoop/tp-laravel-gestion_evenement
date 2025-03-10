<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Mail\ConfirmationInscription;
use Illuminate\Support\Facades\Mail;

//Mail::to(Auth::user()->email)->send(new ConfirmationInscription($event));

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required|string',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
    }

    public function show(Event $event)
    {
        $isRegistered = $event->participants()->where('user_id', auth()->id())->exists();

        return view('events.show', compact('event', 'isRegistered'));
    }

    public function register(Event $event)
    {
        Auth::user()->registrations()->attach($event->id);
        return back()->with('success', 'Inscription réussie !');
    }

}

