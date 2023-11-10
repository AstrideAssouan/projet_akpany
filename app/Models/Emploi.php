<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;

    protected $table = 'emploi';
    protected $fillable = [
        'intitule_poste',
        'date_publication',
        'date_limite',
        'niveau_etude',
        'lieu',
        'type_offre',
        'description_poste',
        'missions',
        'remuneration',
        'categorie_id'
    ];

    public function category(){
        return $this->belongsToMany(Categorie::class, 'categorie_id');
    }
}
