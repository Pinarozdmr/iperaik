<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $id= $this->route('company')?->id;

        return [
            'image'=>'nullable|mimes:jpeg,png,jpg,gif,svg|image',
            'name'=>'required',
            'email'=>[
                'nullable',
                'email',
                Rule::unique('companies')->ignore($id)
            ],
            'website' =>'nullable|url',
            'phone' =>'required|numeric|digits:11',
            'address'=>'nullable',
        ];
    }

}
