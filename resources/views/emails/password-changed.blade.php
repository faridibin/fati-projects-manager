@component('mail::message')
@isset($user->name)
<h1>@lang('Hello') {{ $user->name }},</h1>
@endisset



@lang('Regards'),<br>
{{ config('mail.from.name') }}

@endcomponent
