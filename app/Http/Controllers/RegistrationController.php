<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create($event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('registrations.create', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $event = Event::find($request->event_id);
        if ($event->registrations()->count() >= $event->max_capacity) {
            return redirect()->back()->with('error', 'Capacité maximale atteinte.');
        }

        Registration::create($request->all());
        return redirect()->route('events.index')->with('success', 'Inscription réussie.');
    }
}