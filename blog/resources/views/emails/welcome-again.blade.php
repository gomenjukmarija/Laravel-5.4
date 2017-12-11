@component('mail::message')
# Introduction

Thank so much for registering!

@component('mail::button', ['url' => 'https://uk.wikipedia.org'])
Start
@endcomponent

@component('mail::panel', ['url' => ''])
    Some are born great, some achieve greatness, and some have greatness thrust upon them.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
