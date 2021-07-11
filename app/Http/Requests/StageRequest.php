<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StageRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'fiche' => 'bail|required|file',
            'secteur' => 'bail|required|string',
            'entreprise' => 'bail|required|string',
            'lieu_stage' => 'bail|required|string',
            'debut_stage' => 'bail|required|date|',
            'fin_stage' => 'bail|required|date|after:debut_stage',
            'theme_stage' => 'bail|required|string',
            'tuteur_entreprise_email' => 'bail|email',
            'telephone' => 'bail|integer',
            'voeu1' => 'bail|required|string|different:voeu2|different:voeu3',
            'voeu2' => 'bail|required|string|different:voeu1|different:voeu3',
            'voeu3' => 'bail|required|string|different:voeu2|different:voeu1',
        ];
    }
}
