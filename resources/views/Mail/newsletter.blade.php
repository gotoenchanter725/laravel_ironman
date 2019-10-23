@component('mail::message')
# A New Product has been launched.

Dear Subscriber, would you like take a look on our new!!!

@component('mail::button', ['url' => 'rafi '])
Check Out Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent