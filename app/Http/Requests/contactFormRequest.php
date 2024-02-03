<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactFormRequest extends FormRequest
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
            'nom' => ['required', 'string', 'min:6'],
            'prenom' => ['required', 'string', 'min:6'],
            'email' => ['required', 'email'],
            'content' => ['required', 'min:6', 'regex:/[A-Z]/'],
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champ nom est obligatoire.',
            'prenom.required' => 'Le champ prenom est obligatoire.',

            'email.required' => 'L\'adresse e-mail est obligatoire.',

            'content.required' => 'Le champ content est obligatoire.',
        ];
    }
}
