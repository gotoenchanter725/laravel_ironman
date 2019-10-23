@component('mail::message')
# Change Password Confirmation

Mr. {{ $user_name }},Your password has been changed!

@component('mail::button', ['url' => 'rafi '])
TEST BUTTON
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent