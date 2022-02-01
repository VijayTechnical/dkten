@component('mail::message')

{{ $msg }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent