@component('mail::message')
# Welcome To CodeFreeCamp

This is a community of follow developers and we love that have join us.

@component('mail::button', ['url' => 'https://parsclick.net'])
ParseClick
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
