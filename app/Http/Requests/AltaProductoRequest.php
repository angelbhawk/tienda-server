<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AltaProductoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:5',
            'precio' => 'required|decimal:2|gt:0',
            'existencia' => 'required|integer|gt:0',
            'envio' => 'required|gte:0',
            'detalle' => 'required|min:5',
            'imagen' => 'required|image|mimes:jpg|size:1024'
        ];
    }
}
