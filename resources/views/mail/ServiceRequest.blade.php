@component('mail::message')
    # Hello.
    # New You have a new Service Request

    Customer Name = {{$customer->name ??" "}} <br>
    Customer Phone = {{$customer->phone??" "}}<br>
    Customer Email = {{$customer->email??" "}}<br>
    Customer Address = {{$customer->street??" "}} {{$customer->house_number??" "}}<br>
            {{$customer->post_code??" "}}<br>{{$customer->city??" "}}<br>

<br>
Requested Service Name = {{$data->service->name??" "}}<br>

Date  = {{$data->date??" "}}<br>
Start Time  = {{$data->start_time??" "}}<br>



@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
