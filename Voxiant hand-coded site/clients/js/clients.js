//Funtions for login and password fields
function changeLog()
 {
    document.getElementById('login01').style.display='none';
    document.getElementById('login02').style.display='';
    document.getElementById('loginN').focus();
 }
 function restoreLog()
 {
    if(document.getElementById('loginN').value=='')
    {
      document.getElementById('login01').style.display='';
      document.getElementById('login02').style.display='none';
    }
 }
 
 function changeBox()
 {
    document.getElementById('pass01').style.display='none';
    document.getElementById('pass02').style.display='';
    document.getElementById('passwd').focus();
 }
 function restoreBox()
 {
    if(document.getElementById('passwd').value=='')
    {
      document.getElementById('pass01').style.display='';
      document.getElementById('pass02').style.display='none';
    }
 }
 
 //Clients Admin related styles
 function adminShowHide()
 {
	$('#form01_f1').hide();
	$('#form01_btn1').click(function(){
		$('#form01_f1').toggle();
	});
	
	$('#form02_f1').hide();
	$('#form02_btn1').click(function(){
		$('#form02_f1').toggle();
	});
	
	$('#form02_f2').hide();
	$('#form02_btn2').click(function(){
		$('#form02_f2').toggle();
	});
	
	$('#form02_f3').hide();
	$('#form02_btn3').click(function(){
		$('#form02_f3').toggle();
	});
	
	$('#form03').hide();
	$('#formica03').click(function(){
		$('#form03').toggle();
	});
	
	$('#form03_f1').hide();
	$('#form03_btn1').click(function(){
		$('#form03_f1').toggle();
	});
	
	$('#form04').hide();
	$('#formica04').click(function(){
		$('#form04').toggle();
	});
 }
 //clients page related styles
 function clientActive()
 {
	$('#PCIR_h_up').hide();
	$('#PCIR_h_upd').click(function(){
		$('div.PCIR_uf').slideDown('fast');
		$(this).hide();
		$('#PCIR_h_up').show();
	});
	$('#PCIR_h_up').click(function(){
		$('.PCIR_uf').slideUp('fast');
		$(this).hide();
		$('#PCIR_h_upd').show();
	});

 }