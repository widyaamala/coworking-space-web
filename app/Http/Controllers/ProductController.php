<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         $products = Product::latest('created_at')->paginate(5);
         return view('pages.products.list', compact('products'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
         return view('pages.products.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
		 
		 $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            'description' => 'required',
		        'category' => 'required',
				'price' => 'required',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
         $product = new Product;
         $product->fill($request->all());
         $product->save();

         return redirect('/manage/products')->with('success', 'Product has been added');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function show(Product $product)
     {
         //
         return view('pages.products.view',compact('product'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function edit(Product $product)
     {
         //
         return view('pages.products.edit',compact('product'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Product $product)
     {
         $product->fill($request->all());

         $product->update();

         return redirect('/manage/products')->with('success', 'Product updated successfully');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function destroy(Product $product)
     {
         //
         $product->delete();
         return redirect('/manage/products')->with('success', 'Product deleted successfully');
     }

	 public function orderproduct($id){
		$order = Product::find($id);
		$user = Auth::user();

        if(Auth::guest()){
        return Redirect::guest("login")->withSuccess('You have to login first');
      }
        return view('pages.products.order', $order, compact('order'));
	 }
}
