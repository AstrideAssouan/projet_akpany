<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = "client";
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'contact',
        'besoin',
        'service_id'
    ];

    public function services(){
        return $this->belongsToMany(Service::class, 'service_id');
    }
}
