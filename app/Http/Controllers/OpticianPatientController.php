<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Http\Requests\OpticianPatientCreate;
use App\Http\Requests\OpticianPatientEdit;
use App\Models\OpticianDetail;
use App\Models\PatientDetail;
use App\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpticianPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patients = PatientDetail::all();

        return view('admin.interfaces.user.patient.index',compact('patients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.interfaces.user.patient.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpticianPatientCreate $request)
    {



        $input = $request->all();
        $currentUser = Auth::user();

        if(trim($request->password) ==''){

            $input = $request->except('password');

        }else{

            $input = $request->all();
            $input ['password'] = bcrypt($request->password);

        }

        if($file = $request->file('avatar_id')){

            $name = time(). $file->getClientOriginalName();

            $file->move('images',$name);

            $avatar = Avatar::create(['file' => $name]);

            $input['avatar_id'] = $avatar->id;


        }


                $user = User::create([

                    'name' => $input ['name'],
                    'email'=> $input ['email'],
                    'password' => $input ['password'],
                    'avatar_id'=> $input ['avatar_id'],
                    'type'     =>$input ['type'],
                    'is_active'=>$input ['is_active'],

        ]);


            PatientDetail::create([

                'user_id'           => $user->id,
                'optician_detail_id'=> Auth::id(),
                'address'           => $request->address,
                'contact_number'    => $request->contact_number ,
                'birthday'          => $request->birthday,

            ]);

            return redirect('/patient');

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



        $patient = PatientDetail::findOrFail($id);


        return view('admin.interfaces.user.patient.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OpticianPatientEdit $request, $id)
    {

        $patient = PatientDetail::findOrFail($id);

        //get user_id relevant to patient_id
        $Patientuser    = PatientDetail::where('id',$id)->pluck('user_id')->all();

        //get userDetails based on the id found and assigned to $Patientuser
        $user = User::where('id',$Patientuser);




        if(trim($request->password) ==''){

            $input = $request->except('password');

        }else{


            $input  = $request->all();

            $input ['password'] = bcrypt($request->password);
        }

        if( $file = $request->file('avatar_id')){

            $name = time(). $file->getClientOriginalName();

            $file->move('images',$name);

            $avatar = Avatar::create(['file'=>$name]);

            $input ['avatar_id'] = $avatar->id;

        }


        $patient->update([
            'address'       => $request->address,
            'contact_number'=> $request->contact_number,
            'birthday'      => $request->birthday,

        ]);




            $user->update([

                'password' => $input ['password'],
                'avatar_id' => $input ['avatar_id'],

            ]);





        return redirect('/patient');

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
