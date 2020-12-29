<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Models\User;
use App\Product;
use App\Membership;
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
        $invoices = Invoice::with(['user', 'product'])->latest('created_at')->paginate(5);
        //dd($invoices);
        return view('pages.invoices.list', compact('invoices'));
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

        if($product->category == 'membership') {
           $membership = new Membership([
            'user_id' => $request->user_id,
            'start_date' => date('Y-m-d'),
            'end_date' => date('Y-m-d', strtotime(($product->name == 'Weekly')?'+1 week':'+1 month')),
           ]);
           $membership->save();
           $membership->invoice()->create([
             'user_id' => $request->user_id,
             'product_id'=> $product->id,
             'total'=> $product->price,
             'payment_method'=> $request->payment_method,
             'note'=> $request->note,
             'status'=> $status,
           ]);
           $membership->status = ($membership->invoice->status == 'Confirmed') ? 'Active' : 'Deactive';
           $membership->save();
           $invoice = $membership->invoice;
        } else {
  	      $invoice = new Invoice([
               'user_id' => $request->user_id,
               'product_id'=> $product->id,
               'total'=> $product->price,
  		         'payment_method'=> $request->payment_method,
               'status'=> $status,
               'status'=> $status,
               'status'=> $status,
           ]);
           $invoice->save();
        }

	      return redirect('manage/invoices')->with('success', 'Invoice has been added');
    }

	public function postInvoice(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'user_id' => 'required',
            'product_id' => 'required',
            'payment_method' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $product = Product::find($request->product_id);

        if ($request->payment_method == 'Cash') {
    			$status = 'Confirmed';
    		} else {
    			$status = 'On Process';
    		}

        //dd($request->user_id);

        if($product->category == 'membership') {
           $membership = new Membership([
            'user_id' => $request->user_id,
            'start_date' => date('Y-m-d'),
            'end_date' => date('Y-m-d', strtotime(($product->name == 'Weekly')?'+1 week':'+1 month')),
           ]);
           $membership->save();
           $membership->invoice()->create([
             'user_id' => $request->user_id,
             'product_id'=> $product->id,
             'total'=> $product->price,
             'payment_method'=> $request->payment_method,
             'note'=> $request->note,
             'status'=> $status,
           ]);
           $membership->status = ($membership->invoice->status == 'Confirmed') ? 'Active' : 'Deactive';
           $membership->save();
           $invoice = $membership->invoice;
           Mail::to($membership->user->email)->send(new InvoiceGenerated($invoice));
        } else {
          $invoice = new Invoice([
               'user_id' => $request->user_id,
               'product_id'=> $product->id,
               'total'=> $product->price,
               'payment_method'=> $request->payment_method,
               'status'=> $status,
               'status'=> $status,
               'status'=> $status,
           ]);
           $invoice->save();
           Mail::to($invoice->user->email)->send(new InvoiceGenerated($invoice));
        }
	      return view('pages.invoices.confirmation', compact('invoice'));
    }

	public function confirmation(Invoice $invoice)
    {
        //$invoice = Invoice::all();
        return view('pages.invoices.confirmation', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
    		$invoice->load(['user', 'product']);
        //dd($invoice->product->category);
        return view('pages.invoices.edit', compact('invoice'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
    	 $invoice->status = $request->get('status');
       $invoice->update();

       if($invoice->product->category == 'membership' || $invoice->product->category == 'room') {
         $membership = $invoice->invoicable;
         $membership->status = ($request->get('status') == 'Confirmed') ? 'Active' : 'Deactive';
         $membership->update();
       }

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
