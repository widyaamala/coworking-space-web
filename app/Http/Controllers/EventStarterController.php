<?php

namespace App\Http\Controllers;

use App\EventStarter;
use App\Product;
use App\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;

class EventStarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventStarters = EventStarter::with(['user'])->latest('created_at')->paginate(15);
        return view('pages.event-starters.list', compact('eventStarters'));
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
        $request->validate([
			'user_id' => 'required',
			'organizer' => 'required',
			'schedule_plan' => 'required',
			'event_name' => 'required',
			'description' => 'required',
			'rundown' => 'required',
			'event_type' => 'required',
			'event_category' => 'required',
			'min_participant' => 'required',
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			
        ]);
		
		
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('image');
		
		$file_name = time()."_".$file->getClientOriginalName();
		
		// isi dengan nama folder tempat kemana file diupload
		$upload_folder = 'uploads';
		$file->move($upload_folder,$file_name);
		
		$eventStarter = new EventStarter([
             'user_id' => $request->get('user_id'),
             'organizer'=> $request->get('organizer'),
			 'schedule_plan' => $request->get('schedule_plan'),
			 'event_name' => $request->get('event_name'),
             'description'=> $request->get('description'),
			 'rundown' => $request->get('rundown'),
			 'event_type' => $request->get('event_type'),
             'event_category'=> $request->get('event_category'),
			 'min_participant' => $request->get('min_participant'),
             'image'=> $file_name,
         ]);

         $eventStarter->save();
		 
		 return redirect('manage/eventStarters')->with('success', 'Event has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventStarter  $eventStarter
     * @return \Illuminate\Http\Response
     */
    public function show(EventStarter $eventStarter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventStarter  $eventStarter
     * @return \Illuminate\Http\Response
     */
    public function edit(EventStarter $eventStarter)
    {
        $eventStarter->load(['user']);
        //dd($invoice->product->category);
        return view('pages.event-starters.edit', compact('eventStarter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventStarter  $eventStarter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventStarter $eventStarter)
    {
        $eventStarter->status = $request->get('status');
       $eventStarter->update();


	     return redirect('manage/eventStarters')->with('success', 'Event Starter has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventStarter  $eventStarter
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventStarter $eventStarter)
    {
        //
    }
}
