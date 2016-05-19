<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Voxiant - Web &amp; Graphic Solutions</title>
	<link href="css/global.css" rel="stylesheet" type="text/css" />
	<link href="css/services.css" rel="stylesheet" type="text/css" />
	<link href="css/img_slider.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"/></script>
	<script type="text/javascript" src="js/global.js"/></script>
	<script type="text/javascript" src="js/voxtip.js"/></script>
	<script type="text/javascript" src="js/img_Slider.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			expansion();			
			tp_con();
			
			//Scroll to the top of the page
			scrollToTop();
			
			//Tool tips
			$('.voxtip').tipsy({gravity: 's'});
			$('.voxtipw').tipsy({gravity: 'w'});
			$('.voxtipe').tipsy({gravity: 'e'});
			$('.voxtipn').tipsy({gravity: 'n'});
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
					<a href=""><em>Where we specialize</em></a>
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
			<div class="int_LHS_inside servL">
				<p class="pg_nav"><a href="index.php">Home</a> / Where We Specialized</p>
				<p id="introtxtpg">Where we specialize</p>
				<p id="service_selection">
					<a class="subserv foc_serv"></a>
					<a class="subserv procs voxtip" title="Click here to learn our valued process we adhere to throughout our services to you" href="services_process.php"></a>				
				</p>
			
				
			</div>
			<div class="int_RHS_inside servR">
				<p class="intro2">
					We offer specialized services in <b>Website Development</b> with a greater focus on <b>User-Friendly Experience
					</b> and <b>Audience-Targeted Content</b>. Our Graphic Designing Services
					provides an equally strong <b>User-Targeted Brand Identity Creation</b> solutions, and effective marketing
					content creations that will place your business a step ahead.
								
				</p>
				<p class="intro3">
					At the end of our help for you, we offer <b>Client-Friendly Ongoing Support</b> and upgrading services
					that will help your business keep up with the changing trends and seasons.
				</p>
			</div>
		</div>
	</div>
</div>


<div id="low_low">
	<div class="Cwrapper">
		<p class="pg_title">Specialized Services</p>
			<div id="serv_hold" >
				<div class="R12 R11right">
					<h2>Web Strategy</h2>
					<p class="process_txt">
						Strategically planning your approach for web appearance is a vital component. Web strategies that are catered to 
						meet  both your business requirements and your users' expectations can drive a sucessful web strategy with our 
						expert assistance.
					<p>
				</div>
				<div class="R12">
					<h2>Website Developing</h2>
					<p class="process_txt">
						We develop strong websites that can provide your business a great competitive advantage. 
						We make sure your website loads faster, user-centered, and information is structured to appeal at first glance.
					<p>
				</div>
				<div class="R12 R11right">
					<h2>Online Marketing</h2>
					<p class="process_txt">
						Effective online marketing efforts can strengthen your brand and your business. We provide outstanding Web 
						marketing solutions, which are designed for current marketing trends. Among them are, social media marketing, 
						search engine marketing, and powerful email campaigns. 
					<p>
				</div>
				<div class="R12">
					<h2>E-Commerce Solutions</h2>
					<p class="process_txt">
						We provide well designed eCommerce websites that will allow you to increase your sales online. We can also advise you on using
						our marketing solutions to bring more power to your eCommerce site.  
					<p>
				</div>
				<div class="R12 R11right">
					<h2>Search Engine Optimization</h2>
					<p class="process_txt">
						Higher SEO ranking is an extremely important component of our solutions. We will process
						your website with great techniques to make your website visible on search engines.
					<p>
				</div>
				<div class="R12 ">
					<h2>Brand Identity Creation</h2>
					<p class="process_txt">
						We assist businesses with the creation of a strong Brand-Image of themselves with our creative design
						skills. We also help and train local businesses to gain a customer base using our online marketing solutions.
					<p>
				</div>
				<div class="R12 R11right">
					<h2>Graphic Designing</h2>
					<p class="process_txt">
						We design user-centered Graphic content ranging from logos to large scale posters. We make fine quality designs that are 
						made with creativity and targeted to address your audience.
					<p>
				</div>
				
			</div>
	</div>
</div>


<!---Padding at the bottom of the page--->
<div id="spacer">
	<div class="Cwrapper">
		<div class="bottom">
			<a id="top" class="backtop"></a>
		</div>
	</div>
</div>
<!--- Footer-->
<?php
	include("footer.php");
?>

</body>
</html>