<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Stage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $table ='enseignants';
    protected $fillable = [
        'matricule',
        'prenom',
        'nom',
        'sexe',
        'code_postal',
        'email',
        'portable',
        'adresse',
    ];
    
    public function classes(){
        return $this->hasMany(Classe::class);
    }
    public function stages(){
        return $this->hasMany(Stage::class);
    }
}
