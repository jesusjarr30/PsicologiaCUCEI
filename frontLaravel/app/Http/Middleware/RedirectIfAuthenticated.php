<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $user = auth()->user();
        if(auth()->check() != null)
        {
            if($user->activo)
            {
                switch ($user->role) {
                    case 'ADMIN':
                        return redirect()->intended(route('AdminHome'));
                        break;
                    case 'USER':
                        return redirect()->intended(route('showCitasPsicologo'));
                        break;
                    default:
                        auth()->logout();
                        return redirect()->route('/');
                        break;
                }
            }
        }
        return $next($request);
    }
}
