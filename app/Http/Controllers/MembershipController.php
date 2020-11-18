<?php

namespace App\Http\Controllers;

use App\Membership;
use App\Plan;
use App\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::all();
        return view('pages.memberships.list', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['plans'] = Plan::all();
		$data['users'] = User::all();
		$data['invoices'] = Invoice::all();
        return view('pages.memberships.create', $data);
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
            'plan_id' => 'required',
			'invoice_id' => 'required',
        ]);
		
		if (Plan::find($request->plan_id)->plan_name == 'Week') {
			$enddate = '+1 week';
		} else {
			$enddate = '+1 month';
		}
		
		$membership = new Membership([
             'user_id' => $request->get('user_id'),
             'plan_id'=> $request->get('plan_id'),
			 'invoice_id'=> $request->get('invoice_id'),
			 'start_date' => date('Y-m-d'),
			 'end_date' => date('Y-m-d', strtotime($enddate)),
         ]);

         $membership->save();
		
		/* Membership::create(array('user_id' => $request->user_id, 'plan_id' => $request->plan_id,'invoice_id' => $request->invoice_id, 'start_date' => date('Y-m-d'), 'end_date' => date('Y-m-d', strtotime($enddate)))); */
        return redirect('manage/memberships')->with('success', 'Membership has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        $data['plans'] = Plan::all();
    	$data['users'] = User::all();
		$data['invoices'] = Invoice::all();

        return view('pages.memberships.edit',$data, compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membership  $membership
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

    		$membership = Membership::find($id);
    		$membership->user_id = $request->get('user_id');
			$membership->plan_id = $request->get('plan_id');
			$membership->invoice_id = $request->get('invoice_id');
			$membership->start_date = date('Y-m-d');
			$membership->end_date = date('Y-m-d', strtotime($enddate));

        $membership->update();

		return redirect('manage/memberships')->with('success', 'Membership has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        $membership->delete();
         return redirect('manage/memberships')->with('success', 'Mmebership deleted successfully');
    }
}
