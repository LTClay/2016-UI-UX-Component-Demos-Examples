/*LOADS THE GLOBAL HEADER AND FOOTER ITEMS*/
$.globalsections = function() {

/*LOAD THE TOP HEADER*/
$('#wrapper_content').prepend('<div id="topbar"></div>');

$('#topbar').load('globalheader.html',function(){
	/*highlight menu item for current page that contain url page name*/
	var url = document.URL;
	var url = url.substring(url.lastIndexOf('/') + 1);
	$('a[href*="'+url+'"]').addClass('currentpage');
});

/*LOAD IN TOP FOOTER*/
$('#footer').prepend('<div id="companylogos"></div>');
$('#companylogos').load('globalfooter.html',function(){
	/*JQ - AgED TOOLTIP*/
	$('#companylogos ul li div p').append('<img class="arrow" src="../images/tooltiparrow.gif" />');
	if($.browser.msie) {$('.arrow').css({'bottom':'-24px'});}
	var myTimer = null;
	$('#companylogos ul li a').hover(function(){
	  var tooltip = $(this).next('div');	
		if(!tooltip.is(':visible')) {tooltip.fadeIn("fast");}	
	},function() {
		 var tooltip = $(this).next('div'); 
		 myTimer = setTimeout(function(){tooltip.hide();},200);
	});
	$('#companylogos ul li div').hover(function() {
		clearTimeout(myTimer);
		},function() {	
		$(this).fadeOut("fast");	
	});
});
	
/*LOAD IN BOTTOM FOOTER*/
$('body').append('<div id="footer_bottom"></div>');
$('#footer_bottom').load('globalfooterbottom.html');

}

/*LOAD EXPANDING PANELS*/
$.expandPanels = function() {
if($('#panels').length) {
$('#panels .expand').click(function(e){
	e.preventDefault();
	var mclass=$(this).attr('class').split(' ')[1];
	var $mcontent = $("#" + mclass);
	if ($mcontent.is(':hidden')) {
	$mcontent.delay(100).fadeIn().slideDown().prev().css({'background-image':'url("../images/arrow_white_u.gif")'});
	}
	else {
	$mcontent.delay(100).slideUp().prev().css({'background-image':'url("../images/arrow_white_d.gif")'});
	}
});
}
}



$(function() { 
   $.globalsections();
   $.expandPanels();
});
