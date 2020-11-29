<?php

namespace App\Http\Controllers;

use App\Event;
use App\Product;
use App\Invoice;
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
        $events = Event::with(['user', 'invoice'])->latest('created_at')->paginate(15);
        return view('pages.events.list', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['plans'] = Product::where('category', 'room')->get();
    		$data['users'] = User::all();
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
            'product_id' => 'required',
		        'payment_method' => 'required',
        ]);

    		$product = Product::find($request->product_id);

    		if ($request->payment_method == 'Cash') {
    			$status = 'Confirmed';
    		} else {
    			$status = 'On Process';
    		}
        //dd($request->user_id);

        $event = new Event([
        'user_id' => $request->user_id,
        'start_date' => date('Y-m-d'),
        'end_date' => date('Y-m-d', strtotime(($product->name == 'Week')?'+1 week':'+1 month')),
        ]);
        $event->save();
        $event->invoice()->create([
         'user_id' => $request->user_id,
         'product_id'=> $product->id,
         'total'=> $product->price,
         'payment_method'=> $request->payment_method,
         'note'=> $request->note,
         'status'=> $status,
        ]);
        $event->save();

        return redirect('manage/events')->with('success', 'Event has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $event->load(['user', 'invoice']);

        return view('pages.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
  			'user_id' => 'required',
  			'plan_id' => 'required',
    		'invoice_id' => 'required',
        ]);

      	if (Plan::find($request->plan_id)->plan_name == 'Week') {
    			$enddate = '+1 week';
    		} else {
    			$enddate = '+1 month';
    		}

    		$event = Event::find($id);
    		$event->user_id = $request->get('user_id');
  			$event->plan_id = $request->get('plan_id');
  			$event->invoice_id = $request->get('invoice_id');
  			$event->start_date = date('Y-m-d');
  			$event->end_date = date('Y-m-d', strtotime($enddate));

        $event->update();

		return redirect('manage/events')->with('success', 'Event has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
         return redirect('manage/events')->with('success', 'Mmebership deleted successfully');
    }
}
