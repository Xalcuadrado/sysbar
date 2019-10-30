<?php

namespace sysbar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' =>'required|max:45',
            'email' =>'required|max:120',
            'telefono' =>'required|max:45',
            'foto'   =>'mimes:jpeg,bmp,png',
            'apellido'=>'required|max:45',
        ];
    }
}
