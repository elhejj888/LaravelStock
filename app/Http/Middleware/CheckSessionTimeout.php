<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
/** */    
public function handle(Request $request, Closure $next): Response
{
    if (!$request->session()->get('lastActivity')) {
        $request->session()->put('lastActivity', now());
    }

    $sessionTimeout = 1200;
    $warningThreshold = 300; // 5 minutes en secondes

    $lastActivity = $request->session()->get('lastActivity');
    $timeSinceLastActivity = now()->diffInSeconds($lastActivity);

    if (auth()->check() && $timeSinceLastActivity > $sessionTimeout) {
        auth()->logout();
        return redirect('/login')->with('session_expired', 'Votre session a expiré en raison d\'inactivité.');
    } elseif (auth()->check() && $timeSinceLastActivity > ($sessionTimeout - $warningThreshold)) {
        // Afficher un message d'avertissement lorsque la session expire dans les 5 dernières minutes
        // Vous pouvez personnaliser ce message selon vos besoins.
        // Dans cet exemple, nous utilisons une clé de session 'session_warning' pour indiquer l'avertissement.
        $request->session()->put('session_warning', true);
    }

    $request->session()->put('lastActivity', now());

    return $next($request);
}

}