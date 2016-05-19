<?php
	switch($PRst)
	{					
		//Predeletion of Project
		case"preDelProj":
				$sql_ppD="SELECT * FROM clientProjects WHERE projID='$projID'";
				$result_ppD=mysqli_query($cxn,$sql_ppD);
				$preD=mysqli_fetch_row($result_ppD);
				$projName=$preD[2];
				echo"Are you sure you want to delete Project \"$projName\"";
				if($Cac=="shAP")
				{//we are located at show all files{
					echo"<a href='admin.php?Cac=shAP&projID=$projID&PRst=delProj'>
					Yes</a> 
					<a href='admin.php?Cac=shAP'>
					No</a><p>";
				}else{//we are located in a project page
					echo"<a href='admin.php?PRst=delProj&Cac=shPR&projID=$projID&projName=$projName&loginName=$loginName'>
					Yes</a> 
					<a href='admin.php?Cac=shPR&projID=$projID&projName=$projName&loginName=$loginName'>No</a><p>";
				}											
		break;
		
	//DELETE PROJECT
		case"delProj":
			$sql_delp="DELETE FROM clientProjects WHERE projID='$projID'";
			$result_delp=mysqli_query($cxn,$sql_delp);
			if($result_delp==false)
			{
				echo"Could not project \"$projID\" from the system";
			}else
			{
				echo"Successfully Deleted the project \"$projID\"<br/>";			
			}
		break;
		
	//ADD PROJECT
		case"addProj":
			$sql_3="INSERT INTO clientProjects
				VALUES ('$projID','$loginName', '$projName','$projSDate',
				'$projType','$projStatus','$clUpload')";
			$result_3=mysqli_query($cxn,$sql_3);
			
			$sql_3a="INSERT INTO projectPayments
				VALUES ('$projID','$payMethod', '$hourlyRate','$hours',
				'$projPrice')";
			$result_3a=mysqli_query($cxn,$sql_3a);
			if($result_3!= false||$result_3a!= false)
				{
					echo"Project \"$projName\" sucessfully created under the client \"$loginName\"";
				}else{echo"Could not add the project to the client";}
		
		break;
		
	//EDIT PROJECT
		case"editProj":
			echo"
				<p><b>Update the project information</b></p>
				<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
				<table><tr>";							
						$sql_pjd="SELECT * FROM clientProjects WHERE projID='$projID'";
						$result_pjd=mysqli_query($cxn,$sql_pjd);
						
						$sql77="SELECT * FROM projectPayments WHERE projID='$projID'";
						$result77=mysqli_query($cxn,$sql77);						
						if($result_pjd==false || $result77==false)
						{echo"Could not connect to the database";}
						else{
						$rowCL0=mysqli_fetch_row($result77);
						$pjd=mysqli_fetch_row($result_pjd);							
						
						echo"							
						<td>Unique Project ID: </td>
						<td>$pjd[0]</td>
						</tr><tr>
							<td>Name of the Project:</td>
							<td><input type='text' name='projName' value='$pjd[2]'/></td>
						</tr><tr>
							<td>Date project started:</td>
							<td><input type='text' name='projSDate' value='$pjd[3]'/></td>
						</tr><tr>	
							<td>Pricing Method:</td>
							<td><select name='payMethod'>
									<option value='Hourly'";if($rowCL0[1]=="Hourly"){echo"selected";}
									echo">Hourly</option>
									<option value='Solid'";if($rowCL0[1]=="Solid"){echo"selected";}
									echo">Solid</option>
								</select></td>
						</tr><tr>	
							<td>Hourly Rate (US$):</td>
							<td><input type='text' name='hourlyRate' value='$rowCL0[2]'/></td>
						</tr><tr>	
							<td>Hours So far (Hr):</td>
							<td><input type='text' name='hours' value='$rowCL0[3]'/></td>
						</tr><tr>	
							<td>Project Price:</td>
							<td><input type='text' name='projPrice' value='$rowCL0[4]'/></td>
						</tr><tr>	
							
							<td>Project Type:</td>
							<td><select name='projType'>
									<option value='Graphic Design'";if($pjd[4]=="Graphic Design"){echo"selected";}
									echo">Graphic Design</option>
									<option value='Website Design'";if($pjd[4]=="Website Design"){echo"selected";}
									echo">Website Design</option>
									<option value='Web & Graphic'";if($pjd[4]=="Web & Graphic"){echo"selected";}
									echo">Web & Graphic</option>
								</select></td>
						</tr><tr>
							<td>Project Status:</td>
							<td><select name='projStatus'>
									<option value='Not Started'";if($pjd[5]=="Not Started"){echo"selected";}
									echo">Not Started</option>
									<option value='Started'";if($pjd[5]=="Started"){echo"selected";}
									echo">Started</option>
									<option value='In Progress'";if($pjd[5]=="In Progress"){echo"selected";}
									echo">In Progress</option>
									<option value='Waiting on Client'";if($pjd[5]=="Waiting on Client"){echo"selected";}
									echo">Waiting on Client</option>
									<option value='On Hold'";if($pjd[5]=="On Hold"){echo"selected";}
									echo">On Hold</option>
									<option value='Completed'";if($pjd[5]=="Completed"){echo"selected";}
									echo">Completed</option>
								</select></td>
						</tr><tr>
							<td>Allow file uploading:</td>
							<td>
								<input type='radio' name='clUpload' value='Yes'";if($pjd[6]=="Yes"){echo"checked";}
									echo">Yes 
								<input type='radio' name='clUpload' value='No'";if($pjd[6]=="No"){echo"checked";}
									echo">No 
							</td>
						</tr><tr>
						<input type='hidden' name='projID' value='$pjd[0]'/>
						";
						}
				echo"</tr></table>	
				<input type='hidden' name='loginName' value='$pjd[1]'/>";
				if($Cac=="shAP")
				{
				echo"
					<input type='hidden' name='Cac' value='shAP'/>
					<button type='submit' name='PRst' value='afterEditProj'>Save project information</button>
					<button type='cancel' name='Cac' value='shAP'>Cancel</button>";
				}else{
				echo"
					<input type='hidden' name='Cac' value='showFiles'/>
					<button type='submit' name='PRst' value='afterEditProj'>Save project information</button>
					<button type='cancel' name='Cac' value='showFiles'>Cancel</button>";}
			echo"</form>";
		break;
		case"afterEditProj":						
			//SAVE updates of a PROJECT
			$sql_saveP="UPDATE clientProjects SET projectName='$projName',
				projectStart='$projSDate', projectType='$projType', projStatus='$projStatus', 
				clUpload='$clUpload' WHERE projID='$projID'";
			$result_saveP=mysqli_query($cxn,$sql_saveP);
			
			$sql_saveP2="UPDATE projectPayments SET 
				payMethod='$payMethod',hourlyRate='$hourlyRate',hours='$hours',
				projPrice='$projPrice' WHERE projID='$projID'";			
			$result_saveP2=mysqli_query($cxn,$sql_saveP2);
			if($result_saveP==false || $result_saveP2==false)
			{echo"Could not save the updated info";}
			else{
				echo"New information updated sucessfully to system!";
			}
		
		break;
		case"ENpay":	
			echo"Enter a recently received Payment<p>
			<table><tr>
			<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
				<td>Payment received Date: </td>
				<td><input type='text' name='paidDate'/></td>
			</tr><tr>
				<td>Payment Amount: </td>
				<td><input type='text' name='payAmount'/></td>
			</tr><tr>
				<td>Paid method: </td>
				<td><input type='text' name='pMethod'/></td>
			</tr><tr>
				<td>Invoice ID: </td>
				<td><input type='text' name='invoiceID'/></td>
			</tr></table>
			<input type='hidden' name='loginName' value='$loginName'/>
				<input type='hidden' name='projID' value='$projID'/>
				<input type='hidden' name='Cac' value='showFiles'/>
				<button type='submit' name='PRst' value='SUBpay'>Submit payment</button>
				<button type='cancel' name'Cac' value='showFiles'>Cancel</button>
			</form><p>
			";
		break;
		case"SUBpay":
			
			$sql_saveSB="INSERT INTO paymentHistory 
			VALUES ('$invoiceID','$projID','$paidDate','$payAmount', '$pMethod')";
			$result_saveSB=mysqli_query($cxn,$sql_saveSB);
			
			if($result_saveSB==false)
			{echo"Could not save the new payment info";}
			else{
				echo"New information updated sucessfully to system!";
			}
		
		break;
	}

?>