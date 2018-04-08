@component('mail::message')
    # Email Confirmation

    Please refer to the following link:

    @component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
        Verify Email
    @endcomponent

    With regards,<br>
    {{ config('app.name') }} team.
@endcomponent