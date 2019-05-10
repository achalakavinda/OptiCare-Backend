<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpticianProductCreate;
use App\Models\PatientDetail;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSale;
use App\Models\ProductType;
use App\Models\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpticianProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //optician specific products
        $products = Product::all();

        return view('admin.interfaces.product.index',compact('products'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//            $productType = ProductType::all();
            $productVision = Vision::pluck('id')->all();
            $productPatient = PatientDetail::pluck('contact_number','id')->all();
//        $productType->productType()->pluck('name','id')->all();
        $productType = ProductType::pluck('name','id')->all();

        return view('admin.interfaces.product.create',compact('productType','productVision','productPatient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpticianProductCreate $request)
    {

       $input = $request->all();

       $user = Auth::user();

       $files = $request->file('product_image_id');

       if($request->hasFile('product_image_id')){

           foreach ($files as $file){

               $name = time(). $file->getClientOriginalName();

               $file->move('images',$name);

               $productImage = ProductImage::create(['image'=>$name]);

               $input ['product_image_id'] = $productImage->id;
           }


       }

                $user->products()->create($input);

//        if( $file = $request->file('product_image_id')){
//
//            $name = time(). $file->getClientOriginalName();
//
//            $file->move('images',$name);
//
//            $avatar = ProductImage::create(['image'=>$name]);
//
//            $input ['product_image_id'] = $avatar->id;
//
//        }









//        if($file = $request->file(['front_url','left_side_url','right_side_url'])){
//
//            $frontImage = time() . "image1" . $file [0]->getClientOriginalName();
//            $leftImage  = time() . "image2" . $file [1]->getClientOriginalName();
//            $rightImage  = time() . "image3" . $file [2]->getClientOriginalName();
//
//            $file[0]->move('images',$frontImage);
//            $file[1]->move('images',$leftImage );
//            $file[2]->move('images',$rightImage);
//
//            ProductImage::create([
//               'product_id'        => $request->id,
//                'front_url'         => $frontImage,
//                'left_side_url'     => $leftImage,
//                'right_side_url'    => $rightImage,
//           ]);
//
//        }
//
////        $user->products()->create($request->all());
//        Product::create([
//
//            'user_id'               =>  $user->id,
//            'vision_id'             =>  1,
//            'product_type_id'       =>  $request->product_type_id,
//            'name'                  =>  $request->name,
//            'description'           =>  $request->description,
//        ]);


            return redirect('/product');



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
