@component('mail::message')
    # We Reject Your Request!


    Subject: Booking cancellation
    Hello.
    The following booking has been cancelled.
    Service: {{$data->name??" "}}
    Date: {{$data->date??" "}}
    Time: {{$data->time??" "}}


@endcomponent
