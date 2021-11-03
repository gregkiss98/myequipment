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
        $events = auth()->user()->evets()->get();
        return $events;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return "Event saved successfully";
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
        //
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
            return "Event updated successfully!";
        }
        return "Event not found!";
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
            return "Event deleted successfully.";
        }
        return "Event not found!";
    }

    public function abortUnless($event)
    {
        abort_unless(auth()->user()->owns($event), 403);
    }
}
