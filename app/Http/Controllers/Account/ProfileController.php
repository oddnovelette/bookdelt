<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Account
 */
class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('account.profile.home', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('account.profile.edit', compact('user'));
    }

    /**
     * Update user's profile info
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'last_name'));

        return redirect()->route('account.profile.home');
    }
}