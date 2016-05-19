<?php
	switch($CLst)
	{
	
//POtential clients
case"addPCL":
	//Add a new client	
	$sql="INSERT INTO potentialClients
		VALUES ('$pclID', '$clientName', '$projType','$pDesc','$price','$status','$openD','$startD')";
	$result=mysqli_query($cxn, $sql);
	if($result==false){echo"could not create new potential client";}
	else{echo"Successfully create potential client";}	
break;
//Edit potential client
case"pclEdit":
	$sql_ed="SELECT * FROM potentialClients WHERE pclID='$pclID'";
	$result_ed=mysqli_query($cxn,$sql_ed);
	$row_ed=mysqli_fetch_row($result_ed);
	
	echo"<b>Update client Information</b><p>
	<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
			<table><tr>
				<td>ID:</td><td>$row_ed[0]</td></tr><tr>
				<td>First heard date (mm/dd/yy):</td>
					<td><input type='text' name='openD' value='$row_ed[6]'/></td></tr><tr>
				<td>Expected start date:</td>
					<td><input type='text' name='startD' value='$row_ed[7]'/></td></tr><tr>
				<td>Client Name:</td>
					<td><input type='text' name='clientName' value='$row_ed[1]'/></td></tr><tr>
				<td>Project Type:</td>
					<td><input type='text' name='projType' value='$row_ed[2]'/></td></tr><tr>
				<td>Desciption:</td>
					<td><input type='text' size='50'name='pDesc' value='$row_ed[3]'/></td></tr><tr>
				<td>Price:</td>
					<td><input type='text' name='price' value='$row_ed[4]'/></td></tr><tr>
				<td>Status:</td>
					<td><input type='text' name='status' value='$row_ed[5]'/></td>
			</tr></table>
				<input type='hidden' name='Cac' value='shPCL'/>
				<input type='hidden' name='pclID' value='$row_ed[0]'/>	
			<button type='submit' name='CLst' value='pclSave'>Update information</button>
			<button type='cancel' name='Cac' value='shPCL'>Cancel</button></form>";
	
break;
//save editted potential client
case"pclSave":
	$sql_svcl="UPDATE potentialClients SET clientName='$clientName',
		projType='$projType',pDesc='$pDesc',
		price='$price', status='$status', openD='$openD', startD='$startD'
		WHERE pclID='$pclID'";
	$result_svcl=mysqli_query($cxn,$sql_svcl);
	if($result_svcl==false){echo"Could not update the information";}
	else{
		echo"Successfully updated information for <b>$clientName</b>";
			}
break;
	
//Predeletion of potential client
case"pdPCL":
	echo"Are you sure you want to delete This Potential Client?  
		<a href='admin.php?CLst=delPCL&Cac=shPCL&pclID=$pclID'>Yes</a> 
		<a href='admin.php?Cac=shPCL'>No</a><p>";
break;

//DELETE a potential client
case"delPCL":
	$sql_del="DELETE FROM potentialClients WHERE pclID='$pclID'";
	$result_del=mysqli_query($cxn,$sql_del);
	
	if($result_del==false)
	{echo"Could not delete client from the system";
	}else
	{echo"Successfully Deleted the client <p>";			
	}
break;	
	
	
//EDIT a client
		case"edCL":
			echo"<b>Update client Information</b><p>
			<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
			<table><tr>";	
			$sql_edcl2="SELECT * FROM clientInfo WHERE loginName='$loginName'";
			$result_edcl2=mysqli_query($cxn,$sql_edcl2);
			
			$sql_edcl2r="SELECT passWord FROM Clients_tb WHERE loginName='$loginName'";
			$result_edcl2r=mysqli_query($cxn,$sql_edcl2r);
			
			if($result_edcl2==false && $result_edcl2r==false)
			{echo"Could not connect to the database";}
			else{
				$passW=mysqli_fetch_row($result_edcl2r);
				$edcl2=mysqli_fetch_row($result_edcl2);
			echo"<td>Unique Login Name:</td><td><b>$loginName</b></td>
				</tr><tr>
					<td>Client's Password:</td>
					<td><input type='text' name='passWord' value='$passW[0]'/></td>
				</tr><tr>
					<td>Client's Name:</td>
					<td><input type='text' name='clientName' value='$edcl2[1]'/></td>
				</tr><tr>
					<td>Company Name:</td>
					<td><input type='text' name='clientCompany' value='$edcl2[2]'/></td>
				</tr><tr>
					<td>Email Address:</td>
					<td><input type='text' name='clientEmail' value='$edcl2[3]'/></td>
				</tr><tr>
					<td>Phone Number:</td>
					<td><input type='text' name='clientPhone' value='$edcl2[4]'/></td>
				</tr>
				<input type='hidden' name='Cac' value='shPR'/>
				<input type='hidden' name='loginName' value='$edcl2[0]'/>							
			</table>
			<button type='submit' name='CLst' value='svCL'>Update information</button></form>";	
			
			}
		break;
//SAVED edit client
		case"svCL":
			$sql_svcl="UPDATE clientInfo SET clientName='$clientName',
				clientCompany='$clientCompany',clientEmail='$clientEmail',
				clientPhone='$clientPhone' WHERE loginName='$loginName'";
			$result_svcl=mysqli_query($cxn,$sql_svcl);
			
			$sql_svclr="UPDATE Clients_tb SET passWord='$passWord' WHERE loginName='$loginName'";
			$result_svclr=mysqli_query($cxn,$sql_svclr);
			
			if($result_svcl==false&&$result_svclr==false){echo"Could not update the information";}
			else{
				echo"Successfully updated information for <b>$loginName</b>";
			}
		break;
		
//Predeletion of client
		case"preDelCL":
			echo"Are you sure you want to delete client \"".$loginName."\" 
				<a href='admin.php?CLst=delCL&Cac=showClient&loginName=$loginName'>Yes</a> 
				<a href='admin.php?Cac=showClient'>No</a><p>";
		break;

//DELETE a client
		case"delCL":
			$sql_del="DELETE FROM Clients_tb WHERE loginName='$loginName'";
			$result_del=mysqli_query($cxn,$sql_del);
			
			$sql_del2="DELETE FROM clientInfo WHERE loginName='$loginName'";
			$result_del2=mysqli_query($cxn,$sql_del2);
			
			if($result_del==false|| $result_del2==false)
			{echo"Could not delete \"$loginName\" from the system";
			}else
			{echo"Successfully Deleted the client \"$loginName\"<p>";			
			}
		break;
	
	//AFTER ADDING NEW CLIENT
		case"addClient":
			//Add a new client
				if($cllogin =="" || $clpassw=="")
				{echo"Important fields are left blank<p>";
				}else
				{
					$sql="INSERT INTO Clients_tb
						VALUES ('$cllogin', '$clpassw', '$clcode')";
					$result=mysqli_query($cxn, $sql);
					$sql_2="INSERT INTO clientInfo
						VALUES('$cllogin','$clName','$clCompany','$clEmail','$clPhone')";
						$result_2=mysqli_query($cxn,$sql_2);
					if($result == false || $result_2==false)
					{
						echo"<p>Error: ".mysqli_error($cxn)."</p>";
					}
					else 
					{
						echo"<p>Successfully added the new client \"$cllogin\", PW \"$clpassw\", # \"$clcode\"</p>";
					}								
					//add new folder
					if($folders =="yes") 
						{
							$pathdir="../clients/".$clcode;							
							mkdir($pathdir,0755);
							
							$pathdir2=$pathdir."/files";
							mkdir($pathdir2,0777);
							
							$pathdir4=$pathdir."/clientFiles";
							mkdir($pathdir4,0777);
							
							$pathdir5=$pathdir."/clientFiles/thumbs";
							mkdir($pathdir5,0777);
							
							$pathdir3=$pathdir."/projectFiles";
							mkdir($pathdir3,0777);
										
							if(@mkdir == true)
							{
								echo"Folders has been created for client";
							}
						}
				}
		break;
	}			
?>