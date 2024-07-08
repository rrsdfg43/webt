<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapituloValidationRequest extends FormRequest
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
            'titulo' => 'required',
            'anime_id' => 'required',
            'opcion1' => 'required',
            'tiempoN' => 'required',
            'tiempoL' => 'required',
            'tiempoO' => 'required',
            'tiempoNS' => 'nullable',
            'tiempoLS' => 'nullable',
            'tiempoOS' => 'nullable'
        ];
    }
}
