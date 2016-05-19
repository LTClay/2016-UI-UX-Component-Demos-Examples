function adminShowHide(){
	$('#new_proj').hide();
	$('#projAD').click(function(){
		$('#new_proj').toggle();
	});
	
	$('#deleteP').hide();
	$('#projDE').click(function(){
		$('#deleteP').toggle();
	});

	

}
