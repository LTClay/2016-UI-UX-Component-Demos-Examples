//Functions for the global settings of voxiant

function tp_con(){
	$('.voxMail').click(function(){		
		$('#the_contact').slideToggle('fast'); 
		$('html, body').animate({scrollTop:0}, 800)
	});
	$('#cont_a').click(function(){		
		$('#the_contact').slideToggle('fast'); 
	});
	
}

function expansion(){
	$('#web_pros').hide();
	$('#gra_pros').hide();
	$('#websp').click(function(){
		$('#web_pros').slideToggle();
	});
	$('#grasp').click(function(){
		$('#gra_pros').slideToggle();
	});
}

//scroll to the top
function scrollToTop () {
	$('a#top').click(function(){
			$('html, body').animate({scrollTop:0}, 800);
		});
}
