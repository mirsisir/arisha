@component('mail::message')
# New Service Request

Name = {{$customer->name}} <br>
Phone = {{$customer->phone}}<br>
Email = {{$customer->email}}<br>
Address = {{$customer->address}}<br>

<br>
Service = {{$data->service->name}}<br>
Duration = {{$data->duration}}<br>
Date  = {{$data->date}}<br>
Start Time  = {{$data->start_time}}<br>
Employee  = {{$data->employee->fname}} {{$data->employee->lname}}<br>


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
