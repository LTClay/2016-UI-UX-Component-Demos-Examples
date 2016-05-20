/*JQ - CAROUSEL LITE*/
$.carousels = function() {
 /*check to see if the ID exists...*/
 if ($('#mCarousel').length) {
	$.getScript("jquery.mc.js", function(){	
	/*Leonard adjust your settings here...*/
	$('.horizontal').jCarouselLite({
	btnNext: ".next",
	btnPrev: ".prev",
	auto:1500,
	speed:1500,
	visible:4		
	});
	
	});
 }
}

$(function() {
	$.carousels();
});