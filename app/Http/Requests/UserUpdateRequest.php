<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => ['required', 'unique:users,email,'.$this->user->id],
            'password' => 'nullable|min:8',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required',
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
            'name.required' => 'El "Nombre" es obligatorio.',
            'email.required' => 'El "Correo Electrónico" es obligatorio.',
            'email.unique' => 'El "Correo Electrónico" ya existe.',
            'password.min' => 'La "Contraseña" debe tener 8 dígitos mínimo.',
            'avatar.image' => 'El "Avatar" debe ser una imagen.',
            'avatar.mimes' => 'El "Avatar" debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'avatar.max' => 'El "Avatar" no debe ser mayor a 2MB.',
            'phone.required' => 'El "Celular" es obligatorio.',
        ];
    }
}
