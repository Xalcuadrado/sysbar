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
            'n_comprobante' =>'required|numeric',
            'idproducto'    =>'required',
            'cantidad'      =>'required',
            'precio_compra' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'idempresa.required' => 'Necesitas seleccionar la empresa que se le asigna la compra.',
            'idproveedor.required' => 'Necesitas seleccionar el proveedor de la compra.',
            't_comprobante.required' => 'Necesitas seleccionar el tipo de comprobante.',
            'n_comprobante.required' => 'Necesitas escribir los dígitos del comprobante.',
            'idproducto.required' => 'Necesitas seleccionar un producto como mínimo.',
            'cantidad.required' => 'Necesitas escribir una cantidad numérica.',
            'precio_compra.required' => 'Necesitas escribir el precio de compra.',
        ];
    }
}
