(function ($) {
  "use strict";
    $(window).scroll(function () {
        if ( $(window).scrollTop() > 100 ) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });
	
	// jQuery counterUp (used in Whu Us section)
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000
  });
  
	$(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($events as $event)
                {
                    title : '{{ $event->event_name }}',
                    start : '{{ $event->date }}',
                    url : '{{ route('events.edit', $event->id) }}'
                },
                @endforeach
            ]
        });
	});

})(jQuery);

