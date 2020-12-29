<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Product;
use App\Invoice;
use App\Event;
use App\EventStarter;
use App\Participant;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function home()
    {
		$events = Event::whereStatus('active')->paginate(3);
        return view('frontend.home' , compact('events'));
    }

    public function index()
    {
		$products = Product::whereType('general membership')->get();
        return view('frontend.index', compact('products'));
    }

	public function office()
    {
		$products = Product::whereType('private')->get();
        return view('frontend.private-office', compact('products'));
    }

	public function room()
    {
        $products = Product::whereCategory('room')->get();
        return view('frontend.room', compact('products'));
    }

	public function partnership()
    {

        return view('frontend.partnership');
    }

	public function eventStarter()
    {
		if(Auth::guest()){
				return Redirect::guest("login")->withSuccess('You have to login first');
			}
        return view('frontend.event-starter');
    }

	public function eventDetail(EventStarter $eventStarter)
    {
			if(Auth::guest()){
				return Redirect::guest("login")->withSuccess('You have to login first');
			}
			$eventStarter->load('participants');
			$joined = $eventStarter->participants()->where('user_id', Auth::user()->id)->first();
			// dd($joined);
	    return view('frontend.detail-event', compact('eventStarter', 'joined'));
    }

	public function daftarEvent()
    {
		$eventStarters = EventStarter::whereStatus('confirmed')->get();
        return view('frontend.daftar-event', compact('eventStarters'));
    }

	public function calendar()
    {
		    $events = Event::all();
        return view('home', compact('events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        return view('frontend.plan',compact('plan'));
    }

    public function checkout($id)
    {
        $product = Product::find($id);

        if(Auth::guest()){
          return Redirect::guest("login")->withSuccess('You have to login first');
        }
        return view('frontend.checkout', compact('product'));
    }

	public function reserve($id)
    {
        $product = Product::find($id);

        if(Auth::guest()){
          return Redirect::guest("login")->withSuccess('You have to login first');
        }
        return view('frontend.reservation', compact('product'));
    }

	public function confirmPayment($id)
    {
        $invoice = Invoice::find($id);

        if(Auth::guest()){
          return Redirect::guest("login")->withSuccess('You have to login first');
        }
        return view('frontend.confirm-payment', compact('invoice'));
    }
}
