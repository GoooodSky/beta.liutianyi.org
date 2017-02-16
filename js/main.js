;$(function () {




'use strict';

var sidebar = $('#sidebar'),
	mask = $('.mask'),
	sidebar_trigger = $('#sidebar_trigger');

function showSidebar() {
	mask.fadeIn();
	sidebar.css('right', 0);
}

function hideSidebar() {
	mask.fadeOut();
	sidebar.css('right', -sidebar.width());
}

sidebar_trigger.on('click', showSidebar)   // showSidebar后不能加()否则会默认执行
mask.on('click', hideSidebar)











			
})