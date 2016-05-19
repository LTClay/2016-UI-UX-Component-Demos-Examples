/*JQ - PLUS SLIDER FOR COUNCIL SITE*/
$.plusslider = function() {
  if($('div').is('#psliderC')) {
  $('#psliderC').delay(200).fadeIn(500);
    $.getScript("jquery.plusslider.js", function(){
      
			/*leonard adjust settings here...*/
			$('#psliderC').plusSlider({
      sliderType: 'fader',
      fullWidth:false,
      width:925,
      height:400,
      keyboardNavigation:true,
      pauseOnHover:true,
      paginationThumbnails: true,
      });      
    });
  }
}

$(function() {
	$.plusslider();
});