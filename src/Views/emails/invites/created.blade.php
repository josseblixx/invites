@component('mail::message')
# Uitnodiging voor {{ env('APP_NAME') }}

Je bent uitgenodigd om gebruiker te worden van {{ env('APP_NAME') }}

@component('mail::button', ['url' => route('blixx_invite_follow', ['invite'=>$invite->id, 'token'=>$invite->token], true)])
Account aanmaken
@endcomponent

Groeten,<br>
{{ config('app.name') }}
@endcomponent
