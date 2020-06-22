<?php

namespace App\Http\Middleware;

use App\Entity\User\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class FilledProfile
{
    public function handle($request, Closure $next)
    {
        /** @var User $user */
        $user = Auth::guard()->user();

        if (!$user->hasFilledProfile()) {
            return redirect()
                ->route('cabinet.profile.index')
                ->with('error', 'Please fill your profile.');
        }

        return $next($request);
    }
}