@component('mail::message')
# Arisha Service Confirm Your Partner Request.

Dear {{$Emp->name?? " "}}

@component('mail::panel')
    Congrats, now you are a partner of Arisha Service .

@endcomponent@component('mail::panel')
    Your Login credentials
    Phone : {{$Emp->phone}}
    Password : {{$password}}
@endcomponent

@component('mail::button', ['url' => 'http://arisha-service.de/'])
LOGIN Arisha Service
@endcomponent

Thanks,<br>
Arisha Service
@endcomponent
