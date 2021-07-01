<?php

namespace App\Http\Controllers;

use App\Models\phone;
use Illuminate\Http\Request;

class phonesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = phone::latest('id')->get();
        $cont = 0;
        return view('phones/index',compact('phones','cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
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
            "tipsphones_id" => 'required | numeric',
            "name" => 'required | min:5',
            "ram" => 'required | numeric',
            "SSD" => 'required | numeric',
            "color" => 'required'
        ]);


        phone::create($request->all());
        return redirect('telefonos')->with('status','store');

    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phone = phone::find($id);
        return view('phones.show',compact('phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = phone::find($id);
        return view('phones.edit',compact('phone'));
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
        
        $request->validate([
            "tipsphones_id" => 'required | numeric',
            "name" => 'required | min:5',
            "ram" => 'required | numeric',
            "SSD" => 'required | numeric',
            "color" => 'required'
        ]);

        $phone = phone::find($id);
        $phone->update($request->all());

        return redirect('telefonos')->with('status','update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        phone::destroy($id);
        return redirect('/telefonos')->with('status','destroy');

    }

}
