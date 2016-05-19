<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Voxiant - Web &amp; Graphic Solutions</title>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link href="css/global.css" rel="stylesheet" type="text/css" />
	<link href="css/home.css" rel="stylesheet" type="text/css" />	
    <link rel="stylesheet" type="text/css" href="pslider.css"/>
	<!--<script type="text/javascript" src="js/jquery.js"/></script>-->
	
	<!--<script type="text/javascript" src="js/swfobject/swfobject.js"></script>-->

	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="pslider.js"></script>
<script type="text/javascript" src="js/global.js"/></script>
	<script type="text/javascript" src="js/imgSlider.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){	
			
			tp_con();
		});	
	</script>
	<!--<script type="text/javascript">
		var flashvars = {};
		flashvars.xml = "config.xml";
		flashvars.font = "font.swf";
		var attributes = {};
		attributes.wmode = "transparent";
		attributes.id = "slider";
		swfobject.embedSWF("cu3er.swf", "cu3er-container", "925", "400", "9", "expressInstall.swf", flashvars, attributes);
	</script>
-->	<style type="text/css">
	<!--
	
	#cu3er-container {width:925px; outline:0;}
	-->
	</style>
</head>
<body>
<!--- Header-->
<!--- top dark blue bar--->
<div id="topContact" style="display:block;">
	<?php include'contact/contact_bar.php';?>
</div>
<div id="top_bar">
	<div class="Cwrapper">
		<a id="cont_a">Contact Us</a>
	</div>
</div>
<!---Navigation Bar-->
<div id="navigation">
	<div class="Cwrapper">
		<div id="logo" class='logorepo'></div>
		<ul id="nav">
				<li class="about">
					<a href="whoweare.php"><em>Our Team</em></a>
				</li>
				<li class="we_done">
					<a href="whatwevedone.php"><em>What we've done</em></a>
				</li>
				<li class="services">
					<a href="services.php"><em>Where we specialize</em></a>
				</li>
				<li class="start">
					<a href="getstarted.php"><em>Lets get started</em></a>
				</li>
			</ul>
	</div>
</div>
<div id="mid_content">
	<div class="MC_shadow">
	<div class="Cwrapper">
		<div id="intro">
			<div id="cu3er-container">
				<div id="psliderC">
<a href="/"><img src="http://voxiantsolutions.com/images/Image_slide/img_slide_build.jpg" alt="" /></a>
<a href="/"><img src="http://voxiantsolutions.com/images/Image_slide/img_slide_solutions.jpg" alt="" /></a>
<a href="/"><img src="http://voxiantsolutions.com/images/Image_slide/img_slide_wp.jpg" alt="" /></a>  
<a href="/"><img src="http://voxiantsolutions.com/images/Image_slide/img_slide_brand.jpg" alt="" /></a> 
<a href="/"><img src="http://voxiantsolutions.com/images/Image_slide/img_slide_identity.jpg" alt="" /></a> 
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="pslider.js"></script>
			</div>			
		</div>		
	</div>
	</div>
</div>
<!--- Under the blue section-->
<div id="mid_low">
	<div class="Cwrapper">
		
	
		<div id="services">			
			<div id="graphics">				
				<div id="graphic_txt">
					<h2>Why Choose Voxiant?</h2>
					<p class="services">
						You probably have run into a lot of marketing firms. Unlike others, our solutions are designed
						<b>centered around you</b> - to meet your needs and your customer's needs. 
						Our <b>VoxyClient</b> application gives you a <b>well-organized platform</b> throughout your projects.
						What can we say.. we enjoy seeing a happy camper that uses our solutions. 
					</p>
					<a class="learn_more" href="services_process.php"></a>
				</div>
			</div>
			<div id="web">				
				<div id="web_txt">
					<h2>Specialized Solutions</h2>
					<p class="services">
						We offer value added solutions that can help drive your business to the next level. 
						We create strong <b>brand identity</b> for your business, and help strengthen it more with our
						<b>marketing solutions.</b> We design clean websites and add <b>e-commerce</b> and <b>blog</b> enhancements that will
						power your web presence. We make sure your website gets ranked high with <b>Search 
						Engine Optimization.</b>
					<p>
					<a class="learn_more"href="services.php"></a>
				</div>
			</div>
			<a href="getstarted.php"><div id="other_services"></div></a>
		</div>
	</div>
</div>
<!--- Footer-->
<?php
	include("footer.php");
?>

</body>
</html>