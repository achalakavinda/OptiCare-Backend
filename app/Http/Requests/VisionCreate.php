<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisionCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'optician_id'       => 'required',
            'patient_id'        => 'required',
//          'parent_id'         => 'required',
            'check_up_id'       => 'required',



        ];
    }
}
