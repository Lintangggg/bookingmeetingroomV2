<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/stylecalendar.css') }}">
</head>

<body>
    <div class="logo">
        <a href="/"><img src="{{ asset('IMG/logo.png') }}"></a>
    </div>
    <ul>
        <li><a href="{{ route('login') }}"><div class="user"> <img src="{{ asset('IMG/user.png') }}"></div></a></li>
        <li><a href=" "><div id = "digital-clock"> </div>
        <script src = "{{ asset('JS/script.js') }}"> </script></a></li>
    </ul>

<div class="header">
    <h1>MEETING ROOM<br>BOOKING</h1>
    <p>Book your Meeting Room easily</p>
</div>

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div id='calendar' class="custom-calendar-style"></div>
            </div>
        </div>
    </div>
</form>

<!-- Include jQuery, FullCalendar, and moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var events = @json($events);
            var today = new Date();
            today.setHours(0, 0, 0, 0);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 800,
                headerToolbar: {
                    start: 'prev',
                    center: 'title',
                    end: 'next',
                },
                dayMaxEvents: 0, // allow "more" link when too many events,

                events: events,
                eventColor: '#000', // Change the color for the event circle
                dateClick: function(info) {
                    var clickedDate = info.dateStr;

                    if (info.date < today) {
                        return;
                    }

                    window.location.href = '{{ route("login") }}?clickedDate=' + clickedDate;
                },
                eventMouseEnter: function(info) {
                    info.el.style.backgroundColor = 'lightgray'; // Add hover background color to event
                    var popover = document.querySelector('.fc-popover'); // Find the popover element
                    if (popover) {
                        popover.style.backgroundColor = 'white'; // Adjust popover background color
                    }
                },
                eventMouseLeave: function(info) {
                    info.el.style.backgroundColor = 'white'; // Reset background color on event hover out
                    var popover = document.querySelector('.fc-popover'); // Find the popover element
                    if (popover) {
                        popover.style.backgroundColor = 'white'; // Reset popover background color on event hover out
                    }
                },
            });

            calendar.render();
        });
</script>

<div class="bgsatu">
	<svg xmlns="http://www.w3.org/2000/svg" width="1700"height="1772" viewBox="0 0 1280 1772" fill="none">
        <path fill-rule="evenodd"
        clip-rule="evenodd" d="M1041.11 1661.03C808.199 1774.9 475.088 1798.22
        238.635 1742.07C-3.05715 1684.68 -477.617 1359.23 -575.918 1158.25C-683.031
        939.251 -400.208 822.346 -264.648 589.339C-129.702 357.388 236.821 382.251
        504.915 278.036C759.287 179.155 983.651 -25.5812 1242.89 3.32086C1544.21
        36.915 1855.97 179.078 1929.37 436.847C2000.54 686.785 2023.99 1223.17
        1835.27 1449.83C1694.93 1618.39 1246.46 1560.64 1041.11 1661.03Z"
        fill="#FFA234"/>
	</svg>
</div>

</body>
</html>
