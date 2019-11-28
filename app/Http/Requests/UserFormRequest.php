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

    public function messages()
    {
        return [
            'name.required' => 'Necesitas escribir el nombre del usuario.',
            'name.max' => 'El nombre del usuario no debe tener mas de 45 caracteres.',
            'email.required' => 'Necesitas escribir el email del usuario.',
            'email.max' => 'El email no debe tener mas de 120 caracteres.',
            'telefono.required' => 'Necesitas escribir el teléfono del usuario.',
            'telefono.max' => 'El teléfono del usuario no debe tener mas de 45 caracteres.',
            'apellido.required' => 'Necesitas escribir el apellido del usuario.',
            'apellido.max' => 'El apellido del usuario no debe tener mas de 45 caracteres.',
            'foto.mimes' => 'Sólo se permite subir imagenes en formato JPEG, BMP ó PNG'
        ];
    }
}
