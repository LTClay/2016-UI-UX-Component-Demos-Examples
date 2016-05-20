// Accordian Panels JavaScript Document

$.expandPanels = function() {
$('#panels .expand').click(function(e){
	e.preventDefault();
	var mclass=$(this).attr('class').split(' ')[1];
	var $mcontent = $("#" + mclass);
	if ($mcontent.is(':hidden')) {
	$mcontent.delay(100).fadeIn().slideDown().prev().css({'background-image':'url("images/arrow_white_u.gif")'});
	}
	else {
	$mcontent.delay(100).slideUp().prev().css({'background-image':'url("images/arrow_white_d.gif")'});
	}
});
}

$(function() {
	$.expandPanels();
});