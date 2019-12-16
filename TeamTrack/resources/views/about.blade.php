<html>

@include('layouts.cssimports')
@include('js.jsimports')

    <link href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' rel='stylesheet' />

    <script src='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>

<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
           plugins: [ 'dayGrid' ],
           events: [
                {
                    title: 'Collect Data',
                    start: '2019-12-12',
                    end: '2019-12-12',
                    color: 'rgb(100,100,100)',   // an option!
                    textColor: 'white',// an option!
                }
                // more events ...
            ],
            
            
        });

        calendar.render();
      });

</script>

<body>
    <div class="container p-4">
        <div class="row justify-content-center card p-4">
            <div class="col-md-8 p-4">

                <h1>About TeamTrack</h1>
                <hr>
                <h5>
                    Make work life simpler, more pleasant and more productive.
                </h5>
                
                <div id='calendar'></div>
               
            </div>
        </div>
    </div>
</body>
