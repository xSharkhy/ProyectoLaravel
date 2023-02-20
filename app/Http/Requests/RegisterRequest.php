<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:4', 'max:20', 'unique:users'],
            'birthday' => ['required', 'date', 'before:today'],
            'instagram' => ['nullable', 'string', 'min:4', 'max:32'],
            'twitch' => ['nullable', 'string', 'min:4', 'max:32'],
            'twitter' => ['nullable', 'string', 'min:4', 'max:32'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Por favor, inserta tu nombre.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'username.required' => 'Por favor, inserta tu nombre de usuario.',
            'username.min' => 'El nombre de usuario debe tener al menos 4 caracteres.',
            'username.max' => 'El nombre de usuario no puede tener más de 20 caracteres.',
            'username.unique' => 'El nombre de usuario ya está en uso.',
            'birthday.required' => 'Por favor, inserta tu fecha de nacimiento.',
            'birthday.date' => 'Por favor, inserta una fecha válida.',
            'birthday.before' => 'Por favor, inserta una fecha anterior a hoy.',
            'instagram.min' => 'El nombre de usuario de Instagram debe tener al menos 4 caracteres.',
            'instagram.max' => 'El nombre de usuario de Instagram no puede tener más de 32 caracteres.',
            'twitch.min' => 'El nombre de usuario de Twitch debe tener al menos 4 caracteres.',
            'twitch.max' => 'El nombre de usuario de Twitch no puede tener más de 32 caracteres.',
            'twitter.min' => 'El nombre de usuario de Twitter debe tener al menos 4 caracteres.',
            'twitter.max' => 'El nombre de usuario de Twitter no puede tener más de 32 caracteres.',
            'email.required' => 'Por favor, inserta tu correo electrónico.',
            'email.email' => 'Por favor, inserta un correo electrónico válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'Por favor, inserta tu contraseña.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
