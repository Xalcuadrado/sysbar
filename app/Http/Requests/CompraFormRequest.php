<?php

namespace sysbar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
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
            'idempresa'     => 'required',
            'idproveedor'   =>'required',
            't_comprobante' =>'required|max:20',
            'n_comprobante' =>'required|max:20',
            'idproducto'    =>'required',
            'cantidad'      =>'required',
            'precio_compra' =>'required'
        ];
    }
}
