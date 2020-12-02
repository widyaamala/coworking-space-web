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
		$products = Product::whereCategory('membership')->get();
        return view('frontend.index', compact('products'));
    }

	public function room()
    {
        $products = Product::whereCategory('room')->get();
        return view('frontend.room', compact('products'));
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
