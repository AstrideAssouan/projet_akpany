<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Emploi;
use App\Models\Service;
use App\Models\TypeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $emploi = Emploi::orderByDesc('id')->paginate(3);
        $services = Service::all();
        $type_services = TypeService::all();
        return view('index', ["emploi" => $emploi, 'services' => $services, 'type_services'=>$type_services]);
    }

    public function indexJob()
    {
        $allJob = Emploi::all();
        return view('layouts.emploi', ["allJob" => $allJob]);
    }

    public function jobDetails($job_id)
    {
        $job = Emploi::findOrFail($job_id);
        $missions = explode(', ', $job->missions);
        $categorie = Categorie::findOrFail($job->categorie_id);
        return view('layouts.job_details', ["job" => $job, "categorie" => $categorie->libelle_cat, "missions" => $missions]);
    }

    // enregistrer les candidatures en base de données
    public function Candidature(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'numero' => 'required',
            'lieu_residence' => 'required',
            'niveau' => 'required',
            'lettre' => 'required',
            'cv_pdf' => 'required|mimes:pdf',
            'emploi_id' => 'required',
        ]);

        // Vérifiez si l'annonce existe (emploi)
        $emploi = Emploi::findOrFail($validatedData['emploi_id']);

        // Stockez le fichier CV dans le dossier de stockage
        if ($request->hasFile('cv_pdf')) {
            $cvPath = $request->file('cv_pdf')->store('cvs', 'public');
            $validatedData['cv_pdf'] = $cvPath;
        }

        // Créez la candidature
        if(Candidat::create($validatedData)){
            return back()->with('success', 'Candidature enregistrée avec succces');
        }else{
            return back()->with('error', 'Une erreur est survenue');
        }
    }

    // enregistrer les clients
    public function Client(Request $request)
{
    // Validez les données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'contact' => 'required',
        'besoin' => 'required',
        'service_id' => 'required'
    ]);

    // Vérifiez si le service existe dans la base de données
    $service = Service::where('intitule_ser', $validatedData['service_id'])->first();

    // Si le service n'est pas trouvé, renvoyez un message d'erreur
    if (!$service) {
        return back()->with('error', 'Service non trouvé. Veuillez vérifier le nom du service.');
    }

    // Créez la demande de service
    $validatedData['service_id'] = $service->id;
    if(Client::create($validatedData)){
        return back()->with('success', 'Demande effectuée avec succès');
    } else {
        return back()->with('error', 'Une erreur est survenue lors de la création de la demande.');
    }
}

}
