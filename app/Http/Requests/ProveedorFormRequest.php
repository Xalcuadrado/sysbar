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
            'n_documento'  =>'required|max:20',
            'telefono'          =>'required|max:45',
            'email'             =>'required|max:100',
        ];
    }
}
