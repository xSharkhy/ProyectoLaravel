<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
     * Retorna las reglas de validación para los campos del formulario.
     *
     * @return array Las reglas de validación para cada campo del formulario.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:15'],
            'description' => ['required', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'hour' => ['required', 'date_format:H:i'],
            'tags' => ['nullable', 'string', 'regex:/^([a-zA-Z0-9]+,?)+$/'],

        ];
    }

    /**
     * Retorna los mensajes de error para cada regla de validación.
     *
     * @return array Los mensajes de error para cada regla de validación.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser un texto.',
            'name.max' => 'El campo nombre no puede tener más de 15 caracteres.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.string' => 'El campo descripción debe ser un texto.',
            'location.string' => 'El campo localización debe ser un texto.',
            'location.max' => 'El campo localización no puede tener más de 255 caracteres.',
            'date.required' => 'El campo fecha es obligatorio.',
            'date.date' => 'El campo fecha debe ser una fecha.',
            'date.after_or_equal' => 'El campo fecha debe ser una fecha posterior o igual a hoy.',
            'hour.required' => 'El campo hora es obligatorio.',
            'hour.date_format' => 'El campo hora debe tener el formato HH:MM.',
            'tags.string' => 'El campo etiquetas debe ser un texto.',
            'tags.regex' => 'El campo etiquetas debe tener el "formato etiqueta1,etiqueta2,etiqueta3".',
        ];
    }
}
