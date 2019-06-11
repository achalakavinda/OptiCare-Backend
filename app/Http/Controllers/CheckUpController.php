<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckupCreate;
use App\Http\Requests\CheckupEdit;
use App\Http\Requests\UpdateStatus;
use App\Models\CheckUp;
use App\Models\OpticianDetail;
use App\Models\PatientDetail;
use App\User;
use Illuminate\Http\Request;
use vendor\project\StatusTest;

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

        //get the optician name
        $optician = OpticianDetail::findOrFail($input ['optician_id']);
        $name = $optician->user->name;

        //get patient Name
        $userName = User::findOrFail($input ['patient_id']);
        $patietName = $userName->name;



        CheckUp::create([

            'optician_id' => $input ['optician_id'],
            'optician_name'=> $name,
            'patient_id' => $input ['patient_id'],
            'patient_name'=>$patietName,
            'date' => $input ['date'],
            'type' => $input ['type'],
            'isMobile' => $input ['isMobile'],
            'status'   => $input ['status'],
            'note'   => $input ['note']
        ]);

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

        $chekups = CheckUp::findOrFail($id)->all();

        return view('admin.interfaces.checkup.show',compact('chekups'));

    }

    public function UserCheckUp($id){



        $checkup = CheckUp::findOrFail($id);

        return view('admin.interfaces.checkup.editStatus',compact('checkup'));


    }

    public function updateStatus(UpdateStatus $request, $id)
    {
        $checkup = CheckUp::findOrFail($id);

        $checkup->update($request->all());

        return redirect('/check-up/'.$id);
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



        $checkup->update([
           'date'       => $request->date,
            'type'      => $request->type,
            'isMobile'  => $request->isMobile,
            'status'    => $request->status,
            'note'      => $request->note,



        ]);
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
