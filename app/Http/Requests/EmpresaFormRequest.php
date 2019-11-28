<?php

namespace sysbar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
            //reglas para el formulario de Empresas
            'nombre' =>'required|max:50',
            'logo'   =>'mimes:jpeg,bmp,png',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Necesitas escribir el nombre o álias de la empresa.',
            'nombre.max' => 'El nombre o álias de la empresa no debe tener mas de 50 caracteres.',
            'logo.mimes' => 'Sólo se permite subir imagenes en formato JPEG, BMP ó PNG'
        ];
    }
}
