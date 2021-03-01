{{--@php--}}
{{--$c_name = App\Models\G--}}
{{--    --}}
{{--    @endphp--}}

@component('mail::message')
    # We Confirm Your Request!


    Thank you for contacting us  for service assistance. The information you have provided has been
    forwarded to an admin.
    {{$servie_request->employee->name ?? " "}} {{$servie_request->employee->fname?? " "}}  phone = {{$servie_request->employee->phone ?? " "}}be in touch with you as soon as possible to begin
    the process.


    Thank you for your business.



    Thanks,

    {{ config('app.name') }}

@endcomponent
