<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    use HasFactory;

    protected $table = "type_service";
    protected $fillable = [
        'libelle_type_ser',
        'tarif',
    ];

    public function services(){
        return $this->belongsToMany(Service::class);
    }
}
