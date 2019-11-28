<?php

namespace sysbar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredienteFormRequest extends FormRequest
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
            'idempresa' => 'required',
            'nombre' =>'required|max:100'
        ];
    }
    public function messages()
    {
        return [
            'idempresa.required' => 'Necesitas seleccionar la empresa.',
            'nombre.required' => 'Necesitas escribir el nombre del ingrediente.',
            'nombre.max' => 'El nombre del ingrediente no debe tener más de 100 caracteres'
        ];
    }
}
