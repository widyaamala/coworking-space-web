<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Models\User;
use App\Plan;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('pages.invoices.list', compact('invoices'));
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
        return view('pages.invoices.create', $data);
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
			'payment_method' => 'required',
        ]);

		$plan = Plan::find($request->plan_id);
		$total = $plan->price;

		if ($request->payment_method == 'Cash') {
			$status = 'Confirmed';
		} else {
			$status = 'On Process';
		}

		$invoice = new Invoice([
             'user_id' => $request->get('user_id'),
             'plan_id'=> $request->get('plan_id'),
             'total'=> $total,
			 'payment_method'=> $request->get('payment_method'),
             'status'=> $status,
         ]);

         $invoice->save();

		return redirect('manage/invoices')->with('success', 'Invoice has been added');
    }

	public function postInvoice(Request $request)
    {
        $request->validate([
			'user_id' => 'required',
            'plan_id' => 'required',
			'payment_method' => 'required',
        ]);

		$plan = Plan::find($request->plan_id);
		$total = $plan->price;

		if ($request->payment_method == 'Cash') {
			$status = 'Confirmed';
		} else {
			$status = 'On Process';
		}

		$invoice = new Invoice([
             'user_id' => $request->get('user_id'),
             'plan_id'=> $request->get('plan_id'),
             'total'=> $total,
			 'payment_method'=> $request->get('payment_method'),
             'status'=> $status,
         ]);

         $invoice->save();

		return view('pages.invoices.confirmation', compact('invoice'));
    }

	public function confrimation(Invoice $invoice)
    {
        $invoice = Invoice::all();
        return view('pages.invoices.confirmation', compact('invoice'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
    		$data['plans'] = Plan::all();
    		$data['users'] = User::all();

        return view('pages.invoices.edit',$data, compact('invoice'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

    	$request->validate([
    		'user_id' => 'required',
			'plan_id' => 'required',
    		'payment_method' => 'required',
        ]);

    		$plan = Plan::find($request->plan_id);
    		$total = $plan->price;
			//dd($total);

    		if ($request->payment_method == 'Cash') {
    			$status = 'Confirmed';
    		} else {
    			$status = 'On Process';
    		}

    	$invoice = Invoice::find($id);
    	$invoice->user_id = $request->get('user_id');
        $invoice->plan_id = $request->get('plan_id');
        $invoice->total = $total;
    	$invoice->payment_method = $request->get('payment_method');
        $invoice->status = $status;

        $invoice->update();

		return redirect('manage/invoices')->with('success', 'Invoice has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
         return redirect('manage/invoices')->with('success', 'Invoice deleted successfully');
    }
}
