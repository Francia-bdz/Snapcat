<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) 
    {
    //     // Vérifier si l'utilisateur connecté est administrateur (admin = 1)
    //     if ($request->user()->admin == 1) {
    //     // Si oui, continuez jusqu'à la prochaine requête
    //     return $next($request);
    // } else {
    // // Sinon renvoyez une 403
    // abort(403);
    //     return $next($request);
    // }
 }
}
