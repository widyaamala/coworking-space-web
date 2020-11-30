<?php

namespace App\Http\Controllers;

use App\Membership;
use App\Product;
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
        $memberships = Membership::with(['user', 'invoice'])->latest('created_at')->paginate(15);
        return view('pages.memberships.list', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['plans'] = Product::where('category', 'membership')->get();
    		$data['users'] = User::all();
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

        return redirect('manage/memberships')->with('success', 'Membership has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        $membership->load(['user', 'invoice']);

        return view('pages.memberships.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
  	   $membership->status = $request->get('status');
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
