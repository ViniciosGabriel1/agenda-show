<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Autoriza a validação para todos os usuários.
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'patient_name' => 'required|string|max:255',
            'document' => 'nullable|string|max:20',
            'contact' => 'required|string|max:50',
            'service' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string|max:1000',
            'terms_check' => 'accepted',
        ];

            // 'patient_name' => 'required|string|max:255',
            // 'document' => 'nullable|string|max:255',
            // 'contact' => 'required|string|max:255',
            // 'service' => 'required|string|max:255',
            // 'appointment_date' => 'required|date',
            // 'notes' => 'nullable|string',
            // 'terms_check' => 'required|accepted',
    }

    /**
     * Get the custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'patient_name.required' => 'O nome do paciente é obrigatório.',
            'contact.required' => 'O contato do paciente é obrigatório.',
            'service.required' => 'O serviço é obrigatório.',
            'appointment_date.required' => 'A data da consulta é obrigatória.',
            // 'appointment_date.after_or_equal' => 'A data da consulta não pode ser no passado.',
            'terms_check.accepted' => 'Você deve confirmar que as informações estão corretas.',
        ];
    }
}
