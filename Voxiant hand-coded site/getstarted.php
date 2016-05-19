<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Voxiant - Web &amp; Graphic Solutions</title>
	<link href="css/global.css" rel="stylesheet" type="text/css" />
	<link href="css/start.css" rel="stylesheet" type="text/css" />
	<link href="css/img_slider.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"/></script>
	<script type="text/javascript" src="js/global.js"/></script>
	<script type="text/javascript" src="js/img_Slider.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			expansion();
			
			tp_con();
		});	
	</script>
</head>
<body>
<!--- Header-->
<!--- top dark blue bar--->
<div id="topContact" style="display:block;">
	<?php include'contact/contact_bar.php';?>
</div>

<!--- Slide down contact form-->
<div id="top_bar">
	<div class="Cwrapper">
		<a id="home_nav" href="index.php"><em>Home</em></a>
		<a id="cont_a">Contact Us</a>
	</div>
</div>
<!--- End slide down contact form-->
<div id="navigation">
	<div class="Cwrapper">
		<div id="logo"></div>
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
<!-----CONTENT---->
<div id="mid_content">
	<div class="Cwrapper">
		<div id="intro">
			<div class="int_LHS_inside getSt">
				<p class="pg_nav"><a href="index.php">Home</a> / Get Started</p>
				<p id="introtxtpg">Let's Get Started!</p>
				
				
			</div>
			<div class="int_RHS_inside">
				<p class="intro2">
					We truly value a great client relationship. And we enjoy helping
					our clients grow their businesses with our <b>client-friendly solutions.</b> Let us help you take your next step!
				</p>
				<p class="intro3">
					We offer a <b>Free</b> initial consultation, where we can learn about your need
					and you can explain to us more of what you want from us!
				</p>
				<p class="intro3">
					Take a minute to <a href="services_process.php">learn more</a> about the process we use to build creative solutions
					for your business. 
				</p>
			</div>			
		</div>
		
	</div>
</div>

<!----lower middle content---->
<div id="low_mid">
	<div class="Cwrapper">
		<div id="next">
			<p class="pg_title">What's Next?</p>
			<p><a class="voxMail" >Contact Us</a> - Write us an email or give us a call!</p>
			<p> Let's set up a time to discuss 
			how we can assist you grow your business with our <a href="services.php">specialized services.</a></p>
		</div>
	
	</div>
</div>
<!--- Footer-->
<?php
	include("footer.php");
?>

</body>
</html>