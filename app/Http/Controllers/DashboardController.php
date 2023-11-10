<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Candidat;
use App\Models\Projet;
use App\Models\Emploi;

class dashboardController extends Controller
{
public function index() {
    
    $candidatures = Candidat::count();
    $offresEmploi = Emploi::count();
    $demandesDeService = Client::count();
    $projets = Projet::count();
    
    return response() -> json();
}
}