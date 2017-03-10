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
	sidebar_trigger = $('#sidebar_trigger'),
	more = $('.more')

	;

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

function goToNext() {
	$('html , body').animate({scrollTop : 800}, 800)

}

function clorkChange() {

	clork.hide();
	date.show();
	date.css('position', 'relative');

}


function dateChange() {
	clork.show();
	date.hide();
	// date.css('position', 'relative');
}




$(window).on('scroll', function () {
	if ($(window).scrollTop() > $(window).height()){
		// backButton.fadeIn();
		sidebar_trigger.addClass('sidebar_trigger');

		currTop = $(window).scrollTop();

		 if(currTop > prevTop){  //判断是往上还是往下滚动
			  sidebar_trigger.fadeOut(1000);
	  		  backButton.fadeOut(1000);

		 } 

		 else{
			 sidebar_trigger.fadeIn(200);
			 backButton.fadeIn(200);
		 }

		setTimeout(function(){prevTop = currTop},0);

	}

	else{
		backButton.fadeOut(3000);
		sidebar_trigger.removeClass('sidebar_trigger');
	}


})



$(window).trigger('scroll');
		

sidebar_trigger.on('click', showSidebar)   // showSidebar后不能加()否则会默认执行
mask.on('click', hideSidebar)
sidebar.on('click', hideSidebar)
sidebarOut.on('click', hideSidebar)
backButton.on('click', backToTop)
more.on('click', goToNext)
clork.on('mouseover', clorkChange)
date.on('mouseout', dateChange)













			
})