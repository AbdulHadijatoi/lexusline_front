@component('mail::message')
# New Contact Request

**From:** {{ $email }}

**Message:**

{{ $messageBody }}

@component('mail::button', ['url' => 'mailto:' . $email])
Reply to {{ $email }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
