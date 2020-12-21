<?php

namespace App\Http\Controllers;

use App\EventStarter;
use App\Product;
use App\Invoice;
use App\Participant;
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
		
		 $validator = Validator::make(
            $request->all(),
            [
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

        ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        


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

		 return redirect(route('daftar-event'))->with('success', 'Event Starter has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventStarter  $eventStarter
     * @return \Illuminate\Http\Response
     */
    public function show(EventStarter $eventStarter)
    {
       return view('pages.event-starters.show',compact('eventStarter'));
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
	
	public function reschedule(EventStarter $eventStarter)
    {
        $eventStarter->load(['user']);
        //dd($invoice->product->category);
        return view('pages.event-starters.reschedule', compact('eventStarter'));
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
		
		$eventStarter->schedule_plan = $request->get('schedule_plan');
		$eventStarter->status = $request->get('status');
		$eventStarter->save();


	     return redirect(route('detail-event', ['eventStarter' => $eventStarter->id]));
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

    public function join(EventStarter $eventStarter)
    {
        $participant = new Participant([
          'user_id' => Auth::user()->id,
          'event_starter_id' => $eventStarter->id
        ]);
        $participant->save();

        return redirect(route('detail-event', ['eventStarter' => $eventStarter->id]))->with('success', 'You joined this event');
    }
}
