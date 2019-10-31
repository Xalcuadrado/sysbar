<?php

namespace sysbar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            'idcategoria'   =>'required',
            'idempresa'     =>'required',
            'codigo'        =>'required',
            'nombre'        =>'required',
            'imagen'        =>'mimes:jpeg,bmp,png',
            'precio'        =>'required',
            'stock'         =>'required',
            'descripcion'   =>'required',
        ];
    }
}
