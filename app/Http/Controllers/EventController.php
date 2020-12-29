<?php

namespace App\Http\Controllers;

use App\Event;
use App\Product;
use App\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    		$events = Event::with(['user', 'invoice'])->latest('created_at')->paginate(5);
        return view('pages.events.list', compact('events'));
    }

	public function calendar()
    {
		    $events = Event::all();
        return view('pages.events.calendar', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = Product::where('category', 'room')->get();
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

        // menyimpan data file yang diupload ke variabel $file
    		$file = $request->file('image');

    		$file_name = time()."_".$file->getClientOriginalName();

    		// isi dengan nama folder tempat kemana file diupload
    		$upload_folder = 'receipt';
    		$file->move($upload_folder,$file_name);
			
        // dd($file_name);
        $event = new Event([
           'user_id' => $request->get('user_id'),
		   'organizer' => $request->get('organizer'),
        	 'date'=> $request->get('date'),
           'start_time' => $request->get('start_time'),
           'end_time'=> $request->get('end_time'),
        	 'event_name' => $request->get('event_name'),
        	 'description' => $request->get('description'),
			 'rundown' => $request->get('rundown'),
        	 'event_type' => $request->get('event_type'),
			 'event_category' => $request->get('event_category'),
        	 'total_seats' => $request->get('total_seats'),
        	 'layout_seat' => $request->get('layout_seat'),
			 'facilities' => json_encode($request->get('facilities')),
           'image'=> $file_name,
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
        $event->status = ($event->invoice->status == 'Confirmed') ? 'Active' : 'Deactive';
        $event->save();

		$invoice = $event->invoice;
		
		$user = Auth::user();

        if ($user->isAdmin()) {
            return redirect('manage/events')->with('success', 'Event has been added');
        }
        return view('pages.invoices.confirmation', compact('invoice'));
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
        $data['products'] = Product::where('category', 'room')->get();
        // dd($event);

        return view('pages.events.edit', $data, compact('event'));
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
        // menyimpan data file yang diupload ke variabel $file
    		$file = $request->file('image');

    		$file_name = time()."_".$file->getClientOriginalName();

    		// isi dengan nama folder tempat kemana file diupload
    		$upload_folder = 'receipt';
    		$file->move($upload_folder,$file_name);

        $data = [
           'user_id' => $request->get('user_id'),
           'date'=> $request->get('date'),
           'time' => $request->get('time'),
           'duration'=> $request->get('duration'),
           'event_name' => $request->get('event_name'),
           'description' => $request->get('description'),
           'event_type' => $request->get('event_type'),
           'total_seats' => $request->get('total_seats'),
           'layout_seat' => $request->get('layout_seat'),
           'facilities' => json_encode($request->get('facilities')),
           'image'=> $file_name,
        ];
        $event = $data;
        $event->update();

		return redirect('manage/events')->with('success', 'Event has been updated');
    }
	
	 public function show(Event $event)
    {
       return view('pages.events.show',compact('event'));
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
