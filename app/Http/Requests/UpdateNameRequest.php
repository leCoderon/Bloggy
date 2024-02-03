<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:users', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le champ nom est obligatoire.',
            'name.min' => 'Le champ nom doit contenir au moins 6 caractère.',
            'name.unique' => 'Le nom existe déjà, veuillez en choisir un autre.',
        ];

    }
}