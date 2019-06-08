<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Http\Requests\AdminOpticianCreate;
use App\Http\Requests\AdminOpticianEdit;
use App\Models\CheckUp;
use App\Models\OpticianDetail;
use App\Models\PatientDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOpticianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opticians = OpticianDetail::all();

        return view('admin.interfaces.user.optician.index',compact('opticians'));
    }

    /**
     * renders the database model (OpticianDetail) with the View and pass it as a URL request
     *
     *
     */
    public function create()
    {
        return view('admin.interfaces.user.optician.create');
    }

    /**
     * Create form View will be returned
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminOpticianCreate $request)
    {
            // get all the passed values to the variable , so it can be modified
            $input  = $request->all();
            if(trim($request->password) ==''){
                $input = $request->except('password');
            }else{
                $input = $request->all();
                //password encrypting
                $input ['password'] = bcrypt($request->password);
            }

           /*
            * get the user avatar and append the file with time and logged in users name.
            * move the file to the named folder
            */
            if( $file = $request->file('avatar_id'))
            {
                $name = time(). $file->getClientOriginalName();
                $file->move('images',$name);
                $avatar = Avatar::create(['file'=>$name]);
                $input ['avatar_id'] = $avatar->id;
            }else{
                $input ['avatar_id'] = null;
            }

            $user = User::create([
                'name' => $input['name'],
                'email'=> $input['email'],
                'password' => $input ['password'],
                'avatar_id' => $input ['avatar_id'] ? $input ['avatar_id'] : null ,
                'type'      => 'optician',
                'is_active' => $input ['is_active'],
            ]);

            /*
             *  get the necessary values for the relevant form id and create the user type optician
             */
            OpticianDetail::create([
                'user_id'                       => $user->id,
                'shop_name'                     => $request->shop_name,
                'br_number'                     => $request->br_number,
                'address'                       => $request->address,
                'contact_number'                => $request->contact_number,
                'contact_number_alternative'    => $request->contact_number_alternative,
                'latitude'                      => $request->latitude,
                'longitude'                     => $request->longitude,
            ]);

            return redirect('/optician');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $opticians = OpticianDetail::findOrFail($id);

        $patients = PatientDetail::where('optician_detail_id',$id)->pluck('id')->count();

        $patientsDetails = PatientDetail::where('optician_detail_id',$id)->get();

        $checkUps = CheckUp::where('optician_id',$id)->pluck('id')->count();

        $checkUpsDetails = CheckUp::where('optician_id',$id)->get();



        return view('admin.interfaces.user.optician.show',compact('opticians','patients','checkUps','patientsDetails','checkUpsDetails'));




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


        $optician = OpticianDetail::findOrFail($id);

        return view('admin.interfaces.user.optician.edit',compact('optician'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminOpticianEdit $request, $id)
    {

        $optician = OpticianDetail::findOrFail($id);

        if(trim($request->password) ==''){

            $input = $request->except('password');

        }else{

            $input = $request->all();

            $input ['password'] = bcrypt($request->password);

        }

        if( $file = $request->file('avatar_id')){

            $name = time(). $file->getClientOriginalName();

            $file->move('images',$name);

            $avatar = Avatar::create(['file'=>$name]);

            $input ['avatar_id'] = $avatar->id;

        }



        $optician->update($input);

        return redirect('/optician');


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
