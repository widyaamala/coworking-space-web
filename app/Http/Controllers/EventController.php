<?php

namespace App\Http\Controllers;

use App\Event;
use App\Room;
use App\Models\User;
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
        return view('pages.events.list', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::all();
		$data['rooms'] = Room::all();
        return view('pages.events.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'user_id' => 'required',
            'room_id' => 'required',
			'date' => 'required',
            'time' => 'required',
			'duration' => 'required',
			'event_name' => 'required',
			'description' => 'required',
			'event_type' => 'required',
			'total_seats' => 'required',
			'layout_seat' => 'required',
			'facilities' => 'required',
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'status' => 'required',
        ]);
		
		$room = Room::find($request->room_id);
		$room_name = $room->room_name;
		
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('image');
		
		$file_name = time()."_".$file->getClientOriginalName();
		
		// isi dengan nama folder tempat kemana file diupload
		$upload_folder = 'receipt';
		$file->move($upload_folder,$file_name);
		
		$event = new Event([
             'user_id' => $request->get('user_id'),
             'room_id'=> $request->get('room_id'),
			 'room_name' => $room_name,
			 'date'=> $request->get('date'),
             'time' => $request->get('time'),
             'duration'=> $request->get('duration'),
			 'event_name' => $request->get('event_name'),
			 'description' => $request->get('description'),
			 'event_type' => $request->get('event_type'),
			 'total_seats' => $request->get('total_seats'),
			 'layout_seat' => $request->get('layout_seat'),
			 'facilities' => $request->get('facilities'),
             'image'=> $file_name,
			 'status' => $request->get('status'),
         ]);
		 
		 $event->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
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
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
