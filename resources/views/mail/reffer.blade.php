@component('mail::message')

{{ $msg['subject'] }}

@component('mail::panel')
{{ $msg['message'] }}
@endcomponent

@component('mail::button', ['url' => $msg['url']])
Get Started
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent