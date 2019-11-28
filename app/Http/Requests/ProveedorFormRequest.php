<?php

namespace sysbar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
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
            'idempresa'         =>'required',
            'nombre'            =>'required|max:100',
            'direccion'         =>'required|max:256',
            't_documento'    =>'required|max:45',
            'n_documento'  =>'required|numeric',
            'telefono'          =>'required|max:45',
            'email'             =>'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'idempresa.required' => 'Necesitas seleccionar la empresa.',
            'nombre.required' => 'Necesitas escribir el nombre del proveedor.',
            'nombre.max' => 'El nombre del proveedor no debe tener mas de 100 caracteres.',
            't_documento.required' => 'Necesitas seleccionar el tipo del documento.',
            'n_documento.required' => 'Necesitas escribir los dígitos del documento seleccionado.',
            'direccion.required' => 'Necesitas escribir una dirección del proveedor.',
            'direccion.max' => 'La dirección del proveedor no debe tener mas de 256 caracteres.',
            'email.required' => 'Necesitas escribir el email del proveedor.',
            'email.max' => 'El E-mail del proveedor no debe tener mas de 100 caracteres.',
            'telefono.required' => 'Necesitas escribir el teléfono del proveedor.',
            'telefono.max' => 'El teléfono del proveedor no debe tener mas de 45 caracteres.',
        ];
    }
}
