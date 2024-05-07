<?php

namespace App\Http\Middleware;

use Closure; // Import Closure from global namespace
use Illuminate\Auth\Middleware\EnsureEmailIsVerified as Middleware;

class VerifyAccountActivation extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (!$request->user() || !$request->user()->verified) {
            return $request->expectsJson()
                    ? abort(403, 'Your account is not activated.')
                    : redirect()->route('activation.page');
        }

        return $next($request);
    }
}
