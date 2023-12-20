<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => ['required', 'unique:users'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'regex:/[A-Z]/'],
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Le champ nom est obligatoire.',
            'name.alpha' => 'Le champ nom doit contenir uniquement des caractères alphabétiques.',
            'name.unique' => 'Le nom existe déjà, veuillez en choisir un autre.',

            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être au format valide.',

            'password.required' => 'Le champ mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moins une lettre majuscule.',];
    }

}
