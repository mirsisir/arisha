@extends('layouts.employee.employee_base')
@section('content')

    @php
        $startDate = \Carbon\Carbon::now();
        $firstDay = \Carbon\Carbon::now()->startOfMonth();
        $lastDay = \Carbon\Carbon::now()->lastOfMonth();


        $diff = $lastDay->diffInDays($firstDay)+1;
        $tasks = \App\Models\ServiceRequest::all();

    @endphp


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">


    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },

                initialDate: today,
                navLinks: true, // can click day/week names to navigate views
                nowIndicator: true,

                weekNumbers: true,
                weekNumberCalculation: 'ISO',

                editable: true,
                selectable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [

                        @foreach($service_request as $s)
                    {
                        title: "{{$s->service->name}}",
                        start: "{{$s->date}}",
                        {{--start: "{{$s->date}}T{{$s->start_time}}:00:00",--}}
                        // colour:red,
                        @if ($s->status == "complete")
                        color: 'yellow',
                        textColor: 'black',
                        @endif
                            @if ($s->paid == 1)
                        color: 'green',
                        textColor: 'white',
                        @endif

                        url: '/employee/service_details_emp/{{$s->id}}',


                    },
                    @endforeach

                ],
                eventClick: function (info) {
                    info.jsEvent.preventDefault(); // don't let the browser navigate

                    if (info.event.url) {
                        window.open(info.event.url);
                    }
                }


            });

            calendar.render();
        });
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap'
        });

    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
            color: #ff0000;

        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }

        .fc .fc-button-group .fc-button {
            background-color: black !important;
        }

    </style>



    <div id='calendar' class="ml-5 mr-5"></div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>



@endsection


