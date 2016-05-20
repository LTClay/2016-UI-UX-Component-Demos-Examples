/*JQ - CAROUSEL LITE*/
$.carousels = function() {
	var TOTAL_ITEMS = 12;
	var randNum = Math.floor(Math.random()*(TOTAL_ITEMS+1));

 /*check to see if the ID exists...*/
 if ($('#mCarousel').length) {
	$.getScript("jquery.mc.js", function(){	
	/*Leonard adjust your settings here...*/
	$('.horizontal').jCarouselLite({
	btnNext: ".next",
	btnPrev: ".prev",
	auto:1500,
	speed:1500,
	start: randNum,
	visible:5		
	});
	
	});
 }
}

$(function() {
	$.carousels();
});