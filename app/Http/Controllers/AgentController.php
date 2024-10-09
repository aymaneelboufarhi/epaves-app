<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Epave;

use App\Http\Requests\StoreEpaveRequest;

use Illuminate\Http\Request;
use App\Models\Rapatriement;
use App\Models\User;
use App\Notifications\RapatriementNotification;
use Illuminate\Support\Facades\Notification;

class AgentController extends Controller
{
    // Afficher le formulaire d'epaves
    public function menu_Agent()
    {
        $Epaves = Epave::all();
        return view('Agent.Ajouter', compact('Epaves'));
    }
    // Validation des données d'entrée
    public function store(StoreEpaveRequest $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'categorie' => 'required|string|max:255',
            'type_lieu_decouverte' => 'required|string',
            'lieu_decouverte' => 'required|string|max:255',
            'date_heure_decouverte' => 'required|date',
            'description' => 'nullable|string',
            'localisation' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'dimensions' => 'required|string|max:255',
            'signes_distinctifs' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'statut' => 'required|string',
        ]);

        // Gestion des photos
        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos', 'public'); // Stockage de la photo
                $photos[] = $path; // Ajout du chemin d'accès au tableau $photos
            }
        }

        // Génération et ajout de l'UUID
        $data['uuid'] = $this->generateCustomUUID(10);
        $data['photos'] = $photos; // Ajout des photos dans les données

        // Création de l'épave avec les données complètes
        Epave::create($data);

        // Redirection avec un message de succès
        return redirect()->route('Agent.Ajouter')->with('success', 'Épave enregistrée avec succès !');
    }

    public function form_epaveAgent()
    {
        $epaves = Epave::all()->map(function ($epave) {
            if (is_string($epave->photos)) {
                $epave->photos = json_decode($epave->photos, true);
            }
            return $epave;
        });

        return view('Agent.epaveAgent', compact('epaves'));
    }
    private function generateCustomUUID($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $uuid = '';

        for ($i = 0; $i < $length; $i++) {
            $uuid .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $uuid;
    }

    public function search(Request $request)
    {
        $query = Epave::query();

        // Recherche par UUID
        if ($request->has('uuid') && !empty($request->input('uuid'))) {
            $query->where('uuid', $request->input('uuid'));
        }
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }
        // Recherche par catégorie
        if ($request->has('categorie') && !empty($request->input('categorie'))) {
            $query->where('categorie', 'like', '%' . $request->input('categorie') . '%');
        }

        // Recherche par type de lieu de découverte
        if ($request->has('type_lieu_decouverte') && !empty($request->input('type_lieu_decouverte'))) {
            $query->where('type_lieu_decouverte', 'like', '%' . $request->input('type_lieu_decouverte') . '%');
        }

        // Recherche par lieu de découverte
        if ($request->has('lieu_decouverte') && !empty($request->input('lieu_decouverte'))) {
            $query->where('lieu_decouverte', 'like', '%' . $request->input('lieu_decouverte') . '%');
        }

        // Recherche par date et heure de découverte
        if ($request->has('date_heure_decouverte') && !empty($request->input('date_heure_decouverte'))) {
            $query->whereDate('date_heure_decouverte', $request->input('date_heure_decouverte'));
        }

        // Recherche par description
        if ($request->has('description') && !empty($request->input('description'))) {
            $query->where('description', 'like', '%' . $request->input('description') . '%');
        }

        // Recherche par localisation
        if ($request->has('localisation') && !empty($request->input('localisation'))) {
            $query->where('localisation', 'like', '%' . $request->input('localisation') . '%');
        }

        $epaves = $query->get()->map(function ($epave) {
            if (is_string($epave->photos)) {
                $epave->photos = json_decode($epave->photos, true);
            }
            return $epave;
        });

        return view('Agent.search', compact('epaves'));
    }


    public function edit($id)
    {
        $epave = Epave::findOrFail($id);
        return view('Agent.editEpave', compact('epave'));
    }

    // Mettre à jour l'épave
    public function update(Request $request, $id)
    {
        $epave = Epave::findOrFail($id);
        $epave->update($request->all());
        return redirect()->route('epaveAgent')->with('success', 'Épave mise à jour avec succès.');
    }
    public function destroy($id)
    {
        // Rechercher l'épave par son ID
        $epave = Epave::find($id);

        // Vérifier si l'épave existe
        if (!$epave) {
            return redirect()->route('epaveAgent')->with('error', 'Épave non trouvée.');
        }

        // Supprimer l'épave
        $epave->delete();

        // Rediriger avec un message de succès
        return redirect()->route('epaveAgent')->with('success', 'Épave supprimée avec succès.');
    }
    public function index_view1()
    {
        return view('Agent.index');
    }

    public function createRapatriement()
    {
        return view('Agent.rapatriement');
    }

    public function storeRapatriement(Request $request)
    {
        $data = $request->validate([
            'epave_id' => 'required|exists:epaves,id',
            'gare_recuperation' => 'required|string|max:255',
            'nom_client' => 'required|string|max:255',
            'prenom_client' => 'required|string|max:255',
            'cin_client' => 'required|string|max:20',
            'email_client' => 'required|email',
            'telephone_client' => 'required|string|max:20',
            'od_client' => 'required|string|max:255',
            'train_client' => 'required|string|max:255',
            'date_heure_voyage' => 'required|date',
            'copie_billet' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('copie_billet')) {
            $data['copie_billet'] = $request->file('copie_billet')->store('billets', 'public');
        }

        Rapatriement::create($data);

        // Envoi de notifications aux parties concernées
        $usersToNotify = User::whereIn('role', ['relation_client', 'chef_antenne', 'act', 'chef_gare'])->get();
        Notification::send($usersToNotify, new RapatriementNotification());
        // Vous pouvez utiliser des notifications Laravel pour cela

        return redirect()->route('rapatriement.create')->with('success', 'Demande de rapatriement soumise avec succès.');
    }
    public function showRapatriements()
    {
        // Récupérer tous les rapatriements
        $rapatriements = Rapatriement::all();

        return view('Agent.rapatriements', compact('rapatriements'));
    }
    public function editRapatriement($id)
    {
        $rapatriement = Rapatriement::findOrFail($id);
        return view('Agent.editRapatriement', compact('rapatriement'));
    }

    public function destroyRapatriement($id)
    {
        $rapatriement = Rapatriement::findOrFail($id);
        $rapatriement->delete();

        return redirect()->route('rapatriements')->with('success', 'Rapatriement supprimé avec succès.');
    }

}
