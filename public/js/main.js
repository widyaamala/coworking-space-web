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

})(jQuery);

