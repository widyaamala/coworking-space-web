<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Invoice;
use App\Models\User;
use App\Product;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(5);
        return view('pages.payments.list', compact('payments'));
    }
	
	public function postConfirmation(Request $request)
	{
		$request->validate([
			'user_id' => 'required',
			'invoice_id' => 'required',
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'from_bank' => 'required',
            'acc_name' => 'required',
			'acc_number' => 'required',
			'to_bank' => 'required',
			'date' => 'required',
        ]);
		
		$total_invoice = Invoice::find($request->invoice_id);
		$total = $total_invoice->total;
		
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('image');
		
		$file_name = time()."_".$file->getClientOriginalName();
		
		// isi dengan nama folder tempat kemana file diupload
		$upload_folder = 'receipt';
		$file->move($upload_folder,$file_name);
		
		$payment = new Payment([
             'user_id' => $request->get('user_id'),
             'product_id'=> $request->get('product_id'),
			 'invoice_id' => $request->get('invoice_id'),
             'image'=> $file_name,
			 'from_bank'=> $request->get('from_bank'),
             'acc_name' => $request->get('acc_name'),
             'acc_number'=> $request->get('acc_number'),
			 'to_bank' => $request->get('to_bank'),
			 'total' => $total,
			 'date' => $request->get('date'),
         ]);

         $payment->save();
		 
		 $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect('manage/payments')->with('success', 'Payment has been added');
        }
        return view('frontend.complete-payment', compact('payment'));
	
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = Product::all();
		$data['users'] = User::all();
		$data['invoices'] = User::all();
        return view('pages.payments.create', $data);
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
			'invoice_id' => 'required',
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'from_bank' => 'required',
            'acc_name' => 'required',
			'acc_number' => 'required',
			'to_bank' => 'required',
			'total' => 'required',
        ]);
		
		$total_invoice = Invoice::find($request->invoice_id);
		$total = $total_invoice->total;
		
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('image');
		
		$file_name = time()."_".$file->getClientOriginalName();
		
		// isi dengan nama folder tempat kemana file diupload
		$upload_folder = 'receipt';
		$file->move($upload_folder,$file_name);
		
		$payment = new Payment([
             'user_id' => $request->get('user_id'),
             'product_id'=> $request->get('product_id'),
			 'invoice_id' => $request->get('invoice_id'),
             'image'=> $file_name,
			 'from_bank'=> $request->get('from_bank'),
             'acc_name' => $request->get('acc_name'),
             'acc_number'=> $request->get('acc_number'),
			 'to_bank' => $request->get('to_bank'),
			 'total' => $total,
         ]);

         $payment->save();
		 
		 return redirect('manage/payments')->with('success', 'Payment has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('user'));
    }
	
	public function confirm(Request $request, $id)
	{
		$request->validate([
			'user_id' => 'required',
            'product_id' => 'required',
			'invoice_id' => 'required',
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'from_bank' => 'required',
            'acc_name' => 'required',
			'acc_number' => 'required',
			'to_bank' => 'required',
			'total' => 'required',
        ]);
		
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('image');
		
		$file_name = time()."_".$file->getClientOriginalName();
		
		// isi dengan nama folder tempat kemana file diupload
		$upload_folder = 'receipt';
		$file->move($upload_folder,$file_name);
		
		$status = 'Confirmed';
		
		$payment = Payment::find($id);
		$payment->user_id = $request->get('user_id');
		$payment->product_id= $request->get('product_id');
		$payment->invoice_id = $request->get('invoice_id');
        $payment->image= $file_name;
		$payment->from_bank= $request->get('from_bank');
        $payment->acc_name = $request->get('acc_name');
        $payment->acc_number = $request->get('acc_number');
		$payment->to_bank = $request->get('to_bank');
		$payment->total = $request->get('total');
		$payment->status = $status;
		
		$payment->update();
		 
		 return redirect('manage/payments')->with('success', 'Payment has been updated');
		
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
         return redirect('manage/payments')->with('success', 'Payment deleted successfully');
    }
}
