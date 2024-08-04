<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'synopsis' => 'required',
            'url' => 'required',
            'trailer' => 'required',
            'poster' => 'required',
            // 'genre' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El "Título" es obligatorio.',
            'title.string' => 'El "Título" debe ser una cadena de texto.',
            'title.max' => 'El "Título" no puede tener más de 255 caracteres.',
            'synopsis.required' => 'La "Sinopsis" es obligatorio.',
            'url.required' => 'El "Enlace" es obligatorio.',
            'trailer.required' => 'El "Trailer" es obligatorio.',
            'poster.required' => 'La "Imagen" es obligatorio.',
            // 'genre.required' => 'La "Género" es obligatorio.',
        ];
    }
}
