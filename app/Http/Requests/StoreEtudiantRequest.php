<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtudiantRequest extends FormRequest
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
            'matricule' => 'required|max:45|min:2',
            'prenom' => 'required|string|max:45|min:2',
            'nom' => 'required|string|max:45|min:0',
            'sexe' => 'required|string|max:10|min:1',
            'code_postal' => 'required|max:45|min:2',
            'email' => 'required|string|max:45|min:2',
            'portable' => 'required',
            'adresse' => 'required|string|max:45|min:2',
            'classe_id'=>'required|integer|exists:classes,id',
      

            // 'team_id' => 'required|integer|exists:teams,id',
        ];
    }

    public function messages(){
        return [
             //Messages de validation de champ matricule
             'matricule.required'=>'Le champ Matricule est obligatoire',
             'matricule.max'=>'La taille maximum de champ Matricule est 45 caractères',
             'matricule.min'=>'La taille manimum de champ Matricule est 2 caractères',
             
             // Messages de validation de champ prenom
             'prenom.required'=> 'Le champ Prénom est obligatoire',
             'prenom.string'=> 'Le champ Prénom doit être de type string',
             'prenom.max'=> 'La taille maximum de champ Prénom est 45 caractères',
             'prenom.min' => 'La taille manimum de champ nom est 2 caractères',

             // Messages de validation de champ nom
             'nom.required'=> 'Le champ Nom est obligatoire',
             'nom.string'=> 'Le champ Nom doit être de type string',
             'nom.max'=> 'La taille maximum de champ Nom est 45 caractères',
             'nom.min' => 'La taille manimum de champ Nom est 2 caractères',
            
             // Messages de validation de champ sexe
             'sexe.required'=> 'Le champ Sexe est obligatoire',
             'sexe.string'=> 'Le champ Sexe doit être de type string(Aplphabet)',
             'sexe.max'=> 'La taille maximum de champ Sexe est 10 caractères',
             'sexe.min' => 'La taille manimum de champ Sexe est 1 caractères',
             
             // Messages de validation de champ code postal
             'code_postal.required'=> 'Le champ Code Postal est obligatoire, remplissez le.',
             'code_postal.max'=> 'La taille maximum de champ Code Postal est 45 caractères',
             'code_postal.min' => 'La taille manimum de champ Code Postal est 2 caractères',
             
             // Messages de validation de champ E-mail
             'email.required'=> 'Le champ E-mail est obligatoire, remplissez le.',
             'email.unique'=> 'Ce e-mail est dèjà utilisé, choisissez nouveau.',
             'email.string'=> 'Le champ E-mail doit être de type string(Aplphabet)',
             'email.max'=> 'La taille maximum de champ e-mail 45 est 45 caractères',
             'email.min' => 'La taille manimum de champ e-mail est 3 caractères',
            
             // Messages de validation de champ Portable
             'portable.required'=> 'Le champ Portable est obligatoire, remplissez le.',             
             'portable.max'=> 'La taille maximum de champ Portable 45 est 45 caractères',
             'portable.min' => 'La taille manimum de champ Portable est 3 caractères',

              // Messages de validation de champ Addresse
              'adresse.required'=> 'Le champ Adresse est obligatoire, remplissez le.',
              'adresse.string'=> 'Le champ Adresse doit être de type string(Aplphabet)',
              'adresse.max'=> 'La taille maximum de champ Adresse 45 est 45 caractères',
              'adresse.min' => 'La taille manimum de champ Adresse est 3 caractères',

              'classe_id.integer'=>'Selectionnez un parcours',
              'classe_id.required'=>'Le champ parcours est obligatoire, remplissez le',
              'classe_id.exists'=>'Selectionnez un parcours existant, remplissez le',

        ];
    } 
}
