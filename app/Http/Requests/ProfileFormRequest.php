<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\MessageBag;
use App\Http\Validations;
use Illuminate\Contracts\Validation\Validator;

class ProfileFormRequest extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
             'body' =>  'required|string|min:10',

        ];

    }
    public function messages()
    {
        return [
            'fname.required' => 'First name name is required',
            'lname.required' => 'First name is required',
            'body.required'=>'Body is required and should be atleast 8 characters'

        ];

    }
}
