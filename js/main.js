;$(function () {




'use strict';

var sidebar = $('#sidebar'),
	sidebarOut = $('#sidebar .fa'),
	mask = $('.mask'),
	backButton = $('.back-to-top'),
	sidebar_trigger = $('#sidebar_trigger');

function showSidebar() {
	mask.fadeIn();
	sidebar.css('right', 0);
}

function hideSidebar() {
	mask.fadeOut();
	sidebar.css('right', -sidebar.width());
}

function backToTop() {
	$('html , body').animate({scrollTop : 0}, 800)

}



$(window).on('scroll', function () {
	if ($(window).scrollTop() > $(window).height())
		backButton.fadeIn();
	else
		backButton.fadeOut();


})

$(window).trigger('scroll');
		

sidebar_trigger.on('click', showSidebar)   // showSidebar后不能加()否则会默认执行
mask.on('click', hideSidebar)
sidebarOut.on('click', hideSidebar)
backButton.on('click', backToTop)














			
})