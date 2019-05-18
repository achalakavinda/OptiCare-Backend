<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpticianProductCreate extends FormRequest
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

            'product_type_id'   => 'required',
            'name'              => 'required',
            'description'       => 'required',
            'product_image_id'  => 'required',
            'product_image_id'  => 'mimes:doc,pdf,docx,zip',



        ];
    }
}
