<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

/**
 * Class FilledProfile
 * @package App\Http\Middleware
 */
class FilledProfile
{
    /**
     * @param $request
     * @param \Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, \Closure $next)
    {
        $user = Auth::user();

        if (!$user->hasFilledProfile()) {
            return redirect()
                ->route('account.profile.home')
                ->with('error', 'Please fill your profile.');
        }

        return $next($request);
    }
}