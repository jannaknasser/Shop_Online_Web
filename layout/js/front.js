$(function(){

	'use strict';
	//Switch between login & signup
	$('.login-page h1 span').click(function(){
		$(this).addClass('selected').siblings().removeClass('selected');
		$('.login-page form') .hide();
		$( '.' + $(this).data('class')).fadeIn(100);
	})

	// Trigger the SelectBox  
	$("select").selectBoxIt({
		autoWidth:false
		});


	// Hide Placeholder On Form Focus

	$('[placeholder]').focus(function(){
		$(this).attr('data-text',$(this).attr('placeholder'));
		$(this).attr('placeholder','');
	}).blur(function(){
		$(this).attr('placeholder',$(this).attr('data-text'));
	});



	// Add Asterisk On Required Fields

	$('input').each(function(){

		if ($(this).attr('required') == 'required') {

			$(this).after('<span class="asterisk">*</span>');
		}
	});


	// Confirmation message on button

	$('.confirm').click(function(){

		return confirm('Are You Sure?');
	});
});