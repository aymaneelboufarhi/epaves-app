<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEpaveRequest extends FormRequest
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
            'categorie' => 'required|string|max:255',
            'type_lieu_decouverte' => 'required|string',
            'lieu_decouverte' => 'required|string|max:255',
            'date_heure_decouverte' => 'required|date',
            'description' => 'nullable|string',
            'localisation' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'dimensions' => 'required|string|max:255',
            'signes_distinctifs' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'statut' => 'required|string',

        ];
    }
}
