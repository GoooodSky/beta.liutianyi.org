$(function () {

'use strict';

var sidebar = $('#sidebar'),
    clork = $('#clork'),
    date = $('#date'),
	sidebarOut = $('#sidebar .fa'),
	mask = $('.mask'),
	backButton = $('#back_top'),
	sidebar_trigger = $('#sidebar_trigger'),
	more = $('.more'),
    nav = $('nav')
	;

	
$(".button-collapse").sideNav();
$('.carousel.carousel-slider').carousel({fullWidth: true});
$('.slider').slider();

function showSidebar() {
	mask.fadeIn();
	sidebar.css({
		left: 0,
		top: nav.height()
	});
}

function hideSidebar() {
	mask.fadeOut();
	sidebar.css('left', -sidebar.width());
}

function backToTop() {
	$('html , body').animate({scrollTop : 0}, 800)
}

function goToNext() {
	$('html , body').animate({scrollTop : 700}, 800)
}

function clorkChange() {
	clork.hide();
	date.show();
	date.css('position', 'relative');
}

function dateChange() {
	clork.show();
	date.hide();
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
sidebar.on('click', hideSidebar)
sidebarOut.on('click', hideSidebar)
backButton.on('click', backToTop)
more.on('click', goToNext)
clork.on('mouseover click', clorkChange)
date.on('mouseout click', dateChange)









			
})