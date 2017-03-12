jQuery(document).ready(function($) {

$('body').addClass('d4-slidemenu');
$('header').append('<button id="d4slidemenu-toggle" class="alignright dont-print icon-bars"></button>');

// MOBILE TOGGLE
$('body').on('click','#d4slidemenu-toggle , #mobile-overlay', function() { 
	$( 'body' ).toggleClass('mobile-expand');console.log("Mobile Toggled");
	$('#d4slidemenu-toggle').toggleClass('icon-chevron-right').toggleClass('icon-bars');
});

$('#d4slidemenu .sub-menu').slideUp(0);
$('#d4slidemenu .menu-item-has-children').prepend('<i class="icon-chevron-down"></i>');
$('#d4slidemenu i').click(function() {
	var parentLI = $(this).parent('li');
	var parentUL = $(parentLI).parent('ul')
	$(this).toggleClass('icon-chevron-down').toggleClass('icon-chevron-up');
	if(	$(parentLI).hasClass('sub-menu-expanded') ) {
		$(parentLI).toggleClass('sub-menu-expanded').children('.sub-menu').slideToggle(400);
	} else {
		$(parentUL).find('.sub-menu-expanded i').removeClass('icon-chevron-up').addClass('icon-chevron-down');
		$(parentUL).find('.sub-menu-expanded').removeClass('sub-menu-expanded').children('ul').slideUp(400);
		$(parentLI).toggleClass('sub-menu-expanded').children('.sub-menu').slideToggle(400);	
	}
});

});