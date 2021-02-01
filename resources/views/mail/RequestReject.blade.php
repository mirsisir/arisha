@component('mail::message')
    # We Reject Your Request!




    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,<br>

    {{ config('app.name') }}
@endcomponent
