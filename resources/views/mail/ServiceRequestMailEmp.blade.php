@component('mail::message')
# Introduction

A new Service Request ....!!!!!!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
