<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Categorie;
use App\Models\Emploi;
use Illuminate\Http\Request;

class EmploiController extends Controller
{

    // ajouter une categorie
    public function createCategory(Request $request)
    {
        $validatedData = $request->validate([
            'libelle_cat' => 'required'
        ]);

        if (Categorie::create($validatedData)) {
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

    // mofifier une categorie
    public function editCategory(Request $request)
    {
        $validatedData = $request->validate([
            'libelle_cat'=>'required'
        ]);

        if (Categorie::findOrFail($request->input('id'))->update($validatedData)) {
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

    // afficher toutes les categories
    public function indexCategories(Request $request)
    {
        $category = Categorie::all();
        return response()->json($category);
    }

    public function getCategory(Request $request)
    {
        $service = Categorie::findOrFail($request->input('id'));
        return response()->json($service);
    }

    // supprimer une categorie
    public function deleteCategory(Request $request)
    {
        if (Categorie::findOrFail($request->input('id'))->delete()) {
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

    // créer un emploi
    public function createEmploi(Request $request)
    {
        $validatedData = $request->validate([
            'intitule_poste' => 'required',
            'date_publication' => 'required',
            'date_limite' => 'required',
            'niveau_etude' => 'required',
            'localisation' => 'required',
            'secteur_activite' => 'required',
            'description_poste' => 'required',
            'missions' => 'required',
            'remuneration' => 'required',
            'categorie_id' => 'required'
        ]);


        if (Emploi::create($validatedData)) {

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

    // modifier un emploi
    public function editEmploi(Request $request)
    {
        $validatedData = $request->validate([
            'intitule_poste' => 'required',
            'date_publication' => 'required',
            'date_limite' => 'required',
            'niveau_etude' => 'required',
            'localisation' => 'required',
            'secteur_activite' => 'required',
            'description_poste' => 'required',
            'missions' => 'required',
            'remuneration' => 'required',
            'categorie_id' => 'required'
        ]);

        if (Emploi::findOrFail($request->input('emploi_id'))->update($validatedData)) {

            $data = [
                "status" => 200,
                "message" => "Modification reussie !"
            ];
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

    // afficher tous les emplois
    public function indexEmploi(Request $request)
    {
        $search = $request->input('search');
        $emplois = Emploi::select('*')->where(function ($query) use ($search) {
            $query->where('intitule_poste', 'LIKE', '%' . $search . '%')
                ->orWhere('date_publication', 'LIKE', '%' . $search . '%')
                ->orWhere('date_limite', 'LIKE', '%' . $search . '%')
                ->orWhere('niveau_etude', 'LIKE', '%' . $search . '%')
                ->orWhere('localisation', 'LIKE', '%' . $search . '%')
                ->orWhere('secteur_activite', 'LIKE', '%' . $search . '%')
                ->orWhere('description_poste', 'LIKE', '%' . $search . '%')
                ->orWhere('missions', 'LIKE', '%' . $search . '%')
                ->orWhere('remuneration', 'LIKE', '%' . $search . '%');
        })
            ->orderByDesc('id')
            ->paginate(10);


        return response()->json($emplois);
    }

    // afficher un emploi
    public function getEmploi(Request $request)
    {
        $emploi = Emploi::findOrFail($request->input('emploi_id'));
        return response()->json($emploi);
    }

    // supprimer un emploi
    public function deleteEmploi(Request $request)
    {
        if (Emploi::findOrFail($request->input('emploi_id'))->delete()) {
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

    // candidater
    public function submitCandidature(Request $request)
    {
        $validatedData = $request->validate([
            'nom',
            'prenom',
            'email',
            'numero',
            'lieu_residence',
            'niveau',
            'lettre',
            'cv_pdf',
        ]);

        $candidature = Candidat::create($validatedData);
        if ($candidature) {
            if ($candidature->emplois->attach($request->input('emploi_id'))) {
                $data = [
                    "status" => 200,
                    "message" => "Votre demande a été enregistré !"
                ];
            }
        } else {
            $data = [
                "status" => 500,
                "message" => "Une erreur est survenue !"
            ];
        }

        return response()->json($data);
    }

    // afficher tous les candidats
    // public function indexCandidat(Request $request)
    // {
    //     $candidats = Candidat::select('*')->paginate(10);
    //     return response()->json($candidats);
    // }

    // afficher un candidat
    // public function getCandidat(Request $request)
    // {
    //     $candidat = Candidat::select('*')->where('id', $request->input('client_id'));
    //     return response()->json($candidat);
    // }

    public function getCandidat(Request $request)
    {
        $candidat = Candidat::findOrFail($request->input('client_id'));
        return response()->json($candidat);
    }


    // supprimer un candidat
    public function deleteCandidat(Request $request)
    {
        if (Candidat::findOrFail($request->input('client_id'))->delete()) {
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

    public function indexCandidat(Request $request)
    {
        $search = $request->input('search');
        $emplois = Candidat::select('*')->where(function ($query) use ($search) {
            $query->where('nom', 'LIKE', '%' . $search . '%')
                ->orWhere('prenom', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('numero', 'LIKE', '%' . $search . '%')
                ->orWhere('lieu_residence', 'LIKE', '%' . $search . '%')
                ->orWhere('niveau', 'LIKE', '%' . $search . '%');
        })
            ->orderByDesc('id')
            ->paginate(10);


        return response()->json($emplois);
    }
}
