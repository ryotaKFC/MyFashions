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
            eventContent: function(arg) {
                const imageUrl = arg.event.extendedProps.image_url;
                let customHtml = `<img src="${imageUrl}" style="width:100%; height:100px; object-fit:cover; border-radius:8px;" />`;
                return { html: customHtml };
            },
        });
        calendar.render();
    });
</script>



@include('fashions.fashions')
@endsection()
