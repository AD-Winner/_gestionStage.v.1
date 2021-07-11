<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClasseRequest extends FormRequest
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
            
            'nom' => 'required|string|max:45|min:0',
            'annee' => 'required|string|max:10|min:1',
            'niveau' => 'required|max:45|min:2',
            'enseignant_id'=>'required|integer|exists:enseignants,id',
      

            // 'team_id' => 'required|integer|exists:teams,id',
        ];
    }

    public function messages(){
        return [
             
             


             // Messages de validation de champ nom parcours
             'nom.required'=> 'Le champ Nom est obligatoire',
             'nom.string'=> 'Le champ Nom doit être de type string',
             'nom.max'=> 'La taille maximum de champ Nom est 45 caractères',
             'nom.min' => 'La taille manimum de champ Nom est 2 caractères',
            
             // Messages de validation de champ nom parcours
             'annee.required'=> 'Le champ Année de Parcours est obligatoire',
             'annee.string'=> 'Le champ Année de Parcours  doit être de type string',
             'annee.max'=> 'La taille maximum de champ Année de parcours  est 45 caractères',
             'annee.min' => 'La taille manimum de champ Année de parcours est 2 caractères',
            
             // Messages de validation de champ niveau de parcours
             'niveau.required'=> 'Le champ Niveau de Parcours  est obligatoire',
             'niveau.string'=> 'Le champ Niveau de Parcours exp.:2021-2022',
             'niveau.max'=> 'La taille maximum de champ Niveau de Parcours est 45 caractères',
             'niveau.min' => 'La taille manimum de champ Niveau est 2 caractères',
             
             
            // Messages de validation de champ responsable de parcours
              'enseignant_id.integer'=>'Selectionnez un responsáble de parcours',
              'enseignant_id.required'=>'Le champ responsáble de parcours est obligatoire, remplissez le',
              'enseignant_id.exists'=>'Selectionnez un responsáble de parcours existant, remplissez le',

        ];
    } 
}
