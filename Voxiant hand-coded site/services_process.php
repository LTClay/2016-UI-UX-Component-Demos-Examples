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
			<div class="int_LHS_inside servL">
				<p class="pg_nav"><a href="index.php">Home</a> / Where We Specialized / The Process</p>
				<p id="introtxtpg">Where we specialize</p>
				<p id="service_selection">
					<a class="subserv serv voxtip" title="Click here to learn more about our services"href="services.php"></a>
					<a class="subserv foc_procs" ></a>				
				</p>
			
				
			</div>
			<div class="int_RHS_inside servR">
				<p class="intro2">
					We offer specialized services in <b>Website Developing</b> with a greater focus on <b>User-Friendly Experience
					</b> and <b>Audience-Targeted Content</b>. Our Graphic Designing Services
					provides an equally strong <b>User-Targeted Brand Identity Creation</b> solutions and effective marketing
					content creations that will place your business a step ahead.
								
				</p>
				<p class="intro3">
					At the end of our help for you, we offer <b>Client-Friendly Ongoing Support</b> and upgrading services,
					that will help your business keep up with the changing trends and seasons.
				</p>
			</div>
		</div>
	</div>
</div>

<!----lower middle content---->
<div id="low_mid">
	<div class="Cwrapper">
		<p class="pg_title">The Process</p>
		<div id="process">
			<div class="R11 R11right">
				<p class="img R01"></p>
				<div class="R11_text">
					<h2>Intial Consultation</h2>
					<p class="process_txt">
						With all our services we offer <b>free</b> consultation. 
						We are willing to meet with you at your convenience to talk with you
						about your need and how our specialty services can suffice your 
						requirements above and beyond.
					</p>
				</div>
			</div>
			<div class="R11">
				<p class="img R02"></p>
				<div class="R11_text active">
					<h2>Learn your audience and market</h2>
					<p class="process_txt">
						We thoroughly research your user and your competition. We will learn the personality, 
						brand feel, and identity of your business and will work with you to derive at 
						designing decisions.
					</p>
				</div>
			</div>
			<div class="R11 R11right">
				<p class="img R03"></p>
				<div class="R11_text active">
					<h2>Optimizing the solution</h2>
					<p class="process_txt">
						We adhere your needs and with our expertise in information architecture,
						we will design your solution that will execute to all the requirements.
					</p>
				</div>
			</div>
			<div class="R11">
				<p class="img R04"></p>
				<div class="R11_text active">
				<h2>Simple solutions to your need</h2>
				<p class="process_txt">
					We absorb the needs of your organization and will design iterations from wireframes 
					and sketches to mock-ups and fully complete solutions, as we strive to produce the best 
					solution for you.
				</p>
				</div>
			</div>
		</div>
		<div id="learnMore">
			<p class="learnm_head">
				Learn More
			</p>
			<p class="learnm_txt">
				<span>Learn more</span> about our client-oriented process, specific for the type of 
				solutions you require.
			</p>
			<!------Learn more about web process-->
			<div class="lm_specif">
				<h2 class="pg3">Web Solutions</h2>
				<p>production process more specifically.</p>
				<a id="websp" title="Click here to Expand Web Solutions" class="slideDw voxtip"></a>
			</div>
		</div>
	</div>
</div>

<!----------Expanding section--->
<div class="expand_sec">
	<div class="Cwrapper">
		<div id="web_pros" >
			<div class="R11 R11right">
				<p class="img R05"></p>
				<div class="R11_text active">
					<h2>Shaping the structure of your website</h2>
					<p class="process_txt">
						With your initial information and requirements, we will design a well organized
						and impressive website. We pay a great attention to details and the effectiveness of 
						the website across browsers.
					<p>
				</div>
			</div>
			<div class="R11">
				<p class="img R06"></p>
				<div class="R11_text active">
					<h2>Testing and re-testing with users from your target market</h2>
					<p class="process_txt">
						After testing the usability with our staff, we re-test with real people to 
						observe problems and flow of user navigation. This approach is proven to prevent
						unnecessary costs down the road.
					<p>
				</div>
			</div>
			<div class="R11 R11right">
				<p class="img R07"></p>
				<div class="R11_text active">
					<h2>Implementing easier ways for updating your website</h2>
					<p class="process_txt">
						As updating our solutions is a big part for our clients, we implement easy to use
						WordPress content management system with your website. We provide professional WordPress
						training and maintenance services to continue your journey.
					<p>
				</div>
			</div>
			<div class="R11">
				<p class="img R08"></p>
				<div class="R11_text active">
					<h2>Search Engine Optimization and analyzing traffic</h2>
					<p class="process_txt">
						To stay on top of the rankings,
						we provide ongoing support, keyword optimization for search engines, and business strategies for
						improving and integrating additional functionalities for better user-experiences. 
					<p>
				</div>
			</div>		
		</div>
	</div>
</div>
<!------Learn more about Graphics and print process-->
<div id="exp_gra">
	<div class="Cwrapper">
		<div class="lm_specif">
			<h2 class="pg3">Graphic and Print Solutions</h2>
			<p>process that produce fine graphic solutions.</p>
			<a id="grasp" title="Click here to Expand Graphic & Print Solutions"class="slideDw voxtip"></a>
		</div>	
	</div>
</div>
<!----------Expanding section--->
<div class="expand_sec">
	<div class="Cwrapper">
		<!--- GRAPHIC & PRINT SECTION -->
		<div id="gra_pros" >
			<div class="R11 R11right">
				<h2>Wireframe Design</h2>
				<p class="process_txt">
					Based on your audience and design requirements, we will design the first wireframe and sketch
					of the graphic content. We will revise the basic design again and again until you are
					fully satisfied with the layout.
				<p>
			</div>
			<div class="R11">
				<h2>Final Product that will Amaze your Audience</h2>
				<p class="process_txt">
					We make sure the final design work is nothing less than impressive and attractive in
					its own creative way. We value creativity very highly as we strive to produce creative 
					content that will drive traffic to your business and will speak your brand identity.
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