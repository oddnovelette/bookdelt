<?php
namespace App\Services\Auth;

use App\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Email\Auth\EmailVerifier;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

/**
 * Class RegisterService
 * @package App\UseCases\Auth
 */
class RegisterService
{
    /**
     * @param RegisterRequest $request
     * @return void
     */
    public function register(RegisterRequest $request): void
    {
        $user = User::register(
            $request['name'],
            $request['email'],
            $request['password']
        );
        Mail::to($user->email)->send(new EmailVerifier($user));
        event(new Registered($user));
    }

    public function verify($id): void
    {
        /** @var User $user */
        $user = User::findOrFail($id);
        $user->verify();
    }
}