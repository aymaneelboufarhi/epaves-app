<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required',
            'prenom' => 'required',
            'matricule' => 'required',
            'entite_attache' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'role' => 'required|in:administrateur,agent',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vous dever saisir une adreese Nom',
            'prenom.required' => 'Vous dever saisir une adreese prenom',
            'matricule.required' => 'Vous dever saisir une adreese matricule',
            'email.required' => 'Vous dever saisir une adreese email',
            'telephone.required' => 'Vous dever saisir une adreese telephone',
            'role.required' => 'Vous dever saisir une adreese role',
            'password.required' => 'Vous dever saisir mot pass plus 8 caracters'
        ];

    }
}