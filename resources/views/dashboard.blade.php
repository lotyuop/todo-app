@extends('layouts.main')

@section('css')

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('calender/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">

@endsection



@section('content')

    <div class="row my-4" >


            <div id='calendar'></div>



    </div>


@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>



    <script>


        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: new Date().toISOString().slice(0, 10),
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                        @if($task !=null)
                        @foreach($task as $t)
                    {
                        title: '{{$t->task}}',
                        url: '{{route('viewone',[$t->id])}}',
                        start: '{{$t->start_date}}',
                    },
                        @endforeach

                        @else
                    {
                        title: 'No Event For Today',

                        start: 'new Date().toISOString().slice(0, 10)',
                    },
                    @endif

                ]
            });
            calendar.render();
        });

    </script>

    </script>


@endsection
