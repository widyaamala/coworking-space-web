<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Product;
use App\Invoice;
use App\Room;
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
        return view('frontend.home');
    }

    public function index()
    {
        $products = Product::all();
        return view('frontend.index', compact('products'));
    }

	public function room()
    {
        $rooms = Room::all();
        return view('frontend.room', compact('rooms'));
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
        $room = Room::find($id);
        $user = Auth::user();

        if(Auth::guest()){
          return Redirect::guest("login")->withSuccess('You have to login first');
        }
        return view('frontend.reservation', compact('room'));
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
