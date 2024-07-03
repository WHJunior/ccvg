<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        if ($event->save()) {
            // $eventData = $request->all(); // ou processar os dados conforme necessário

            // $googleEventData = [
            //     'summary' => $eventData['name'],
            //     'location' => $eventData['location'],
            //     'description' => $eventData['description'],
            //     'start' => [
            //         'dateTime' => $eventData['date'],
            //         'timeZone' => 'America/Sao_Paulo',
            //     ],
            //     'end' => [
            //         'dateTime' => $eventData['date'],
            //         'timeZone' => 'America/Sao_Paulo',
            //     ],
            // ];
            // $this->googleCalendarService->createEvent($googleEventData);
            return redirect('event');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return view('event.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('event.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        if ($event->save()) {
            return redirect('event');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        if ($event->delete()) {
            return redirect('event');
        }
    }
}