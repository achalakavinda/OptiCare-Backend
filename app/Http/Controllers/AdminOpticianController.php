<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Http\Requests\AdminOpticianCreate;
use App\Models\OpticianDetail;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interfaces.user.optician.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminOpticianCreate $request)
    {

        $input  = $request->all();



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
            $user =User::create($input);

            $user->optician()->create([
                'user_id'                       => $user->id,
                'shop_name'                     => $request->shop_name,
                'br_number'                     => $request->br_number,
                'address'                       => $request->address,
                'contact_number'                => $request->contact_number,
                'contact_number_alternative'    => $request->contact_number_alternative,
                'latitude'                      => 1,
                'longitude'                     => 2,
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
        //
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
        //
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
