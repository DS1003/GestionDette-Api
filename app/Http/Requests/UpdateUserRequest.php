<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'sometimes|string|max:255',
            'prenom' => 'sometimes|string|max:255',
            'email' => [
                'sometimes',
                'email',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'mot_de_passe' => 'sometimes|string|min:8',
            'role' => 'sometimes|in:admin,user',
            'client_id' => 'nullable|exists:clients,id',
        ];
    }
}
