<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('date', '>=', now())->orderBy('date')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date|after:now',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'max_capacity' => 'required|integer|min:1',
        ]);

        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Événement créé.');
    }
}