$.currentpage = function() {
var url = window.location.href;
var url = url.substring(url.lastIndexOf('/') + 1);
$('#topmain_nav').find('a[href="'+url+'"]').addClass('currentpage');
}

$(function(){
	$.currentpage();
});
