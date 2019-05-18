<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckupCreate;
use App\Http\Requests\CheckupEdit;
use App\Models\CheckUp;
use App\Models\OpticianDetail;
use App\Models\PatientDetail;
use App\User;
use Illuminate\Http\Request;

class CheckUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $CheckUps = CheckUp::all();
        return view('admin.interfaces.checkup.index',compact('CheckUps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $optician = OpticianDetail::pluck('shop_name','id')->all();
        $patient = User::where('type','patient')->pluck('name','id')->all();
//
        return view('admin.interfaces.checkup.create',compact('optician','patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckupCreate $request)
    {

        $input = $request->all();

        CheckUp::create($input);

        return redirect('check-up');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $checkup = CheckUp::findOrFail($id);
        $optician = OpticianDetail::pluck('shop_name','id')->all();
        $patient = User::where('type','patient')->pluck('name','id')->all();

        return view('admin.interfaces.checkup.edit',compact('checkup','optician','patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckupEdit $request, $id)
    {
        $checkup = CheckUp::findOrFail($id);

        $checkup->update($request->all());

        return redirect('check-up');
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
