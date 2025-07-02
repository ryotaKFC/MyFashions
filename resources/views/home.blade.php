@extends('layouts.app')
@section('content')

<h1 class="page-header">ホーム画面</h1>
<p>ようこそ、{{ Auth::user()->name }}さん</p>

<!-- カレンダー -->
<div style="width: 50%;margin: auto" id='calendar'></div>

<!-- コーデ登録ボタン -->
<p id="create-button"><a href="{{ route('fashions.create') }}">今日のコーデ登録</a></p>


<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: '/api/fashions',

        eventContent: function (arg) {
            const img = document.createElement('img');
            img.src = arg.event.extendedProps.photo_url;
            img.className = 'calendar_img';
            img.style.maxWidth = '100%';
            img.style.display = 'block';
            return { domNodes: [img] };
        }
    });

    calendar.render();
});
</script>




@include('fashions.fashions')
@endsection()
