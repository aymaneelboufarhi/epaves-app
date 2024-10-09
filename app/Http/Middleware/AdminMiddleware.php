<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié et est un administrateur
        if (Auth::check() && Auth::user()->role === 'administrateur') {
            return $next($request); // Permettre l'accès
        }

        // Rediriger vers une autre page si l'utilisateur n'est pas un administrateur
        return redirect('/')->with('error', 'Accès réservé aux administrateurs.');
    }
}
