<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureCandidatEmailIsVerified
{
   public function handle($request, Closure $next)
{
    if (! $request->user('candidat') || ! $request->user('candidat')->hasVerifiedEmail()) {
        return redirect()->route('verification.notice');
    }

    return $next($request);
}
}
