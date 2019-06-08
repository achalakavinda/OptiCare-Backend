<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login',function (Request $request){

    try{
        if( $request->email!=null && $request->password!=null ){

            $User = \App\User::where('email',$request->email )->first();

            if($User!=null)
            {
                if( Hash::check($request->password, $User->password) ){
                    if($User->type === 'patient'){

                        $arr = ['status'=>true,'message'=>'your login now... Please wait loading your account','user'=>$User];

                    }else{

                        $arr = ['status'=>false,'message'=>'Only patient can login into mobile app, Please Contact youre system administrator!'];

                    }

                }else{
                    $arr = ['status'=>false,'message'=>'invalid username or password mismatch!'];
                }

            }else{
                $arr = ['status'=>false,'message'=>'invalid username or password!'];
            }

        }else{
            $arr = ['status'=>false,'message'=>'invalid request parameters you must send username and password'];
        }

    } catch(Exception $E){
        $arr = ['status'=>false,'message'=>$E->getMessage()];
    }

    return $arr;
});

Route::post('/test/myopia',function (Request $request){

    try {
        if( $request->all() and $request->Data!= null)
        {
            $DataArray = json_decode($request->Data,true);

            $TestSummry = \App\Models\TestSummery::create([
                'optician_id'=>1,
                'patient_id'=>1,
                'type'=>'myopia'
            ]);
            
            $patient_id = 1;
            $optician_id = 1;
            
            foreach ($DataArray as $item){
                try {
                    $patient_id = $item['patient_id'];
                    $optician_id = $item['optician_id'];
                    $Constant = $item['Constant'];
                    $Answer = $item['Answer'];
                    $Result = $item['Result'];
                    $Point = $item['Point'];

                    \App\Models\MyopiaTest::create([
                        'test_summery_id'=>$TestSummry->id,
                        'patient_id'=>$patient_id,
                        'optician_id'=>$optician_id,
                        'Constant'=>$Constant,
                        'Answer'=>$Answer,
                        'Result'=>$Result,
                        'point'=>$Point
                    ]);

                } catch (Exception $exception){
                    //do nothing
                }
            }

            $TestSummry->patient_id = $patient_id;
            $TestSummry->optician_id = $optician_id;
            $TestSummry->save();

            $CheckUp = \App\Models\CheckUp::create([
                'optician_id'=>$optician_id,
                'patient_id'=>$patient_id,
                'date'=>\Carbon\Carbon::now(),
                'type'=>'Myopia',
                'isMobile'=>true,
                'status'=>'Appointment',
                'note'=>'Created By Opti-care Mobile App'
            ]);
//
//                \App\Models\Appointment::create([
//                    'optician_id'=>$CheckUp->optician_id,
//                    'patient_id'=>$CheckUp->patient_id,
//                    'check_up_id'=>$CheckUp->id,
//                ]);

            return ['status'=>true,'message'=>'Pass Test data','body'=>$DataArray];

        }else
        {
            return ['status'=>false,'message'=>'Pass Empty Test data'];
        }
    } catch (Exception $exception){
        return ['status'=>false,'message'=>$exception->getMessage()];
    }
});


Route::post('/test/hyperpia',function (Request $request){

    try {
        if( $request->all() and $request->Data!= null)
        {
            $DataArray = json_decode($request->Data,true);

            $TestSummry = \App\Models\TestSummery::create([
                'optician_id'=>1,
                'patient_id'=>1,
                'type'=>'hyperpia'
            ]);

            $patient_id = 1;
            $optician_id = 1;

            foreach ($DataArray as $item){
                try {
                    $patient_id = $item['patient_id'];
                    $optician_id = $item['optician_id'];
                    $Constant = $item['Constant'];
                    $Answer = $item['Answer'];
                    $Result = $item['Result'];
                    $Point = $item['Point'];

                    \App\Models\HyperopiaTest::create([
                        'test_summery_id'=>$TestSummry->id,
                        'patient_id'=>$patient_id,
                        'optician_id'=>$optician_id,
                        'Constant'=>$Constant,
                        'Answer'=>$Answer,
                        'Result'=>$Result,
                        'point'=>$Point
                    ]);

                } catch (Exception $exception){
                    //do nothing
                }
            }

            $TestSummry->patient_id = $patient_id;
            $TestSummry->optician_id = $optician_id;
            $TestSummry->save();


            $CheckUp = \App\Models\CheckUp::create([
                'optician_id'=>$optician_id,
                'patient_id'=>$patient_id,
                'date'=>\Carbon\Carbon::now(),
                'type'=>'Hyperopia',
                'isMobile'=>true,
                'status'=>'Appointment',
                'note'=>'Created By Opti-care Mobile App'
            ]);


            //
//                \App\Models\Appointment::create([
//                    'optician_id'=>$CheckUp->optician_id,
//                    'patient_id'=>$CheckUp->patient_id,
//                    'check_up_id'=>$CheckUp->id,
//                ]);

            return ['status'=>true,'message'=>'Pass Test data','body'=>$DataArray];

        }else
        {
            return ['status'=>false,'message'=>'Pass Empty Test data'];
        }
    } catch (Exception $exception){
        return ['status'=>false,'message'=>$exception->getMessage()];
    }
});


Route::get('/user/{id}/optician/locations',function ($id){
    $arr = [
        'user'=>[ 'id'=>1, 'name'=>'test user'],
        'opticians'=>\App\Models\OpticianDetail::all()
    ];
    return $arr;
});


Route::get('/user/{id}/checkups',function ($id){

    $arr = [ 'status'=>true ];

    $Checkup = \App\Models\CheckUp::where('patient_id',$id)->get();

    $arr = [ 'status'=>true, 'checkup'=>$Checkup ];

    return $arr;
});