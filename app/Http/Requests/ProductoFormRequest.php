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
            'precio'        =>'required|numeric',
            'stock'         =>'required|numeric',
            'descripcion'   =>'required',
        ];
    }

    public function messages()
    {
        return [
            'idempresa.required' => 'Necesitas seleccionar la empresa.',
            'idcategoria.required' => 'Necesitas seleccionar la categoría a la que pertenece.',
            'codigo.required' => 'Necesitas escribir el código o asignale uno.',
            'nombre.required' => 'Necesitas escribir el nombre del producto.',
            'precio.required' => 'Necesitas escribir el precio del producto.',
            'stock.required' => 'Necesitas escribir un stock inicial.',
            'descripcion.required' => 'Necesitas escribir una breve descripción del producto.',
            'imagen.mimes' => 'Sólo se permite subir imagenes en formato JPEG, BMP ó PNG'
        ];
    }
}
