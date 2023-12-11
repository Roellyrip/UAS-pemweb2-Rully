@component('mail::message')
    <p>Hi {{ $user->name }},</p>

    <p>
        Thanks for registering! To verify your email, click the button below:
    </p>

    @component('mail::button', ['url' => $verificationLink])
        Verify Email
    @endcomponent

    <p>
        If you did not create an account, no further action is required.
    </p>
@endcomponent
