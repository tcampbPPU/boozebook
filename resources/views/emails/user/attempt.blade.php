@component('mail::message')

# Hello!
## You have requested to login via e-mail

@component('mail::button', ['url' => $url])
    Sign In / Register
@endcomponent

@component('mail::subcopy')
    Note: Please contact support if you did not request this e-mail
@endcomponent

@endcomponent
