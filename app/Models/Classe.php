<?php

namespace App\Models;
use App\Models\Enseignant;
use App\Models\Etudiant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table ='classes';
    protected $fillable = [
     
        'id',
        'nom',
        'niveau',
        'annee',
        'enseignant_id',
        
    ];


    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }

    public function etudiants(){
        return $this->hasMany(Etudiant::class);
    }
}
