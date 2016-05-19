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
					<a href="http://www.voxiantsolutions.com/whoweare.php"><em>Our Team</em></a></li>
				<li class="we_done">
					<a href="http://www.voxiantsolutions.com/whatwevedone.php"><em>What we've done</em></a></li>
				<li class="services">
					<a href="http://www.voxiantsolutions.com/services.php"><em>Where we specialize</em></a></li>
				<li class="start">
					<a href="http://www.voxiantsolutions.com/GetStarted.php"><em>Lets get started</em></a></li>
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
			
			//check if its iteration set or view now file
			$sql00="SELECT * FROM projectFiles WHERE pfID='$pfID'";
			$result00=mysqli_query($cxn,$sql00);
			$rw00=mysqli_fetch_row($result00);
			
			$sql1="SELECT projectName FROM clientProjects WHERE projID='$rw00[1]'";
			$result1=mysqli_query($cxn, $sql1);
			$rw1=mysqli_fetch_row($result1);
			
			//Assign variable values based on sub category
			if($rw00[8]=="viewNow"){
				$fileName=$rw00[3];$filePath=$rw00[2];
				$fileDesc="";
				$parentID=$rw00[0];//pfID
			}
			if($rw00[8]=="iterationSET"){
				//iterationItems
				$sql2="SELECT * FROM iterationItem WHERE iterID='$iterID'";
				$result2=mysqli_query($cxn, $sql2);
				$rw2=mysqli_fetch_row($result2);
					
				$fileName=$rw2[3];$filePath=$rw2[2];
				$fileDesc=$rw2[4];
				$parentID=$rw2[0];//iterID
				$pfIterID=$rw2[1];//pfID of the iteration SET holder on project files tb
			}
			echo"<p>Project: $rw1[0]</p>
			</div><div class='projectC_inside'>
				<!--Second header-->
				<div class='PC_head'>
					<div class='PC_title2'>
						<p>$fileName</p></div>					
					<div class='PC_btns'>
						<a class='PCb_back'href='http://www.voxiant.com/clients/clients.php'><em>Go back</em></a>";
						if($rw00[8]=="iterationSET"){
							echo"<a class='PCb_backIT' href='iterationSet.php?pfID=$pfIterID'><em>Go Back to Iteration Set</em></a>
								<a class='PCb_down'href='http://www.voxiant.com/clients/downloadFile.php?pfID=$pfIterID&iterID=$iterID&scat=$rw00[8]'><em>Download</em></a>";
						}else{
							echo"<a class='PCb_down'href='http://www.voxiant.com/clients/downloadFile.php?pfID=$parentID&scat=$rw00[8]'><em>Download</em></a>";
						}
						
					echo"</div>					
				</div>
				<div class='PC_img'>";
				
				$ffPath="http://www.voxiant.com/clients/$filePath";
				list($Rwidth,$Rheight)=getimagesize($ffPath);
					if($Rwidth>915){$wid00="width=915px";}//resize large images
					echo"<img $wid00 src='$filePath'/>	
					<p class='voxNote'>$fileDesc</p>					
				</div>";
				
				//SUBMISSION OF RATINGS AND FEEDBACKS
					switch($RatingX){
						case"addR":
							$sql5="SELECT * FROM voxFeeds WHERE parentID='$parentID'";
							$result5=mysqli_query($cxn,$sql5);						
							$rw5=mysqli_fetch_row($result5);
							
							if($rw5[4]!=""){$sqlPart="rate1='$rate1'";}
							if($rw5[5]!=""){$sqlPart.=",rate2='$rate2'";}
							if($rw5[6]!=""){$sqlPart.=",rate3='$rate3'";}
							if($rw5[7]!=""){$sqlPart.=",rate4='$rate4'";}							
							
							$sql_r33="UPDATE voxFeeds SET $sqlPart WHERE feedID='$rw5[0]'";
							$result_r33=mysqli_query($cxn,$sql_r33);
						break;
						
						case"addFD":
							$theFeed=addslashes($theFeed);
							$sql6="UPDATE voxFeeds SET theFeed='$theFeed' WHERE parentID='$parentID'";
							$result6=mysqli_query($cxn,$sql6);
						break;
						
						case"delFB":
							$sql89="UPDATE voxFeeds SET theFeed='' WHERE parentID='$parentID'";
							$result89=mysqli_query($cxn,$sql89);
							
						break;
					}
				
				//connecting to the voxFeedback table
				$sql3="SELECT * FROM voxFeeds WHERE parentID='$parentID'";
				$result3=mysqli_query($cxn,$sql3);						
				$rw3=mysqli_fetch_row($result3);	
				
				if(@mysqli_num_rows($result3)!=0)//There is records for this file on VoxFeeds
				{
				
				echo"
				<div id='PC_feeder'>
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
								<TEXTAREA id='txtFd' name='theFeed' rows='5' cols='62' >$feed_entry</TEXTAREA>
							</div>
							<button id='Feedbtn' name='RatingX' value='addFD'><em>Submit</em></button>							
							<input type='hidden' name='pfID' value='$pfID'/>
							";if($rw00[8]=="iterationSET"){echo"<input type='hidden' name='iterID' value='$iterID'/>";}echo"
							</form>
						</div>";
						break;	
						
						default:
							if($rw3[3]!=""){//There is feed
								$feed_entry=stripslashes($rw3[3]);
								echo"Your feedback for this design</p>
								<p class='feeddt'>$feed_entry</p>";
									if($rw00[8]=="iterationSET"){
										echo"<a class='rg5'href='singleItem.php?pfID=$pfID&iterID=$iterID&feedBK=editFB#PC_feeder'>Edit</a>
											<a class='rg5'href='singleItem.php?pfID=$pfID&iterID=$iterID&RatingX=delFB#PC_feeder'>Delete</a>";}
									else{
										echo"<a class='rg5'href='singleItem.php?pfID=$pfID&feedBK=editFB#PC_feeder'>Edit</a>
											<a class='rg5'href='singleItem.php?pfID=$pfID&iterID=$iterID&RatingX=delFB#PC_feeder'>Delete</a>";}
								
							echo"</div>";
							}else{//there is NO feedbacks
								echo"Leave a feedback for this design</p>
								<div class='feedtx'>
									<form  action="; echo $_SERVER[PHP_SELF]; echo"#PC_feeder method='POST'>
									<TEXTAREA id='txtFd' name='theFeed' rows='5' cols='62'></TEXTAREA>
								</div>
								<button id='Feedbtn' name='RatingX' value='addFD'><em>Submit</em></button>							
								<input type='hidden' name='pfID' value='$pfID'/>
								";if($rw00[8]=="iterationSET"){echo"<input type='hidden' name='iterID' value='$iterID'/>";}echo"
								</form>
							</div>";
							}
						break;						
					}
					
					
					
					//RATING SECTION
					switch($ratIN)
					{
						//EDIT RATING SCORES
						case"editRT":
							$sql67="SELECT * FROM voxFeeds WHERE parentID='$parentID'";
							$result67=mysqli_query($cxn,$sql67);
							$rw67=mysqli_fetch_row($result67);
							
							echo"
								<div class='PCF_right'>
								<p class='PCR_h1'>Rate this design</p>
								<p class='PCR_h2'>(Rating of 1 is lowest and 5 is highest)</p>
								<form action="; echo $_SERVER[PHP_SELF]; echo"#PC_feeder method='POST'>";
								
								//EDIT Rating scales
								for($ry=4;$ry<=7;$ry++){
									$ry2=$ry-3;//number for rate score counter
									$ry3=$ry+4;//number for rate score fields
									if($rw3[$ry]!=""){echo"
									<div class='PCR_h3'>
										<select name='rate$ry2'>";								
											for($rt=1;$rt<=5;$rt++){									
												echo"<option value='$rt'"; if($rw67[$ry3]==$rt){echo"selected";}echo">$rt</option>";										
											}
										echo"</select> $rw3[$ry]
									</div>";}
								}
								echo"<div class='PCR_n1'>
									<button id='rating'name='RatingX' value='addR'><em>Submit Rating</em></button>
									";if($rw00[8]=="iterationSET"){echo"<input type='hidden' name='iterID' value='$iterID'/>";}echo"
									<input type='hidden' name='pfID' value='$pfID'/>
									</form>
								</div>
							</div>";
						break;
						default:
							if($rw3[8]!=0){//There is Rating
								$Rsum=$rw3[8]+$rw3[9]+$rw3[10]+$rw3[11];
								if($rw3[4]!=""){$rnum=1;}
								if($rw3[5]!=""){$rnum+=1;}
								if($rw3[6]!=""){$rnum+=1;}
								if($rw3[7]!=""){$rnum+=1;}
								$rate=$Rsum/$rnum;
								$rate=ceil($rate);
								
								echo"
							<div class='PCF_right'>
								<p class='PCR_h1'>Your rating</p>";
								
								for($ru=4;$ru<=7;$ru++){
									$ru2=$ru+4;
									if($rw3[$ru]!=""){
									echo"<p class='rg6'>$rw3[$ru2] out of 5 -- $rw3[$ru]</p>";}								
								}
								echo"<br/><div id='rg7'>
											<p class='indRate Rate$rate'></p>
											<p class='indRtxt'>Average Score</p>
										</div>";
								if($rw00[8]=="iterationSET"){
									echo"<a class='rg5' href='singleItem.php?pfID=$pfID&iterID=$iterID&ratIN=editRT#PC_feeder'>Change the Rating</a>";}
								else{
									echo"<a class='rg5'href='singleItem.php?pfID=$pfID&ratIN=editRT#PC_feeder'>Change the Rating</a>";}
							echo"</div>";
							}else{//There is no ratings
								echo"
							<div class='PCF_right'>
								<p class='PCR_h1'>Rate this design</p>
								<p class='PCR_h2'>(Rating of 1 is lowest and 5 is highest)</p>
								<form action="; echo $_SERVER[PHP_SELF]; echo"#PC_feeder method='POST'>";
								
								//Rating scales
								for($ry=4;$ry<=7;$ry++){
									$ry2=$ry-3;
									if($rw3[$ry]!=""){echo"
									<div class='PCR_h3'>
										<select name='rate$ry2'>";								
											for($rt=1;$rt<=5;$rt++){									
												echo"<option value='$rt'>$rt</option>";										
											}
										echo"</select> $rw3[$ry]
									</div>";}
								}
								echo"<div class='PCR_n1'>
									<button id='rating'name='RatingX' value='addR'><em>Submit Rating</em></button>
									<input type='hidden' name='pfID' value='$pfID'/>
									";if($rw00[8]=="iterationSET"){echo"<input type='hidden' name='iterID' value='$iterID'/>";}echo"
									</form>
								</div>
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