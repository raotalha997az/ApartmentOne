<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->payment_status || now()->greaterThan($user->payment_expires_at)) {
            return redirect()->route('tenant.stripe')->with('error', 'You need to complete payment to access properties.');
        }

        return $next($request);
    }
}