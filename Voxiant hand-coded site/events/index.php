<?php

include("/mnt/w0610/d23/s07/b030e947/cgi-bin/voxyBacon.inc");
$cxn =mysqli_connect($host, $user, $password, $database)
or die ("Could not connect to database");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Voxiant Solutions - Events</title>
	<link rel="shortcut icon" href="http://www.voxiantsolutions.com/images/favicon.ico" />
	<link href="http://www.voxiant.com/css/global.css" rel="stylesheet" type="text/css" />	
	<link type='text/css' rel='stylesheet' href='../clients/css/clients.css'>	
	<script type="text/javascript" src="http://www.voxiant.com/js/global.js"/></script>	
	<link type='text/css' rel='stylesheet' href='events.css'>
	<script src='../js/jquery.js'type='text/javascript' ></script>
	<script type='text/javascript' src='../clients/js/clients.js'></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			//Scroll to the top of the page
			scrollToTop();
			
			tp_con();
			clientActive();
			
			
		});	
	</script>
</head>
<body>
<!--- Header-->
<!--- top dark blue bar--->
<div id="topContact" style="display:block;">
	<?php include("/home/users/web/b2618/nf.voxiantsolutions/public_html/voxiantsolutions.com/contact/contact_bar.php");?>
</div>
<!--- Slide down contact form-->
<div id="top_bar">
	<div class="Cwrapper">
		<a id="home_nav" href="http://www.voxiantsolutions.com/index.php"><em>Home</em></a>
		<a id="cont_a">Contact Us</a>
	</div>
</div>
<!---Navigation Bar-->
<div id="navigation">
	<div class="Cwrapper">
		<div id="logo"></div>
		<ul id="nav">
				<li class="about">
					<a href="http://www.voxiantsolutions.com/whoweare.php"><em>Our Team</em></a>
				</li>
				<li class="we_done">
					<a href="http://www.voxiantsolutions.com/whatwevedone.php"><em>What we've done</em></a>
				</li>
				<li class="services">
					<a href="http://www.voxiantsolutions.com/services.php"><em>Where we specialize</em></a>
				</li>
				<li class="start">
					<a href="http://www.voxiantsolutions.com/GetStarted.php"><em>Lets get started</em></a>
				</li>
			</ul>
	</div>
</div>
<!-----CONTENT---->
<div id="mid_content">
	<div class="Cwrapper">
		
		<div class="vc_top">
			<p class="pg_nav"><a href="index.php">Home</a> / Events</p>
			<div class="cl_head">
				<h2>EVENTS</h2><p id="dark">/Networking Event</p>
			</div>					
		</div>			
		
	</div>
</div>
<!----lower middle content---->
<div id="low_mid">
	<div class="Cwrapper">
	
	<!--- CONTENT--->
	<div id="content">
	<table><tr><td>
		<div id='eventInfo'>
			
		</div>
	</td>
	<td>
	<div id='rsvp_table'>
		<p class='eventH2'>RSVP for this event</p>
		<?php
		switch($rsvp)
		{
			case"submit":				
				if($gName==""){$erName="Required!"; 
					$errors=1;}
				if($gEmail==""){$erEmail="Required!"; 
					$errors=1;}
				if($noPPL==""){$erPPL="Required!"; 
					$errors=1;}
					
				$eRR=0;
				if($sevWeb==""){$eRR+=1;}
				if($sevBrand==""){$eRR+=1;}
				if($sevPrint==""){$eRR+=1;}
				if($sevBizC==""){$eRR+=1;}
				if($sevNone==""){$eRR+=1;}
					
				if($eRR=="5")
					{
					$er_services="Required!"; 
					$errors=1;}
				if($buStatus==""){$er_buStatus="Required!"; 
					$errors=1;}
				if($buStatus=="bS4"){if($busCsta==""){$er_busCsta="Required";
					$errors=1;}}
				if($buStatus=="bS3"||$buStatus=="bS2"||$buStatus=="bS1"){
					if($busName==""){$er_busName="Required";
					$errors=1;}
					if($busWeb==""){$er_busWeb="Required";
					$errors=1;}
				}
				
				//something is missing or wrong
				if($errors=="1"){
					include"form.inc";
				
				}else{
					if(!ereg("^.+@.+\..+$",$gEmail)){
						$erEmail="Incorrect email address!";
						$errors=2;
					}
					if($errors=="2"){
						include"form.inc";
					}else{
						//Make sure aint no body trying to do sql injections
						$gName=addslashes($gName);
						$gEmail=addslashes($gEmail);
						$noPPL=addslashes($noPPL);
						$busCsta=addslashes($busCsta);
						$busName=addslashes($busName);
						$busInd=addslashes($busInd);
						$busWeb=addslashes($busWeb);
						
						$sql1="SELECT gName, gEmail FROM event01 WHERE gName='$gName' AND	
							gEmail='$gEmail'";
						$result1=mysqli_query($cxn,$sql1);
						if(@mysqli_num_rows($result1)!=0){//already exist
							
							echo"You have already signed up for this event.";
						}else{
							//generate a unique ID based on first name
							$ppos=strpos($gName, ' ');
							$pos=substr($gName,0,$ppos);
							$rnd=rand(10,99);
							$gID=$pos.$rnd;
							
							$services=$sevWeb."-".$sevBrand."-".$sevPrint.
									"-".$sevBizC."-".$sevNone;
							$sql2="INSERT INTO event01 VALUES (
								'$gID','$gName',
								'$gEmail','$gPhone',
								'$noPPL','$buStatus',
								'$busCsta','$busName',
								'$busInd','$busWeb',
								'$services')";
							$result2=mysqli_query($cxn,$sql2);
							if($result2==false){
								echo"Could not add you to the list at this time. 
								Please contact <a href='mailto:info@voxiant.com'>
								Voxiant Customer Services</a>";
							}else{
								$subjM="Voxiant Event signup";
								$message="$gName RSVPed for the Small Business Networking event"."\n\n".
								"Email: $gEmail"."\n".
								"Phone number: $gPhone"."\n".
								"Number of people coming to the event: $noPPL"."\n".
								"Business Status: $buStatus $busCsta"."\n".
								"Business Name: $busName"."\n".
								"Business Industry: $busInd"."\n".
								"Website: $busWeb"."\n".
								"Need our services: $services";
								$headers = 'From: confirmation@voxiant.com' . "\r\n".'Reply-to: info@voxiant.com'."\r\n".'X-Mailer: PHP/'. phpversion(); 
								
								mail("events@voxiant.com",$subjM,$message);
								echo"<p class='r48'>Thank you for signing up for Voxiant Networking
									Event!</p>
									<p class='eventtxt'>We will review your RSVP request and if you meet our
									criteria, you will receive a email in next 24 hours
									with more information about event and the agenda!</p>
									
									<p class='eventtxt'>In the meantime, please feel free to check out 
									<a href='http://www.voxiant.com/whoweare.php'>Who Voxiant is</a>
									and <a href='http://www.voxiant.com/whatwevedone.php'>What we've done</a> 
									and <a href='http://www.voxiant.com/services.php'>Our Specialized Services</a> 
									that is designed specially for small businsses to grow their business to the next level!";
								
							}
							
						}
					
					}
				//enter the info to the database
				}					
			break;
			
			default:
				include"form.inc";
			
			break;
		}
		?>
		
		
	
	</div>
	</td></tr></table>
	
	
	
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
	include'../footer.php';
?>
</body>
</html>