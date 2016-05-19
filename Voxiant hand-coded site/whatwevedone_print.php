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
<!--- End slide down contact form-->

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
				<p class="pg_nav"><a href="index.php">Home</a> / What We've Done / Print</p>
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
					<a class="n_focus"href="whatwevedone.php">Web</a>
					<a class="focus"href="whatwevedone_print.php">Print</a>				
				</div>
		</div>

  </div>
</div>

<!--- start of bottom profile content section -->
<div id="bottom_content">
  <div  class="Cwrapper work_ar port_print">
	
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_17.jpg" rel="lightbox"class="print_item3 print5 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Tamara Cosmetics <i>Brand Logo Design</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_01.jpg" rel="lightbox"class="print_item1 print1 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Workfolio <i>Brand Logo Design</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_02.jpg" rel="lightbox"class="print_item1 print2 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Sleeping Giant <i>Brand Logo Design</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_03.jpg" rel="lightbox"class="print_item1 print3 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">PC-Photography <i>Logo Design</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_04.jpg" rel="lightbox"class="print_item1 print4 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Fence-it <i>Brand Logo Design</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_05.jpg" rel="lightbox"class="print_item1 print5 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">mr J's modile <i>Brand Logo Design</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_06.jpg" rel="lightbox"class="print_item1 print6 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Do-it-all carpet <i>Business Cards</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_07.jpg" rel="lightbox"class="print_item2 print1 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Score Barbershop <i>Business Cards</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_08.jpg" rel="lightbox"class="print_item2 print2 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Voxiant <i>Advertising Flyers</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_09.jpg" rel="lightbox"class="print_item2 print3 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Panache <i>Marketing Materials</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_10.jpg" rel="lightbox"class="print_item2 print4 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Divine Acquittal <i>Book Cover</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_11.jpg" rel="lightbox"class="print_item2 print5 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">FAARO Jewelry <i>Posters</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_12.jpg" rel="lightbox"class="print_item2 print6 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">FAARO Jewelry <i>Posters</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_13.jpg" rel="lightbox"class="print_item3 print1 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">DFX Graphics <i>enhancements</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_14.jpg" rel="lightbox"class="print_item3 print2 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">FAARO Jewelry <i>Posters</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_15.jpg" rel="lightbox"class="print_item3 print3 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Top Cement <i>Brand Logo Design</i></p>
		</div>
	</div>
	<!-- ITEM in the portfolio--->
	<div class="work_items">
		<div class="work_item_wrap">
			<a href="images/portfolio/print/print_work_16.jpg" rel="lightbox"class="print_item3 print4 howver">
			<span>Click here to zoom</span></a>
			<p class="work_it_t1">Tailored Charms <i>Brand Logo Design</i></p>
		</div>
	</div>
	
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