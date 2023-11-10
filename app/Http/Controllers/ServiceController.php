<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Emploi;
use App\Models\Service;
use App\Models\TypeService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // ajouter un type de service
    public function createTypeService(Request $request)
    {
        $validatedData = $request->validate([
            'libelle_type_ser' => 'required',
            'tarif' => 'required'
        ]);

        if (TypeService::create($validatedData)) {
            $data = [
                "status" => 200,
                "message" => "Créé avec succès"
            ];
        } else {
            $data = [
                "status" => 500,
                "message" => "Création échouée"
            ];
        }

        return response()->json($data);
    }

    // mofifier un type de service
    public function editTypeService(Request $request)
    {
        $validatedData = $request->validate([
            'libelle_type_ser' => 'required',
            'tarif' => 'required'
        ]);

        if (TypeService::findOrFail($request->input('id'))->update($validatedData)) {
            $data = [
                "status" => 200,
                "message" => "Modification reussie !"
            ];
        } else {
            $data = [
                "status" => 500,
                "message" => "Modification échouée !"
            ];
        }

        return response()->json($data);
    }

    // afficher tous les types de servicees
    public function indexTypeService(Request $request)
    {
        $service = TypeService::all();
        return response()->json($service);
    }
    // afficher un type de servicee
    public function getTypeService(Request $request)
    {
        $service = TypeService::findOrFail($request->input('id'));
        return response()->json($service);
    }

    // supprimer un type de service
    public function deleteTypeService(Request $request)
    {
        if (TypeService::findOrFail($request->input('id'))->delete()) {
            $data = [
                "status" => 200,
                "message" => "Suppression effectuée !"
            ];
        } else {
            $data = [
                "status" => 500,
                "message" => "Suppression échouée !"
            ];
        }

        return response()->json($data);
    }


    // créer un service
    public function createService(Request $request)
    {
        $validatedData = $request->validate([
            'intitule_ser' => 'required',
            'description_ser' => 'required',
            'id_type_ser' => 'required'
        ]);

        if (Service::create($validatedData)) {
            $data = [
                "status" => 200,
                "message" => "Créé avec succès"
            ];
        } else {
            $data = [
                "status" => 500,
                "message" => "Création échouée"
            ];
        }

        return response()->json($data);
    }

    // modifier un service
    public function editService(Request $request)
    {
        $validatedData = $request->validate([
            'intitule_ser' => 'required',
            'description_ser' => 'required',
            'id_type_ser' => 'required'
        ]);

        if (Service::findOrFail($request->input('id'))->update($validatedData)) {
            $data = [
                "status" => 200,
                "message" => "Modification reussie !"
            ];
        } else {
            $data = [
                "status" => 200,
                "message" => "Modification échouée !"
            ];
        }

        return response()->json($data);
    }

    // afficher tous les services
    public function indexService(Request $request)
    {
        $search = $request->input('id');
        $services = Service::select('*')->where(function ($query) use ($search) {
            $query->where('intitule_ser', 'LIKE', '%' . $search . '%')
                ->orWhere('description_ser', 'LIKE', '%' . $search . '%');
        })
            ->orderByDesc('id')
            ->paginate(10);

        return response()->json($services);
    }

    public function service()
    {
        $service = Service::all();
        return response()->json($service);
    }

    // afficher un service
    public function getService(Request $request)
    {
        $service = Service::findOrFail($request->input('id'));
        return response()->json($service);
    }

    // supprimer un service
    public function deleteService(Request $request)
    {
        if (Service::findOrFail($request->input('id'))->delete()) {
            $data = [
                "status" => 200,
                "message" => "Suppression effectuée !"
            ];
        } else {
            $data = [
                "status" => 500,
                "message" => "Suppression échouée !"
            ];
        }

        return response()->json($data);
    }


    // demander un service
    public function demandeService(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'besoin' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $service_id = $request->input('service_id');

        if (Service::find($service_id)) {
            $client = Client::create($validatedData);
            $client->services->attach($service_id);

            $data = [
                "status" => 200,
                "message" => "Votre demande a été enregistré !"
            ];
        } else {
            $data = [
                "status" => 500,
                "message" => "Une erreur est survenue !"
            ];
        }

        return response()->json($data);
    }

    // afficher tous les clients
    public function indexClients(Request $request)
    {
        $search = $request->input('search');
        $clients = Client::select('*')->where(function ($query) use ($search) {
            $query->where('nom', 'LIKE', '%' . $search . '%')
                ->orWhere('prenom', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('contact', 'LIKE', '%' . $search . '%');
        })->paginate(10);
        return response()->json($clients);
    }

    // afficher un client
    public function getClient(Request $request)
    {
        $client = Client::select('*')->where('id', $request->input('client_id'))->with('emploi')->first();
        return response()->json($client);
    }

    // supprimer un client
    public function deleteClient(Request $request)
    {
        if (Client::findOrFail($request->input('client_id'))->delete()) {
            $data = [
                "status" => 200,
                "message" => "Suppression effectuée !"
            ];
        } else {
            $data = [
                "status" => 500,
                "message" => "Suppression échouée !"
            ];
        }

        return response()->json($data);
    }
}
