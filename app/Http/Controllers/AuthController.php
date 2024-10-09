<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterPostRequest;
use App\Models\Epave;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Rapatriement;


class AuthController extends Controller
{
    // Afficher le formulaire d'inscription
    public function form_register()
    {
        $users = User::all();
        return view('admin.register', compact('users'));
    }
    // Afficher le tableau de bord
    public function liste()
    {
        $users = User::all();
        return view('admin.liste', compact('users'));
    }

    // Validation du formulaire d'inscription
    public function form_register_validation(RegisterPostRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $utilisateur = new User();
            $utilisateur->name = $request->name;
            $utilisateur->prenom = $request->prenom;
            $utilisateur->matricule = $request->matricule;
            $utilisateur->entite_attache = $request->entite_attache;
            $utilisateur->email = $request->email;
            $utilisateur->telephone = $request->telephone;
            $utilisateur->role = $request->role;
            $utilisateur->password = Hash::make($request->password);
            $utilisateur->save();

            return redirect('liste')->with('status', 'L\'inscription a bien ete effectue');
        }
        return redirect('register')->back();

    }
    public function update_user($id)
    {
        $users = user::find($id);
        return view('admin.update', compact('users'));
    }
    public function update_user_traitement(RegisterPostRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $utilisateur = User::find($request->id);
            $utilisateur->name = $request->name;
            $utilisateur->prenom = $request->prenom;
            $utilisateur->matricule = $request->matricule;
            $utilisateur->entite_attache = $request->entite_attache;
            $utilisateur->email = $request->email;
            $utilisateur->telephone = $request->telephone;
            $utilisateur->role = $request->role;
            $utilisateur->update();
            return redirect('liste')->with('status', 'La modification a bien ete effectue');
        }
    }
    public function delete_user($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect('liste')->with('status', 'l\'utilisateur a bien supprimer');
    }
    public function form_epave()
    {
        $epaves = Epave::all()->map(function ($epave) {

            if (is_string($epave->photos)) {
                $epave->photos = json_decode($epave->photos, true);
            }
            return $epave;
        });
        return view('admin.epave', compact('epaves'));
    }
    public function index_view()
    {
        return view('admin.index');
    }

    public function menu_Agent()
    {
        return view('Agent.Ajouter');
    }

    public function login(Request $request)
    {
        // Valider les données d'entrée
        $request->validate([
            'matricule' => 'required|string',
            'password' => 'required|string',
        ]);

        // Récupérer les informations d'identification
        $credentials = $request->only('matricule', 'password');

        // Essayer de se connecter
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirection basée sur le rôle
            if ($user->role === 'administrateur') {
                return redirect()->intended('admin/index'); // Redirection pour les administrateurs
            } elseif ($user->role === 'agent') {
                return redirect()->intended('agent/index'); // Redirection pour les agents
            } else {
                Auth::logout();
                return redirect()->back()->withErrors([
                    'matricule' => 'Rôle d\'utilisateur non reconnu.',
                ]);
            }
        } else {
            return back()->withErrors([
                'matricule' => 'Les informations d\'identification ne correspondent pas à nos enregistrements.',
            ])->withInput();
        }
    }
    public function showRapatriements()
    {
        // Récupérer tous les rapatriements
        $rapatriements = Rapatriement::all();

        return view('admin.rapatriements', compact('rapatriements'));
    }

    // Méthode pour gérer la déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}