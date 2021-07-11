<?php

namespace App\Models;
use App\Models\Enseignant;
use App\Models\Classe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;


    protected $fillable = [
        'entreprise',
        'secteur_activite',
        'lieu',
        'theme', 
        'tuteur_entreprise', 
        'tuteur_entreprise_tel', 
        'tuteur_entreprise_email', 
        'date_debut', 
        'date_fin', 
        'fiche',
        'voeux_ens1',
        'voeux_ens2',
        'voeux_ens3',
        'etudiant_id',
        'enseignant_id',
    ];

    public function classe(){
        return $this->belongsTo(Classe::class);
    }
    public function maitre(){
        return $this->belongsTo(Enseignant::class);
    }

}
