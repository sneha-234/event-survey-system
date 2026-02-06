<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Survey;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'event_date' => 'required|date',
            'mode' => 'required'
        ]);

        Event::create([
            'name' => $request->name,
            'event_date' => $request->event_date,
            'mode' => $request->mode
        ]);

        return redirect()->route('events.index')
                         ->with('success', 'Event created successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
                        ->with('success', 'Event deleted successfully');
    }

    
public function dashboard()
{
    $events = Event::with('survey')->get();
    return view('admin.events-dashboard', compact('events'));
}

public function assignSurvey(Event $event)
{
    $surveys = Survey::all();
    return view('admin.assign-survey', compact('event','surveys'));
}

public function saveSurvey(Request $request, Event $event)
{
    $request->validate([
        'survey_id' => 'required|exists:surveys,id'
    ]);

    $event->survey_id = $request->survey_id;
    $event->save();

    return redirect()->back()->with('success','Survey assigned successfully');
}

}
