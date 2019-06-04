<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Users = User::where('type','Admin')->get();
        return view('admin.interfaces.user.index',compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interfaces.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {



        if(trim($request->password) == ''){

            $input = $request->except('password');

        }else{

            $input = $request->all();

            $input ['password'] = bcrypt($request->password);



        }

        if($file = $request->file('avatar_id')){


            $name = time(). $file->getClientOriginalName();

            $file->move('images',$name);

            $avatar = Avatar::create(['file' => $name]);

            $input ['avatar_id'] = $avatar->id;
        }

            User::create($input);



             return redirect('/user');

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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();

        return view('admin.interfaces.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user =User::findOrFail($id);

        if(trim($request->password) ==''){

            $input = $request->except('password');

        }else{


            $input  = $request->all();

            $input ['password'] = bcrypt($request->password);
        }


        if($file = $request->file('avatar_id')){

            $name = time(). $file->getClientOriginalName();

            $file->move('images',$name);

            $avatar = Avatar::create(['file'=>$name]);

            $input ['avatar_id'] = $avatar->id;

        }

            $user->update($input);

            return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        unlink(public_path(). $user->avatar->file);

        $user->delete();

        return redirect('/user');



    }
}
