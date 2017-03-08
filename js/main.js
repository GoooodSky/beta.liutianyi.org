;$(function () {




'use strict';
var prevTop = 0;
var currTop = 0;


var sidebar = $('#sidebar'),
    clork = $('#clork'),
    date = $('#date'),
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

function clorkchange() {

	clork.hide();
	date.show();
	date.css('position', 'relative');

}


function datechange() {
	clork.show();
	date.hide();
	// date.css('position', 'relative');
}




$(window).on('scroll', function () {
	if ($(window).scrollTop() >= $(window).height())
		{
			backButton.fadeIn();
			sidebar_trigger.addClass('sidebar_trigger');

		     currTop = $(window).scrollTop();

				 if(currTop > prevTop)  //判断是往上还是往下滚动
					 {
					  sidebar_trigger.fadeOut();

					 } 

				 else
					 {
					 sidebar_trigger.fadeIn();
					 }

				 setTimeout(function(){prevTop = currTop},0);

		}

	else
	   {
		backButton.fadeOut();
		sidebar_trigger.removeClass('sidebar_trigger');
	   }


})



$(window).trigger('scroll');
		

sidebar_trigger.on('click', showSidebar)   // showSidebar后不能加()否则会默认执行
mask.on('click', hideSidebar)
sidebarOut.on('click', hideSidebar)
backButton.on('click', backToTop)
clork.on('mouseover', clorkchange)
date.on('mouseout', datechange)













			
})