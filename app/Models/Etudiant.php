<?php

namespace App\Models;
use App\Models\Stage;
use App\Models\Classe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    
    protected $table ='etudiants';
    protected $fillable = [
        'matricule',
        'prenom',
        'nom',
        'sexe',
        'cp',
        'email',
        'portable',
        'adresse',
        'mot_passe',
        'classe_id',
        
    ];

    public function classe(){
        return $this->belongsTo(Classe::class);
    }
    
    public function stages(){
        return $this->hasMany(Stage::class);
    }
}
