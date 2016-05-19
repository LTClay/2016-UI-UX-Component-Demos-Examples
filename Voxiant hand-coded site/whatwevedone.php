<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Voxiant - Web &amp; Graphic Solutions</title>
	<link href="css/global.css" rel="stylesheet" type="text/css" />
	<link href="css/img_slider.css" rel="stylesheet" type="text/css" />
	<link href="css/WhatWeveDone.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"/></script>
	<script type="text/javascript" src="js/global.js"/></script>
	<script type="text/javascript" src="js/img_Slider.js"></script>
	<script type="text/javascript" src="js/voxtip.js"></script>
	<!--Lightbox related uploads-->
	<script type="text/javascript" src="js/jquery.lightbox.js"></script>
	<link rel="stylesheet" href="css/jquery.lightbox.css" type="text/css" media="screen" />
<script type="text/javascript">
$(function() {
	// Use this example, or...
	$('a[@rel*=lightbox]').lightBox(); 
});
</script>

	<script type="text/javascript">
		$(document).ready(function(){			
			//function for opening the contact forms from top
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

<!--- NAVIGATION MENU-->
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
<!--- header ends--->

<!---Content for pages goes in here--->
<div id="mid_content" >
	<div class="Cwrapper">
		<div id="intro">
			<div class="int_LHS_inside">
				<p class="pg_nav"><a href="index.php">Home</a> / What We've Done</p>
				<p id="introtxtpg">What we've done</p>
				<p id="web_subselection">
					<a class="subwork foc_all"href="whatwevedone.php"></a>
					<a style="display:none;"class="subwork clients voxtip"title="Click here to check out our clients list"href="whatwevedone_clients.php"></a>
				</p>
				
			</div>
			<div class="int_RHS_inside">
				<p class="intro2">
					We have years of experience in doing what we do. More than our reputation, 
					what we treasure the most is the ideas behind creating our work and the execution 
					- to greater satisfaction of our clients.
							
				</p>
				<p class="intro3">
					Take a look at our previous work with clients like you and <br />
					<a class="voxMail">&nbsp;tell us your idea that needs our platform!&nbsp;</a>
				</p>	
			</div>
			
		</div>
		<div class="port_head">
			<!-- portfolio categories-->
				
				<div id="port_pages">
					<a class="focus"href="whatwevedone.php">Web</a>
					<a class="n_focus"href="whatwevedone_print.php">Print</a>				
				</div>
		</div>

  </div>
</div>

<!--- start of bottom profile content section -->
<div id="bottom_content">
  <div  class="Cwrapper work_ar">
  	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_11_1.jpg" rel="lightbox"class="web_item2 web5 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Panache Day Spa | <i><a href="http://www.thepanachedayspa.com" target="_blank">View Site</i></a></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_10_1.jpg" rel="lightbox"class="web_item2 web4 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Precision Point | <a href="http://www.precisionpointinc.com" target="_blank"><i>View Site</i></a></p>
		</div>
	</div>
	
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_09_1.jpg" rel="lightbox"class="web_item2 web3 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Schedule mart <a href="http://www.schedulemart.com" target="_blank"><i>View Site</i></a></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_01_1.jpg" rel="lightbox"class="web_item1 web1 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Pastor John Ramsey, Sr | <i><a href="http://pastorjohnramsey.com/">View Site</a></i></p>
		</div>
	</div>
	
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_02_1.jpg" rel="lightbox"class="web_item1 web2 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Global Taekwondo Alliance | <i><a href="http://globaltaekwondoalliance.com/">View Site</a></i></p>
		</div>
	</div>
	
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_03_1.jpg" rel="lightbox" class="web_item1 web3 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Lauren Crowner Foundation | <a href="http://www.laurencrownerfoundation.com/" target="_blank"><i>View Site</i></a></p>
		</div>
	</div>
	
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_04_1.jpg" rel="lightbox" class="web_item1 web4 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">AIIA Entertainment | <i><a href="http://aiiaent.com/">View Site</a></i></p>
		</div>
	</div>
	
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_05_1.jpg" rel="lightbox" class="web_item1 web5 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">My Fashion Crush | <i><a href="http://www.myfashioncrush.com/">View Site</a></i></p>
		</div>
	</div>
	
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_06_1.jpg" rel="lightbox" class="web_item1 web6 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Grafton Peek Catering | <a href="http://www.graftonpeek.com/" target="_blank"><i>View Site</i></a></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_07_1.jpg" rel="lightbox" class="web_item2 web1 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">USAIndy Soccer | <i><a href="http://unitedsoccerallianceindiana.org/">View Site</a></i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/web/web_work_08_1.jpg" rel="lightbox" class="web_item2 web2 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Northside New Era Church | <a href="http://www.nne.org" target="_blank"><i>View Site</i></a></p>
		</div>
	</div>
	<div class='clear'></div>
	
  </div>
</div>



<!---Padding at the bottom of the page--->
<div id="spacer_work">
	<div class="Cwrapper">
		<div class="bottom">
			<a id="top" class="backtop_work"></a>
		</div>
	</div>
</div>
<!--- Footer-->
<?php
	include("footer.php");
?>

</body>
</html>