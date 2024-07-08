<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimeValidationRequest extends FormRequest
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
            'descripcion' => 'required',
            'image' => 'nullable|image',
            'year' => 'required',
            'capitulosM' => 'required',
            'estado' => 'required',
            'sub' => 'required',
            'tipo' => 'required',
            'rating' => 'required',
            'id_categoria' => 'required',
            'duration' => 'required',
            'miniature' => 'nullable|image',
            'keywords' => 'required',
        ];
    }
}
