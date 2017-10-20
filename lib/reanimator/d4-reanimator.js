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
	    	if ($element.hasClass('animate-number') && !$element.hasClass('number-animated')) {
	    		$element.addClass('number-animated');
	    		var stat = $(this).attr('data-stat');
				var speed = 3000; //Milliseconds to complete animation
	            $(this).animateNumber({ number: stat }, speed);	       
	    	}
	    } /*else {
	      $element.removeClass('in-view');
	    }*/
	  });
	}

	//Cache reference to window and animation items
	var $animation_elements = $('.animation-element');
	var $window = $(window);
	var $body = $('body');

	$('.animate-number').each(function () {
		var statint = parseInt($(this).html());
		$(this).attr('data-stat', statint).html('0');
	});

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

/*
 jQuery animateNumber plugin v0.0.14
 (c) 2013, Alexandr Borisov.
 https://github.com/aishek/jquery-animateNumber
*/
(function(d){var r=function(b){return b.split("").reverse().join("")},m={numberStep:function(b,a){var e=Math.floor(b);d(a.elem).text(e)}},g=function(b){var a=b.elem;a.nodeType&&a.parentNode&&(a=a._animateNumberSetter,a||(a=m.numberStep),a(b.now,b))};d.Tween&&d.Tween.propHooks?d.Tween.propHooks.number={set:g}:d.fx.step.number=g;d.animateNumber={numberStepFactories:{append:function(b){return function(a,e){var f=Math.floor(a);d(e.elem).prop("number",a).text(f+b)}},separator:function(b,a,e){b=b||" ";
a=a||3;e=e||"";return function(f,k){var u=0>f,c=Math.floor((u?-1:1)*f).toString(),n=d(k.elem);if(c.length>a){for(var h=c,l=a,m=h.split("").reverse(),c=[],p,s,q,t=0,g=Math.ceil(h.length/l);t<g;t++){p="";for(q=0;q<l;q++){s=t*l+q;if(s===h.length)break;p+=m[s]}c.push(p)}h=c.length-1;l=r(c[h]);c[h]=r(parseInt(l,10).toString());c=c.join(b);c=r(c)}n.prop("number",f).text((u?"-":"")+c+e)}}}};d.fn.animateNumber=function(){for(var b=arguments[0],a=d.extend({},m,b),e=d(this),f=[a],k=1,g=arguments.length;k<g;k++)f.push(arguments[k]);
if(b.numberStep){var c=this.each(function(){this._animateNumberSetter=b.numberStep}),n=a.complete;a.complete=function(){c.each(function(){delete this._animateNumberSetter});n&&n.apply(this,arguments)}}return e.animate.apply(e,f)}})(jQuery);