<?php

namespace App\Http\Controllers;

use App\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
			'company' => 'required',
			'partner_type' => 'required',
			'proposal' => 'required|file|image|mimes:pdf,zip,xlx,csv|max:2048',
			
        ]);
		
		
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('image');
		
		$file_name = time()."_".$file->getClientOriginalName();
		
		// isi dengan nama folder tempat kemana file diupload
		$upload_folder = 'uploads';
		$file->move($upload_folder,$file_name);
		
		$partnership = new Partnership([
             'user_id' => $request->get('user_id'),
             'company'=> $request->get('company'),
			 'partner_type' => $request->get('partner_type'),
             'proposal'=> $file_name,
         ]);

         $partnership->save();
		 
		 return redirect('partnership')->with('success', 'Partnership has been requested');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partnership  $partnership
     * @return \Illuminate\Http\Response
     */
    public function show(Partnership $partnership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partnership  $partnership
     * @return \Illuminate\Http\Response
     */
    public function edit(Partnership $partnership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partnership  $partnership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partnership $partnership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partnership  $partnership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partnership $partnership)
    {
        //
    }
}
