<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    protected $table = "candidats";
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'numero',
        'lieu_residence',
        'niveau',
        'lettre',
        'cv_pdf',
        'emploi_id'
    ];


    public function emplois(){
        return $this->belongsToMany(Emploi::class, 'emploi_id');
    }
}
