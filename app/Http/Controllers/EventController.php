<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
//        return $events;
        return view('pages.event.index', compact($events));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->events()->create([
            'user_id' =>auth()->user()->id,
            'name'=> $request->event['name'],
            'date' => $request->event['date'],
            'slots' => $request->event['slots']
        ]);

//        return "Event saved successfully!";
        return redirect(route('events.index'))->with('message', 'Event saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $this->abortUnless($event);


        return view('pages.event.create', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Event $event)
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $this->abortUnless($event);
        if ($event){
            $event->update([
                'user_id' =>auth()->user()->id,
                'name'=> $request->event['name'],
                'date' => $request->event['date'],
                'slots' => $request->event['slots']
            ]);
//            return "Event updated successfully!";
            return redirect(route('events.index'))->with('message', 'Event updated successfully!');
        }
//        return "Event not found!";
        return redirect(route('events.index'))->with('message', 'Event not found!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Event $event)
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $this->abortUnless($event);
        if ($event){
            $event->delete();
//            return "Event deleted successfully.";
            return redirect()->back()->with('message', 'Event deleted successfully.');
        }
//        return "Event not found!";
        return redirect()->back()->with('message', 'Event not found!');
    }

    public function abortUnless($event)
    {
        abort_unless(auth()->user()->owns($event), 403);
    }
}
