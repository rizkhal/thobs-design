$(function() {
    "use strict";

    $(document).ready(function() {

        $('#calendar1').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: '2020-04-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [{
                    title: 'All Day Event',
                    start: '2020-04-01',
                },
                {
                    title: 'Long Event',
                    start: '2020-04-07',
                    end: '2020-04-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2020-04-09T16:00:00',
                    backgroundColor: '#ffc108',
                    borderColor: '#ffc108'

                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2020-04-16T16:00:00',
                    backgroundColor: '#ffc108',
                    borderColor: '#ffc108'

                },
                {
                    title: 'Conference',
                    start: '2020-04-11',
                    end: '2020-04-13',
                    backgroundColor: '#ff407b',
                    borderColor: '#ff407b'

                },
                {
                    title: 'Meeting',
                    start: '2020-04-12T10:30:00',
                    end: '2020-04-12T12:30:00',
                    backgroundColor: '#25d5f2',
                    borderColor: '#25d5f2'
                },
                {
                    title: 'Lunch',
                    start: '2020-04-12T12:00:00',
                    backgroundColor: '#ff407b',
                    borderColor: '#ff407b'

                },
                {
                    title: 'Meeting',
                    start: '2020-04-12T14:30:00',
                    backgroundColor: '#25d5f2',
                    borderColor: '#25d5f2'
                },
                {
                    title: 'Happy Hour',
                    start: '2020-04-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2020-04-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2020-04-13T07:00:00',
                    backgroundColor: '#ef172c',
                    borderColor: '#ef172c'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2020-04-28',
                    backgroundColor: '#4285F4',
                    borderColor: '#4285F4'
                }
            ]
        });

    });


    $(document).ready(function() {


        /* initialize the external events
        -----------------------------------------------------------------*/

        $('#external-events .fc-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });

        });


        /* initialize the calendar
        -----------------------------------------------------------------*/

        $('#calendar2').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            }
        });


    });


 });