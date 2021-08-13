<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'name'=>'required',
            'email'=>'nullable|email|unique:companies',
            'website' =>'nullable|url',
            'phone' =>'nullable|numeric|min:11',
            'address'=>'nullable',
        ];
    }

}
