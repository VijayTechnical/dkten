@component('mail::message')

{{ $msg['subject'] }}



@component('mail::panel')
 {{ $msg['token'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent