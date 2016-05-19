<?php
switch ($clientsDo)
{
	case"badLog":
		$err_logout ="You session has expired. Please login again!";
		include("login_form.inc");
	break;
	case "login":
		if($loginN==""||$passwd=="")
		{
			$err_login ="Password Login Name can not be blank";
			include("login_form.inc");
		}else{
 session_save_path("/home/users/web/b2618/nf.voxiantsolutions/cgi-bin/tmp");
			session_start();
			include("/mnt/w0610/d23/s07/b030e947/cgi-bin/voxyBacon.inc");
			$cxn =mysqli_connect($host, $user, $password, $database)
				or die ("Could not connect to server");
			$loginN=$_POST[loginN];
			addslashes($loginN);//add slashes to sql injection attempts
			$sql ="SELECT loginName FROM Clients_tb WHERE loginName='$loginN'
				AND password='$_POST[passwd]'";
			
			$result = mysqli_query($cxn, $sql) or die ("Could not send query");
			
				$num=mysqli_num_rows($result);
				
				if($num != 0)
				{
					$sql2="SELECT clientName FROM clientInfo WHERE loginName='$loginN'";
					$result2=mysqli_query($cxn,$sql2);
					
					if(@mysqli_num_rows($result2)==0){						
						$vclientNM=$_POST[loginN];
					}else{
						$row2=mysqli_fetch_row($result2);
						$vclientNM=$row2[0];
					}
					
					$_SESSION['auth']="yes";
					$logName=$_POST[loginN];				
					$_SESSION['logName']=$logName;
					$_SESSION['vclientNM']=$vclientNM;
					header("Location:clients.php");			
				}
				else
				{
					$err_login ="Incorrect Login Name & Password";
					include("login_form.inc");
				}

		}
	break;
	case"logout":
 session_save_path("/home/users/web/b2618/nf.voxiantsolutions/cgi-bin/tmp");
		session_start();
		session_destroy();
		unset($_SESSION );
		$err_logout="You have successfully logout!";
		include("login_form.inc");
	Break;
	default:
		include("login_form.inc");

}
?>