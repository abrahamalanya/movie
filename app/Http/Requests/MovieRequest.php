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
            'type' => 'required',
            'title' => 'required|string|max:255',
            'synopsis' => 'required',
            'url' => 'required',
            'trailer' => 'required',
            'release_date' => 'required|integer|min:1900|max:' . date('Y'),
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre' => 'required',
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
            'type.required' => 'El "Tipo" es obligatorio.',
            'title.required' => 'El "Título" es obligatorio.',
            'title.string' => 'El "Título" debe ser una cadena de texto.',
            'title.max' => 'El "Título" no puede tener más de 255 caracteres.',
            'synopsis.required' => 'La "Sinopsis" es obligatorio.',
            'url.required' => 'El "Enlace" es obligatorio.',
            'trailer.required' => 'El "Trailer" es obligatorio.',
            'release_date.required' => 'La "Fecha de Publicación" es obligatorio.',
            'release_date.integer' => 'La "Fecha de Publicación" debe ser numérico.',
            'release_date.min' => 'La "Fecha de Publicación" como mínimo debe ser 1900.',
            'release_date.max' => 'La "Fecha de Publicación" como máximo debe ser ' . date('Y') . '.',
            'poster.required' => 'La "Imagen" es obligatorio.',
            'poster.image' => 'La "Imagen" debe ser una imagen.',
            'poster.mimes' => 'La "Imagen" debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'poster.max' => 'La "Imagen" no debe ser mayor a 2MB.',
            'genre.required' => 'El "Género" es obligatorio.',
        ];
    }
}
