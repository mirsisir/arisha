{{--@php--}}
{{--$c_name = App\Models\G--}}
{{--    --}}
{{--    @endphp--}}

@component('mail::message')
# We Received Your Request!


Thank you for contacting us  for service assistance. The information you have provided has been
forwarded to an admin. We will be in touch with you as soon as possible to begin the process.


Thank you for your business.


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>

{{ config('app.name') }}
@endcomponent
