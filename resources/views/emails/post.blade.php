@component('mail::message')

A new post **{{ $title }}** has been published. 
<br>
Mail Body:

**{{ $body }}**

<br>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent