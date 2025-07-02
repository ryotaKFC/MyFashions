@extends('layouts.app')
@section('content')

    <div style="width: 50%;margin: auto">
        <div id='calendar'></div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
    // document.addEventListener('DOMContentLoaded', function () {
    //     var calendarEl = document.getElementById('calendar');
    //     var calendar = new FullCalendar.Calendar(calendarEl, {
    //         initialView: 'dayGridMonth',
    //     });
    //     calendar.render();
    // });
        document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',

            // イベントを取得するAPI
            events: '/api/fashions',

            // 各イベントを画像付きで描画
            eventContent: function(arg) {
                const photoUrl = arg.event.extendedProps.photo_url;
                const detailUrl = arg.event.extendedProps.url;

                return {
                    html: `
                        <a href="${detailUrl}" target="_blank">
                            <img src="${photoUrl}" style="width: 100%; max-width: 60px; border-radius: 4px;">
                        </a>
                    `
                };
            }
        });

        calendar.render();
    });
</script>

<h1 class="page-heading">マイページ</h1>
<p>ようこそ、{{ Auth::user()->name }}さん｜<a href="{{ route('fashions.create') }}">記事を書く</a></p>
<style>
    img {
        max-width: 40px;
        margin: 2px;
    }
</style>

@include('fashions.fashions')
@endsection()
