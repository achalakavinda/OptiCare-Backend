<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTypeCreate;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = Auth::user()->productType->all();


//        $productTypes = ProductType::all();
        return view('admin.interfaces.product.productType.index',compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interfaces.product.productType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeCreate $request)
    {



//        $optician = ProductType::create($input);



        ProductType::create([


            'user_id' => Auth::id(),
            'name'    => $request->name,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,

        ]);


        return redirect('productType');


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
        $product = ProductType::findOrFail($id);

        return view('admin.interfaces.product.productType.edit',compact('product'));
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

        $input = $request->all();

        Auth::user()->productType()->whereId($id)->first()->update($input);

        return redirect('/productType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $productType = ProductType::findOrFail($id);

        $productType->delete();

        return redirect('/productType');

    }
}
