@component('mail::message')

{{ $msg['subject'] }}
@component('mail::button', ['url' => $msg['url']])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent