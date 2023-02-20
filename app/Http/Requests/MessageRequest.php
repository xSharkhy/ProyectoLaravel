<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'message' => 'required|string|max:255',
            'email' => 'required|email',
            'name' => 'required|string|max:15',
            'subject' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'message.required' => 'Por favor, inserta tu mensaje.',
            'message.max' => 'El mensaje no puede tener más de 255 caracteres.',
            'email.required' => 'Por favor, inserta tu correo electrónico.',
            'email.email' => 'Por favor, inserta un correo electrónico válido.',
            'name.required' => 'Por favor, inserta tu nombre.',
            'name.max' => 'El nombre no puede tener más de 15 caracteres.',
            'subject.required' => 'Por favor, inserta el asunto.',
            'subject.max' => 'El asunto no puede tener más de 100 caracteres.',
        ];
    }
}
