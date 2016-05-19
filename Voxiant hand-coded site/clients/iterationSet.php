<?php
 session_save_path("/home/users/web/b2618/nf.voxiantsolutions/cgi-bin/tmp");
session_start();
if($_SESSION['auth'] !="yes")
{
	header("Location:index.php?clientsDo=badLog");
	exit();
}
$vclientNM=$_SESSION['vclientNM'];
$clientNM=$_SESSION['logName'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Voxiant - Web &amp; Graphic Solutions</title>
	<link rel="shortcut icon" href="http://www.voxiantsolutions.com/images/favicon.ico" />
	<link href="http://www.voxiant.com/css/global.css" rel="stylesheet" type="text/css" />
	<link href="css/clients.css" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" src="http://www.voxiant.com/js/jquery.js"/></script>
	<script type="text/javascript" src="http://www.voxiant.com/js/global.js"/></script>	
	<script type="text/javascript" src="http://www.voxiant.com/js/voxtip.js"/></script>
	<script type="text/javascript" src="js/clients.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			//Scroll to the top of the page
			scrollToTop();
			
			tp_con();
			clientActive();
			
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
			<p class="pg_nav"><a href="index.php">Home</a> / VoxyClient</p>
			<div class="cl_head">
				<h2>CLIENTS</h2><p id="dark">/<?php echo$vclientNM;?></p>
				<a id="logO"href="index.php?clientsDo=logout"><em>logout</em></a>
			</div>					
		</div>			
		
	</div>
</div>
<!----lower middle content---->
<div id="low_mid">
	<div class="Cwrapper">
	
	<!--- CONTENT--->
	<div id="content">
		
		<!--project table-->
		<div id="project_content"><!--determines the height-->
			<div class="project_c_head">
			
			<!--Dynamic page content-->
			<?php
			
			
			//sending variables: iterID,pfID, projID,
			include("/mnt/w0610/d23/s07/b030e947/cgi-bin/voxyBacon.inc");
			$cxn =mysqli_connect($host, $user, $password, $database)
			or die ("Could not connect to database");
			//start the program
			
			
			//check if its iteration set or view now file
			$sql00="SELECT projID, fileName FROM projectFiles WHERE pfID='$pfID'";
			$result00=mysqli_query($cxn,$sql00);
			$rw00=mysqli_fetch_row($result00);
			
			$sql1="SELECT projectName FROM clientProjects WHERE projID='$rw00[0]'";
			$result1=mysqli_query($cxn, $sql1);
			$rw1=mysqli_fetch_row($result1);
			
			
				echo"<p>Project: $rw1[0]</p>
			</div>
			<div class='projectC_inside'>
				<!--Second header-->
				<div class='PC_head'>
					<div class='PC_title2'>
						<p>$rw00[1]</p>
					</div>					
					<div class='PC_btns'>
						<a class='PCb_back'href='http://www.voxiant.com/clients/clients.php'><em>Go back</em></a>
					</div>					
				</div>
				<div class='PC_img'>";
					
					
					$sqlA1="SELECT * FROM iterationItem WHERE pfID='$pfID'";
					$resultA1=mysqli_query($cxn,$sqlA1);
					
					
					$itemA1=mysqli_num_rows($resultA1);//number of picture in this set
					$cal1=ceil($itemA1/5);//number of rows needed to list pictures of the it.Set
					
					echo"<table id='PCI_tb'>";
					if($itemA1<=5){
						echo"<tr>";
							for($dc=1;$dc<=$itemA1;$dc++){
								$rwA1=mysqli_fetch_row($resultA1);
								echo"<td>
									<a href='singleItem.php?pfID=$rwA1[1]&iterID=$rwA1[0]'title='$rwA1[3]'>
										<img src='../clients/$rwA1[7]'/></a><br/>";
								
								$sqlN4="SELECT * FROM voxFeeds WHERE parentID='$rwA1[0]'";
								$resultN4=mysqli_query($cxn,$sqlN4);
								if(@mysqli_num_rows($resultN4)!=0){
									$rwN4=mysqli_fetch_row($resultN4);
									if($rwN4[8]!=0){
										if($rwN4[8]!="0"){$rty=$rwN4[8]; $rcount=1;}
										if($rwN4[9]!="0"){$rty+=$rwN4[9]; $rcount+=1;}
										if($rwN4[10]!="0"){$rty+=$rwN4[10];$rcount+=1;}
										if($rwN4[11]!="0"){$rty+=$rwN4[11];$rcount+=1;}
										$rAve=$rty/$rcount;
										$rAve=ceil($rAve);
										
										echo"<p class='PCIT_h2 Rate$rAve'></p>";
									}else{
									echo"<p class='PCIT_h1'>Not rated</p>";
									}
								}
									echo"<p class='PCIT_h1'>$rwA1[3]</p>
									
								</td>";
							}	
					}
					if($itemA1<=10 && $itemA1>5){
						echo"<tr>";
							for($dc=1;$dc<=5;$dc++){
								$rwA1=mysqli_fetch_row($resultA1);
								
								echo"<td>
									<a href='singleItem.php?pfID=$rwA1[1]&iterID=$rwA1[0]'title='$rwA1[3]'>
										<img src='../clients/$rwA1[7]'/></a><br/>";
								
								$sqlN4="SELECT * FROM voxFeeds WHERE parentID='$rwA1[0]'";
								$resultN4=mysqli_query($cxn,$sqlN4);
								if(@mysqli_num_rows($resultN4)!=0){
									$rwN4=mysqli_fetch_row($resultN4);
									if($rwN4[8]!=0){
										if($rwN4[8]!="0"){$rty=$rwN4[8]; $rcount=1;}
										if($rwN4[9]!="0"){$rty+=$rwN4[9]; $rcount+=1;}
										if($rwN4[10]!="0"){$rty+=$rwN4[10];$rcount+=1;}
										if($rwN4[11]!="0"){$rty+=$rwN4[11];$rcount+=1;}
										$rAve=$rty/$rcount;
										$rAve=ceil($rAve);
										
										echo"<p class='PCIT_h2 Rate$rAve'></p>";
									}else{
									echo"<p class='PCIT_h1'>Not rated</p>";
									}
								}
									echo"<p class='PCIT_h1'>$rwA1[3]</p>
									
								</td>";							
								
							}
						echo"</tr><tr>";
							for($dc2=6;$dc2<=$itemA1;$dc2++){
								$rwA1=mysqli_fetch_row($resultA1);
								
								echo"<td>
									<a href='singleItem.php?pfID=$rwA1[1]&iterID=$rwA1[0]'title='$rwA1[3]'>
										<img src='../clients/$rwA1[7]'/></a><br/>";
								
								$sqlN4="SELECT * FROM voxFeeds WHERE parentID='$rwA1[0]'";
								$resultN4=mysqli_query($cxn,$sqlN4);
								if(@mysqli_num_rows($resultN4)!=0){
									$rwN4=mysqli_fetch_row($resultN4);
									if($rwN4[8]!=0){
										if($rwN4[8]!="0"){$rty=$rwN4[8]; $rcount=1;}
										if($rwN4[9]!="0"){$rty+=$rwN4[9]; $rcount+=1;}
										if($rwN4[10]!="0"){$rty+=$rwN4[10];$rcount+=1;}
										if($rwN4[11]!="0"){$rty+=$rwN4[11];$rcount+=1;}
										$rAve=$rty/$rcount;
										$rAve=ceil($rAve);
										
										echo"<p class='PCIT_h2 Rate$rAve'></p>";
									}else{
									echo"<p class='PCIT_h1'>Not rated</p>";
									}
								}
									echo"<p class='PCIT_h1'>$rwA1[3]</p>
									
								</td>";
								
							}
					}
					if($itemA1<=15 &&$itemA1>10){
					
					}
					echo"</tr></table>";
			
				
									
				echo"</div>";
				
				//SUBMISSION OF RATINGS AND FEEDBACKS					
					switch($RatingX){					
						
						case"addFD":
							$theFeed=addslashes($theFeed);
							$sql6="UPDATE voxFeeds SET theFeed='$theFeed' WHERE parentID='$pfID'";
							$result6=mysqli_query($cxn,$sql6);
						break;
						
						case"delFB":
							$sql89="UPDATE voxFeeds SET theFeed='' WHERE parentID='$pfID'";
							$result89=mysqli_query($cxn,$sql89);
							
						break;
					}
				
				//connecting to the voxFeedback table
				$sql3="SELECT * FROM voxFeeds WHERE parentID='$pfID'";
				$result3=mysqli_query($cxn,$sql3);						
				$rw3=mysqli_fetch_row($result3);	
				
				if(@mysqli_num_rows($result3)!=0)//There is records for this file on VoxFeeds
				{
				
				echo"
				<div id='PC_feeder2'>
					<div class='PCF_left'>
						<p class='PCF_h1'>";
					
					//FEEDBACK SECTION
					switch($feedBK){
						//EDIT ENTERED FEEDBACK
						case"editFB":
							
							$feed_entry=stripslashes($rw3[3]);
							
							echo"Edit your feedback for this design</p>
							<div class='feedtx'>
								<form  action="; echo $_SERVER[PHP_SELF]; echo"#PC_feeder method='POST'>
								<TEXTAREA id='txtFd' name='theFeed' rows='5' >$feed_entry</TEXTAREA>
							</div>
							<button id='Feedbtn' name='RatingX' value='addFD'><em>Submit</em></button>							
							<input type='hidden' name='pfID' value='$pfID'/>
							</form>
						</div>";
						break;	
						
						default:
							if($rw3[3]!=""){//There is feed
								$feed_entry=stripslashes($rw3[3]);
								echo"Your feedback for this Iteration Set</p>
								<p class='feeddt'>$feed_entry</p>
								<a href='iterationSet.php?pfID=$pfID&feedBK=editFB#PC_feeder'>Edit</a>
								<a href='iterationSet.php?pfID=$pfID&RatingX=delFB'>Delete</a>
							</div>";
							}else{//there is NO feedbacks
								echo"Leave a feedback for this Iteration Set</p>
								<div class='feedtx'>
									<form  action="; echo $_SERVER[PHP_SELF]; echo"#PC_feeder method='POST'>
									<TEXTAREA id='txtFd' name='theFeed' rows='5' ></TEXTAREA>
								</div>
								<button id='Feedbtn' name='RatingX' value='addFD'><em>Submit</em></button>							
								<input type='hidden' name='pfID' value='$pfID'/>
								</form>
							</div>";
							}
						break;						
					}
					
					
				echo"</div>";
				}
			?>
			</div>
		</div>
		<!--project table ENDs-->
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
	include'../footer.php';
?>
</body>
</html>