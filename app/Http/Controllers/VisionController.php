<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisionCreate;
use App\Http\Requests\VisionEdit;
use App\Models\CheckUp;
use App\Models\OpticianDetail;
use App\Models\Vision;
use App\User;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visions = Vision::all();

        return view('admin.interfaces.vision.index',compact('visions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkup = CheckUp::pluck('id')->all();
        $optician = OpticianDetail::pluck('shop_name','id')->all();
        $patient = User::where('type','patient')->pluck('name','id')->all();
        return view('admin.interfaces.vision.create',compact('optician','patient','checkup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisionCreate $request)
    {
        Vision::create($request->all());

        return redirect('/vision');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visions = Vision::findOrFail($id)->all();

        return view('admin.interfaces.vision.show',compact('visions'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vision = Vision::findORFail($id);
        $checkup = CheckUp::pluck('id')->all();
        $optician = OpticianDetail::pluck('shop_name','id')->all();
        $patient = User::where('type','patient')->pluck('name','id')->all();

        return view('admin.interfaces.vision.edit',compact('vision','checkup','optician','patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisionEdit $request, $id)
    {
        $vision  = Vision::findOrFail($id);

        $vision->update($request->all());

        return redirect('/vision');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
