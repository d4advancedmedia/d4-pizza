//In view animation script
(function($) {

	function check_if_in_view() {
	  var window_height = $window.height();
	  var window_third = window_height/3;
	  var window_top_position = $window.scrollTop();
	  var window_bottom_position = (window_top_position + window_height);

	  $.each($animation_elements, function() {
	    var $element = $(this);
	    var element_height = $element.outerHeight();
	    var element_top_position = $element.offset().top;
	    var element_bottom_position = (element_top_position + element_height);

	    //check to see if this current container is within viewport
	    if ((element_bottom_position - window_third >= window_top_position) &&
	        (element_top_position + window_third <= window_bottom_position)) {
	      $element.addClass('in-view');
	    } /*else {
	      $element.removeClass('in-view');
	    }*/
	  });
	}

	//Cache reference to window and animation items
	var $animation_elements = $('.animation-element');
	var $window = $(window);
	var $body = $('body');

	//Reduce the number of times the browser counts scroll events
	var didScroll = false;
	window.onscroll = setscroll;

	function setscroll() {
		didScroll = true;
	}

	setInterval(function() {
	    if(didScroll) {
	        didScroll = false;
	        check_if_in_view();
	        user_scrolled();
	    }
	}, 200);
	
	//Handling Resizing - if window dimensions change or orientation changes
	$window.on('scroll resize', setscroll);
	//if any of the elements which should be animated are within the viewport, they will be detected as in view and the animation applied as if we had scrolled.
	$window.trigger('scroll');

	//Set up scroll events for "scrolled"	
	function user_scrolled() {
		if(jQuery(window).scrollTop() > '50'){
			$body.addClass('user-scrolled');
	    }
	    if(jQuery(window).scrollTop() < '50'){
	        $body.removeClass('user-scrolled');;
	  	}
	}

})( jQuery );