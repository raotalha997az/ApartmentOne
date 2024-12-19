<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $userAuth = Auth::user();
        $user = User::find($userAuth->id, ['id','name', 'payment_status', 'payment_expires_at']);

        if (!$user->payment_status || now()->greaterThan($user->payment_expires_at)) {
            return redirect()->route('tenant.screening')->with('error', 'You need to complete payment to access properties.');
        }

        return $next($request);
    }
}
