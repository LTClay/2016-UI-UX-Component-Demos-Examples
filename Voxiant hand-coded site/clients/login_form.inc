<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Voxiant - Web &amp; Graphic Solutions</title>
	<link rel="shortcut icon" href="http://www.voxiantsolutions.com/images/favicon.ico" />
	<link href="http://www.voxiantsolutions.com/css/global.css" rel="stylesheet" type="text/css" />
	<link href="css/clients.css" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" src="http://www.voxiantsolutions.com/js/jquery.js"/></script>
	<script type="text/javascript" src="http://www.voxiantsolutions.com/js/global.js"/></script>
	<script type="text/javascript" src="http://www.voxiantsolutions.com/js/imgSlider.js"></script>
	<script type="text/javascript" src="js/clients.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			
			tp_con();
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

<div id="mid_content">
	<div class="Cwrapper">
		<!--- CONTENT--->
		<div id="content">
			<div id="client_login">
				<div class="cllog_left">
					<p class="tt01">Voxiant Solutions</p>
					<p class="tt02"><span>VoxyClient </span>login</p>
					<p class="tt03">Access your project files anytime anywhere using
							our secure client management system - the VoxyClient<p>
										
					<p class="tt05">VoxyClient ver.1.5</p>
				</div>
				<div class="cllog_right">
				<!---Login Form-->
					
					<?php if(isset($err_logout))
						{				
							echo"<p class='tf01'>$err_logout</p>";
						}
					?>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
					<div id="login01">
						<input type="text" id="login_temp"name="login_temp" value="Login Name"
						onfocus="changeLog()"/>
					</div>
					<div id="login02" style="display:none;">
						<input type="text" id="loginN" name="loginN" 
						onBlur="restoreLog()"/>
					</div>
					
					<!--Password field-->									
					<div id="pass01" >
						<input type="text" name="pass_temp" id="pass_temp" value="Password"
						size="20" maxlength="20" onfocus="changeBox()"/>
					</div>
					<div id="pass02" style="display:none;">
						<input type="password" name="passwd" id="passwd" 
						size="20"maxlength="20" onBlur="restoreBox()"/>
					</div>
					
					<?php if(isset($err_login))
						{
							echo"<p class='tf01'>$err_login</p>";
						}
					?>
					<button type="submit" name="Lsubmit"></button>
					<input type="hidden" value="login" name="clientsDo"/>
				</form>
				</div>
			
			</div>
			
		</div>
	</div>
</div>
<!--- Footer-->
<?php
	include'../footer.php';
?>
</body>
</html>