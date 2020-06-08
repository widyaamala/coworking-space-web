<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Plan;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('frontend.index', compact('plans'));
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
        $order = Plan::find($id);
        $user = Auth::user();

        if(Auth::guest()){
          return Redirect::guest("login")->withSuccess('You have to login first');
        }
        return view('frontend.checkout', $order, compact('order'));
    }
}
