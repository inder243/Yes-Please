

$(document).ready(function() {
        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
            // put your options and callbacks here
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: $('#calendar').fullCalendar('today'),
            defaultView: 'month',
            editable: true,
            displayEventTime:true,
            events: [
                {
                    title: 'All Day Event1',
                    start: '2019-04-01 10:00 am',
                    end: '2019-04-01 11:00 am'
                },
                
                
            ]
        });
    });