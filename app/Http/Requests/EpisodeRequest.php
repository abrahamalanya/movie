<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
            'title' => 'required|max:255',
            'url' => 'required',
            'season_number' => 'required|integer|min:1',
            'episode_number' => 'required|integer|min:1',
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
            'title.max' => 'El "Título" no puede tener más de 255 caracteres.',
            'url.required' => 'El "Enlace" es obligatorio.',
            'season_number.required' => 'La "Temporada" es obligatorio.',
            'season_number.integer' => 'La "Temporada" debe ser numérico.',
            'season_number.min' => 'La "Temporada" como mínimo debe ser 1.',
            'episode_number.required' => 'El "Episodio" es obligatorio.',
            'episode_number.integer' => 'El "Episodio" debe ser numérico.',
            'episode_number.min' => 'El "Episodio" como mínimo debe ser 1.',
        ];
    }
}
