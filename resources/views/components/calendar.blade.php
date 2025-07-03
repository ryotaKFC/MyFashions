
<div style="width: 50%;margin: auto" id='calendar'></div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            // initialView: 'listWeek',
            initialView: 'dayGridMonth',
            events: '/api/fashions',
            eventContent: function(arg) {
                const imageUrl = arg.event.extendedProps.image_url;
                let customHtml = `<img src="${imageUrl}" style="width:100%; height:50px; object-fit:cover; border-radius:8px;" />`;
                return { html: customHtml };
            },
        });
        calendar.render();
    });
</script>
