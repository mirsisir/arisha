@component('mail::message')
    # Hello.
    # New You have a new Service Request

    Customer Name = {{$customer->name ??" "}}
    Customer Phone = {{$customer->phone??" "}}
    Customer Email = {{$customer->email??" "}}
    Customer Address = {{$customer->street??" "}} {{$customer->house_number??" "}}
            {{$customer->post_code??" "}} {{ $customer->city??" "}}


Requested Service Name = {{$data->service->name??" "}}

Date  = {{$data->date??" "}}
Start Time  = {{$data->start_time??" "}}



@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
