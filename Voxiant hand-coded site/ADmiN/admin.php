<?php
/* Program: admin.php
 * Desc:	Communicate with the clients database
*/
echo	"<html>
		<head><title>Voxiant Solutions Client Administation Panel
		</title>
		<link type='text/css' rel='stylesheet' href='../clients/css/clients.css'>
		<script src='../js/jquery.js'type='text/javascript' ></script>
		<script type='text/javascript' src='../clients/js/clients.js'></script>
		<script type='text/javascript'>
		$(document).ready(function() {
			adminShowHide();
		});
		</script>
		
		</head><body id='CL_adm'>";
		
include("/mnt/w0610/d23/s07/b030e947/cgi-bin/voxyBacon.inc");
$cxn =mysqli_connect($host, $user, $password, $database)
or die ("Could not connect to database");
?>

<script type="text/javascript" src="http://static2.skysa.com?i=B2430629-4F6A-48E5-AF0F-4211D81C4E3B"></script>


<table id="maintb"width="100%" cellspacing="0" cellpadding="0">
	<tr id="editting_tb">
		<td width="20%"></td>
		<td >
			<?php
				include("FLst.php");
				include("PRst.php");
				include("CLst.php");
			?>
			
			
		</td>
	</tr>
	<tr >	
		<td width="20%">
			<b>Client Management System<br/>
			CONTROL PANEL</b><br>
			<!--Refresh the page-->
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
				<?php if(isset($refresh)){echo $refresh;} ?>
				<button type="submit" name="clientDO" value="refresh">
				Refresh the page</button>
			</form>
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
				<button id="clients" name="Cac" value="showClient">Show Clients List</button><br/>	
			</form>
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
				<button id="clients" name="Cac" value="shAP">Show all Projects</button><br/>	
			</form>
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
				<button id="clients" name="Cac" value="shAF">Show files on DB</button><br/>	
			</form>
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
				<button id="clients" name="Cac" value="shPCL">Show potential Clients</button><br/>	
			</form>
		</td>
		<td id="formX">
			<!---check what to do from home page what to do with Cac-->
<?php
switch($Cac)
{

////////////////////////////////////////////////
//Cac >	
//SHOW Potential clients
case"shPCL":
	echo"<div>
		<button id='form03_btn1'>Add a new Potential Client</button>
	</div>
	<!--Add a new potential client-->
		<div id='form03_f1' style='display:none;'>
			<table>
				<tr><form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
				<td>ID:</td><td><input type='text' name='pclID'/></td></tr>
					<tr><td>When we first hear about this (mm/dd/yy):</td><td><input type='text' name='openD'/></td></tr>
					<tr><td>Exp. proj Start Date:</td><td><input type='text' name='startD'/></td></tr>
					<tr><td>Client's Name:</td><td><input type='text' name='clientName'/></td></tr>
				<tr><td>Project Type:</td><td><input type='text' name='projType'/></td></tr>
				<tr><td>Description:</td><td><input size='50'type='text' name='pDesc'/></td></tr>
				<tr><td>Price:</td><td><input type='text' name='price'/></td></tr>
				<tr><td>Status:</td><td><input type='text' name='status'/></td></tr>
			</table>
			<input type='hidden' name='Cac' value='shPCL'/>
			<button type='submit' name='CLst' value='addPCL'>
			Add the new Potential Client</button></form><p>
		</div>
	<!--SHOW a list of potential clients-->
		<div id='form03_f0'>";							
			$sql_2="SELECT * FROM potentialClients";
			$result_2=mysqli_query($cxn, $sql_2);								
			if($result_2 == false)
			{echo"<p>Error: ".mysqli_error($cxn)."</p>";
			}else{
				echo"<table class='subtb'><thead><tr>
					<th>ID</th>
					<th>Talk initiated</th>
					<th>Exp. Start Date</th>
					<th>Client Name</th><th>Project Type</th>	
					<th>Description</th><th>Price</th><th>Status</th><th>Action</th></tr><thead><tbody>";
				for($i=0;$i<mysqli_num_rows($result_2);$i++)
				{
					echo"<tr>";									
					$row=mysqli_fetch_row($result_2);//results from cleint table									
					
						echo"
						<td>$row[0]</td><td>$row[6]</td><td>$row[7]</td><td>$row[1]</td><td>$row[2]</td>
						<td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>
						<td>
							<a href='admin.php?Cac=shPCL&CLst=pclEdit&pclID=$row[0]'>Edit</a>
							<a href='admin.php?Cac=shPCL&CLst=pdPCL&pclID=$row[0]'>Delete</a>
						</td>
						";
					
				}
				echo"</tbody></table>";					
			}						
		echo"</div>	";					
break;




////////////////////////////////////////////////
//Cac >	
//SHOW CLIENTS
					case"showClient":
						echo"						
						<div>
							<button id='form01_btn1'>Add a new Client to System</button>
						</div>
					<!---ADD a new client-->
						<div id='form01_f1' style='display:none;'>
							<table>
								<tr><form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
									<td>Client's Name:</td><td><input type='text' name='clName'/></td></tr>
								<tr><td>Client's Company Name:</td><td><input type='text' name='clCompany'/></td></tr>
								<tr><td>Client's Login Name:*</td><td><input type='text' name='cllogin'/></td></tr>
								<tr><td>Client's Password:*</td><td><input type='text' name='clpassw'/></td></tr>
								<tr><td>Client Code:</td><td><input type='text' name='clcode'/></td></tr>
								<tr><td colspan='2'>(this will be the name of the client's folder)</td></tr>
								<tr><td>Client Email Address:</td><td><input type='text' name='clEmail'/></td></tr>
								<tr><td>Client Phone #:</td><td><input type='text' name='clPhone'/></td></tr>								
								<tr><td>Create folders for this client?</td><td><input type='radio' name='folders' value='yes' checked>Yes
									<input type='radio' name='folders' value='no'>No</td></tr>
							</table>
							<input type='hidden' name='Cac' value='showClient'/>
							<button type='submit' name='CLst' value='addClient'>
							Add the new Client</button></form><p>
						</div>
					<!--SHOW a list of clients and projects they have-->
						<div id='form02_f0'>";							
							$sql_2="SELECT * FROM clientInfo";
							$result_2=mysqli_query($cxn, $sql_2);								
							if($result_2 == false)
							{echo"<p>Error: ".mysqli_error($cxn)."</p>";
							}else{
								echo"<table class='subtb'><thead><tr>
									<th>ID code</th><th>Client Name</th><th>Client Company</th>	
									<th>Projects</th><th>Open Projects</th><th>Action</th><th></th></tr><thead><tbody>";
								for($i=0;$i<mysqli_num_rows($result_2);$i++)
								{
									echo"<tr>";									
									$row=mysqli_fetch_row($result_2);//results from clientInfo table									
									$sql_2n0="SELECT * FROM Clients_tb WHERE loginName='$row[0]'";
									$result_2n0=mysqli_query($cxn,$sql_2n0);
									$row0=mysqli_fetch_row($result_2n0);//get the client code ID
										echo"
										<td>$row0[2]</td><td>$row[1]</td><td>$row[2]</td>";
									
									$sql_2n1="SELECT * FROM clientProjects WHERE loginName='$row[0]' AND projStatus='in Progress'";
									$result_2n1=mysqli_query($cxn,$sql_2n1);
									$nrows=mysqli_num_rows($result_2n1);

									$sql_2n2="SELECT * FROM clientProjects WHERE loginName='$row[0]'";
									$result_2n2=mysqli_query($cxn,$sql_2n2);
									$nrows2=mysqli_num_rows($result_2n2);	
									
									echo"<td>$nrows2</td><td>$nrows</td><td>					
										<a href='admin.php?CLst=preDelCL&Cac=showClient&loginName=$row[0]'>Delete</a> 
										<a href='admin.php?loginName=$row[0]&Cac=shPR'>Select Client</a></td></tr>";
								}
								echo"</tbody></table>";					
							}						
						echo"</div>	";					
					break;
////////////////////////////////////////////////
//Cac >
//SHOW PROJECTS
					case"shPR":
						echo"
							<p class='subpgT_1'>Projects for</p>
							<b>$loginName</b>(Client)<br/>";
							$sql_incl="SELECT * FROM Clients_tb WHERE loginName='$loginName'";
							$result_incl=mysqli_query($cxn,$sql_incl);
							$rowCL=mysqli_fetch_row($result_incl);
							
							$sql_incl2="SELECT * FROM clientInfo WHERE loginName='$loginName'";
							$result_incl2=mysqli_query($cxn,$sql_incl2);
							$rowCL2=mysqli_fetch_row($result_incl2);
							
							$sql_incl3="SELECT * FROM clientProjects WHERE loginName='$loginName' AND projStatus='In Progress'";
							$result_incl3=mysqli_query($cxn,$sql_incl3);
							$numCL3=mysqli_num_rows($result_incl3);
						echo"<div class='clientPG'>
							<table width='100%'>
								<tr><td width='50%'>
									<table>
										<tr>
											<td>Client's Name: </td><td>$rowCL2[1]</td>
										</tr>
										<tr>
											<td>Client's Company: </td><td>$rowCL2[2]</td>
										</tr>
										<tr>
											<td>Client's Login Name: </td><td>$rowCL[0]</td>
										</tr>
										<tr>
											<td>Client's password: </td><td>$rowCL[1]</td>
										</tr>
										<tr>
											<td>Client's Code: </td><td>$rowCL[2]</td>
										</tr>
										<tr>
											<td>Client's Email: </td><td>$rowCL2[3]</td>
										</tr>
										<tr>
											<td>Client's Phone: </td><td>$rowCL2[4]</td>
										</tr>
									</table>
									</td><td>
									<table>
										<tr>
											<td>Open Projects (In Progress): </td><td>$numCL3</td>
										</tr>
									</table></td></tr>								
							</table>
						<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
							<input type='hidden' name='loginName' value='$loginName'/>
							<input type='hidden' name='Cac' value='shPR'/>
							<button type='submit' name='CLst' value='edCL'>Edit Client Information</button>
						</form>
						</div>";
							
						echo"<div>
								<button id='form02_btn1'>Add a new Project for $loginName</button>
							</div>
							<div id='form02_f1' >
								<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
									<table><tr>
										<td>Unique Project ID: </td>
										<td><input type='text'name='projID'/></td>
									</tr><tr>
										<td>Name of the Project:</td>
										<td><input type='text' name='projName'/></td>
									</tr><tr>
										<td>Date project started:</td>
										<td><input type='text' name='projSDate'/></td>
									</tr><tr>
										<td>Project Type:</td>
										<td><select name='projType'>
												<option value='Graphic Design'>Graphic Design</option>
												<option value='Website Design'>Website Design</option>
												<option value='Web & Graphic'>Web & Graphic</option>
											</select></td>
									</tr><tr>
										<td>Project Status:</td>
										<td><select name='projStatus'>
												<option value='Started'>Started</option>
												<option value='In Progress'>Work In Progress</option>
											</select></td>
									</tr><tr>
									
										<td>Pricing Method: </td>
										<td><select name='payMethod'>
											<option value='Hourly'>Hourly</option>
											<option value='Solid'>Solid</option>
										</select></td>
									</tr><tr>
										<td>Hourly Rate: </td>
										<td>US$<input type='text' name='hourlyRate'/></td>
									</tr><tr>
										<td>Hours So far (Hr): </td>
										<td><input type='text' name='hours'/>Hr</td>
									</tr><tr>		
										<td>Project Price: </td>
										<td><input type='text' name='projPrice'/></td>	
									</tr><tr>
										<td>Allow file Upload: </td>
										<td><input type='radio' name='clUpload' value='Yes' checked>Yes 
										<input type='radio' name='clUpload' value='No'>No
										</td>
									</tr>
									
									</table>
									<input type='hidden' name='loginName' value='$loginName'/>
									<input type='hidden' name='Cac' value='shPR'/>
									<button type='submit' name='PRst' value='addProj'>Create a new project</button>
								</form>
							</div>
							<div >";							
								$sql_04="SELECT * FROM clientProjects WHERE loginName='$loginName'";					
								$result_04=mysqli_query($cxn,$sql_04);								
								
								if($result_04==false)
									{echo"Could not get projects";}
								elseif(@mysqli_num_rows($result_04)==0)
									{echo"No projects found under client \"$loginName\"";}
								else
								{
									echo"<table class='subtb'><thead><tr>										
										<th>Project Name</th>
										<th>Project Start Date</th>
										<th>Project Type</th>
										<th>Project Status</th>
										<th>Pricing Method</th>
										<th>Project Price</th>
										<th>Paid</th>
										<th>Action</th>";
									
									echo"<th></th></tr></thead><tbody>";			
									for($i=0;$i<mysqli_num_rows($result_04);$i++)
									{
										echo "<tr>";
										$row= mysqli_fetch_row($result_04);
								
										$sql_04a="SELECT payAmount FROM paymentHistory WHERE projID='$row[0]'";					
										$result_04a=mysqli_query($cxn,$sql_04a);
										if(@mysqli_num_rows($result_04a)!=0)
										{ 
											$psum="sum".$i;
											for($tr=0;$tr<@mysqli_num_rows($result_04a);$tr++){
												$rowCL2=mysqli_fetch_row($result_04a);												
												$psum+=$rowCL2[0];													
											}	
										
										}else{$psum=0;}										
										$psum=sprintf("%.2f",$psum);
										
										$sql_04b="SELECT * FROM projectPayments WHERE projID='$row[0]'";					
										$result_04b=mysqli_query($cxn,$sql_04b);
										$row04b=mysqli_fetch_row($result_04b);
										if($row04b[1]=="Hourly")
											{
												$pprice=$row04b[2]*$row04b[3];}
											else{$pprice=$row04b[4];}
										
										$pprice=sprintf("%.2f",$pprice);
										echo"
										<td>$row[2]</td>
										<td>$row[3]</td>
										<td>$row[4]</td>
										<td>$row[5]</td>
										<td>$row04b[1]</td>
										<td>$ $pprice</td>
										<td>$ $psum</td>";
										echo "<td>				
											<a href='admin.php?PRst=preDelProj&Cac=shPR&projID=$row[0]&projName=$row[2]&loginName=$loginName'>
												Delete</a> 											
											<a href='admin.php?Cac=showFiles&projID=$row[0]&loginName=$loginName'>Select Project</a>
											</td></tr>";
									}echo "</tbody></table>";			
								}							
						echo"</div>
						";
					break;
////////////////////////////////////////////////
//Cac >
//SHOW all projects
					case"shAP":

						echo"<p class='subpgT_1'>All Projects</p>							
							<div >";							
								$sql_04="SELECT * FROM clientProjects ORDER BY loginName";					
								$result_04=mysqli_query($cxn,$sql_04);	
														
								if($result_04==false)
									{echo"Could not get projects";}
								elseif(@mysqli_num_rows($result_04)==0)
									{echo"No projects found";}
								else
								{
									echo"<table class='subtb'><thead><tr>
										<th>Project ID</th>
										<th>Client</th>
										<th>Project Name</th>
										<th>Project Start Date</th>
										<th>Project Type</th>
										<th>Status</th>
										<th>Price</th>";
																										
									echo"<th>Action</th></tr></thead><tbody>";			
									for($i=0;$i<mysqli_num_rows($result_04);$i++)
									{
										echo "<tr>";
										$row= mysqli_fetch_row($result_04);				
										
										$sql_04a="SELECT projPrice FROM projectPayments WHERE projID='$row[0]'";					
										$result_04a=mysqli_query($cxn,$sql_04a);	
										$rowa= mysqli_fetch_row($result_04a);		
										
										echo "<td>$row[0]</td>
											<td>$row[1]</td>
											<td>$row[2]</td>
											<td>$row[3]</td>
											<td>$row[4]</td>
											<td>$row[5]</td>";
											
										
											echo"<td>$rowa[0]</td>";
															
										echo "<td>				
											<a href='admin.php?PRst=preDelProj&Cac=shAP&projID=$row[0]'>
												Delete</a> 
											<a href='admin.php?Cac=showFiles&projID=$row[0]&loginName=$row[1]'>Select Project</a>
											</td></tr>";
									}echo "</tbody></table>";			
								}							
						echo"</div>
						";
					break;					
////////////////////////////////////////////////
//Cac >
//SHOW files
					case"showFiles":
							$sql_45="SELECT projectName FROM clientProjects WHERE projID='$projID'";
							$result_45=mysqli_query($cxn,$sql_45);
							$row45=mysqli_fetch_row($result_45);
							$projName=$row45[0];
							
							echo"<p class='subpgT_1'>Files for</p> 
								<b>$projName</b> under client (<a href='admin.php?loginName=$loginName&Cac=shPR'>
								$loginName</a>)<br/>";
							
							//Conntecting to the databases
							$sql77="SELECT * FROM projectPayments WHERE projID='$projID'";
							$result77=mysqli_query($cxn,$sql77);
							$rowCL0=mysqli_fetch_row($result77);
							
							$sql78="SELECT * FROM clientProjects WHERE projID='$projID'";
							$result78=mysqli_query($cxn,$sql78);
							$rowCL=mysqli_fetch_row($result78);
							
							$sql79="SELECT payAmount FROM paymentHistory WHERE projID='$projID'";
							$result79=mysqli_query($cxn,$sql79);
							if(@mysqli_num_rows($result79)!=0)
							{ 
								for($tr=0;$tr<@mysqli_num_rows($result79);$tr++){
									$rowCL2=mysqli_fetch_row($result79);
									$psum+=$rowCL2[0];								
								}						
							
							}//Price of the project
							else{$psum=0;}
							$psum=sprintf("%.2f",$psum);								
								
							echo"<div class='clientPG'>
								<table width='100%'><tr><td width='35%'><table>
											<tr><td>Project Name: </td><td>$rowCL[2]</td></tr>
											<tr><td>Project ID: </td><td>$projID</td></tr>
											<tr><td>Project Type: </td><td>$rowCL[4]</td></tr>
											<tr><td>Project Start Date: </td><td>$rowCL[3]</td></tr>
											<tr><td>Project Status: </td><td>$rowCL[5]</td></tr>	
											<tr><td><p>Allow file uploading: </td><td>$rowCL[6]</td></tr>
										</table></td><td><table>
											<tr><td>Pricing Method: </td><td>$rowCL0[1]</td></tr><tr>";
											$prz=$rowCL0[2]*$rowCL0[3];//Paid so far with hourly pay method		
											$prz=sprintf("%.2f",$prz);											
										if($rowCL0[1]=="Hourly"){
											echo"<td>Hourly Rate: </td><td>US$ $rowCL0[2]</td>
												</tr><tr><td>Hours So far: </td><td>$rowCL0[3] hr</td>
												</tr><tr><td>Project Price upto-date @ hourly rate:</td><td>US$ $prz</td>";
										}else{echo"<td>Project Price: </td><td>US$ $rowCL0[4]</td>";}
										echo"</tr><tr>
												<td>Paid by Client so far: </td><td>US$ $psum</td>
											</tr><tr><td>Payment Status: </td><td>";
												if($rowCL0[1]=="Hourly"){
													if($psum==$prz){echo"Fully Paid";}
													if($psum<$prz){$pperc=round((($psum/$prz)*100),2);
															echo"$pperc % Paid";}
												}else{if($psum==$rowCL0[4]){echo"Fully Paid";}
													if($psum<$rowCL0[4])
														{$pperc=round((($psum/$rowCL0[4])*100),2);
															echo"$pperc % Paid";}
												}												
										echo"</td></tr></table></td></tr></table>				
							<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
								<input type='hidden' name='loginName' value='$loginName'/>
								<input type='hidden' name='projID' value='$projID'/>
								<input type='hidden' name='Cac' value='showFiles'/>
								<button type='submit' name='PRst' value='editProj'>Edit Project Information</button>
								<button type='submit' name='PRst' value='ENpay'>Enter New payment</button>								
							</form>							
							</div>";
						//END top half -- Project information section
							
						//ALL File Uploading BUTTONS
						echo"<div>
								<button id='form02_btn1'>Upload a File</button>
								<button id='form02_btn2'>Add a file to DB w/o Uploading</button>
								<button id='form02_btn3'>Add Iteration SET</button>
								
								
							</div>";
				
				
				//FORM
				//ADD a Iteration SET HOLDER
							echo"<div id='form02_f3' >
							<form enctype='multipart/form-data' action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
									<table><tr>
										<td>Iteration Set ID: <input type='text' name='isID'/></td>
										<td>Iteration Set Name: <input type='text' name='isName'/></td>
									</tr><tr><td colspan='2'>
										Allow Feedbacks on the iteration Set: 
											<input type='radio' name='feedISet' value='Yes'>Yes
											<input type='radio' name='feedISet' value='No'>No
									</td>
										<input type='hidden' name='projID' value='$projID'/>
										<input type='hidden' name='projName' value='$projName'/>
										<input type='hidden' name='Cac' value='showFiles'/>
										<input type='hidden' name='loginName' value='$loginName'/>
									</tr></table>
										<button type='submit' value='addITSET' name='FLst'>Create an Iteration SET</button>
									
							</form>
							</div>";
				
				
				//FORM
				//UPLOAD FILE to a project
							
							
							echo"<div id='form02_f1' >
								<form enctype='multipart/form-data' action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
									<table><tr>
										
										<td>File ID: </td><td><input type='text'name='flID'/></td></tr><tr>
										<td>File Name:</td><td><input type='text' name='flName'/></td>
									</tr><tr>
										<td>File Category:</td>
										<td><select name='flCateg'>
												<option value='projectF'>Project File</option>
												<option value='contractF'>Contract File</option>												
											</select>										
										<input type='hidden' name='MAX_FILE_SIZE' value='209715200' /></td>
									</tr><tr>
										<td>Sub Category: <a href='#'title='Select the subcategory to upload file. Iteration File will allow you to add files inside an iteration SET'>
										(?)</a></td><td>
										
										<!---scat-->
											<input type='radio' name='scat' onclick='subCategory()' id='sel_1' value='downLNow' CHECKED>Download Now
											<input type='radio' name='scat' onclick='subCategory()' id='sel_2' value='viewNow'>View Now
											<input type='radio' name='scat' onclick='subCategory()' id='sel_3' value='iterationSET'>Iteration File
										</td>
									</tr><tr id='cat04' style='display:none;'>
										<td>Allow feedback/Rating:</td>
										<td><input type='radio' name='feeds' onclick='feedD()' id='fd1' value='Yes' >Yes
											<input type='radio' name='feeds' onclick='feedD()' id='fd2' value='No'CHECKED>No
										</td>
									</tr><tr id='itDesc'style='display:none;'>
										<td>File Desciption:</td><td><input type='text' size='40'name='itDesc'/></td>
									
									<!--rating criteria for ViewNow files-->
									<tr id='itSET3' style='display:none;'>
										<td colspan='2'><br>Client ratings for this Iteration (optional)
											<a href=''title='This will allow client to rate this item based on 4 optional criteria'>(?)</a><br>
									
										Rating Criteria #1:
										<input type='text' name='VratingC1'/><br>									
										Rating Criteria #2:										
										<input type='text' name='VratingC2'/><br>
										Rating Criteria #3:
										<input type='text' name='VratingC3'/><br>
										Rating Criteria #4:
										<input type='text' name='VratingC4'/><br>
										</td>										
									</tr>
									
									</tr><tr id='itSET' style='display:none;'>
										<td>Select Iteration SET: </td>
										<td><select name='pfID'>";
										
										$sql_66="SELECT pfID, fileName FROM projectFiles WHERE projID='$projID' AND fileSubCat='iterationSET'";
										$result_66=mysqli_query($cxn,$sql_66);
										
										for($i66=0;$i66<mysqli_num_rows($result_66);$i66++){
											$row_66=mysqli_fetch_row($result_66);
											echo"<option value='$row_66[0]'>$row_66[1]</option>";
										}
										echo"
										</select>	
										<script type = 'text/javascript'>
										function feedD(){
										if(document.getElementById('fd1').checked){
											document.getElementById('itSET3').style.display='';
										}else{
											document.getElementById('itSET3').style.display='none';
										}}
										
										function subCategory() {
										if(document.getElementById('sel_2').checked){
											document.getElementById('cat04').style.display='';
										}else{
											document.getElementById('cat04').style.display='none';
										}
										if (document.getElementById('sel_3').checked) {
										document.getElementById('itDesc').style.display='';
										document.getElementById('itSET').style.display='';
										document.getElementById('itSET2').style.display='';
										}else {
										document.getElementById('itDesc').style.display='none';
										document.getElementById('itSET').style.display='none';
										document.getElementById('itSET2').style.display='none';}}
										</script></td>
									</tr><tr id='itSET2' style='display:none;'>
										<td colspan='2'><br>Client ratings for this Iteration (optional)
											<a href=''title='This will allow client to rate this item based on 4 optional criteria'>(?)</a><br>
									
										Rating Criteria #1:
										<input type='text' name='ratingC1'/><br>
									
										Rating Criteria #2:										
										<input type='text' name='ratingC2'/><br>
										Rating Criteria #3:
										<input type='text' name='ratingC3'/><br>
										Rating Criteria #4:
										<input type='text' name='ratingC4'/><br>
										</td>	
										
									</tr><tr>
										<td>Choose a file to upload:</td>
										<td><input name='uploadedfile' type='file' /></td>	
									</tr></table>
									<input type='hidden' name='loginName' value='$loginName'/>
									<input type='hidden' name='projName' value='$projName'/>
									<input type='hidden' name='projID' value='$projID'/>
									<input type='hidden' name='Cac' value='showFiles'/>
									<button type='submit' value='uploadFile' name='FLst'>Upload file</button>
								</form>
							</div>";
				//FORM
				//ADD a FILE W/O Uploading
							echo"
							<div id='form02_f2' >
								<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
									<table><tr><td>File ID: </td><td><input type='text'name='flID'/></td>
									</tr><tr><td>File Title:</td><td><input type='text' name='flName'/></td>
									</tr><tr><td>File Name for path:</td><td><input type='text' name='flPathX'/></td>
									</tr><tr><td>File Size:</td><td><input type='text' name='flSize'/></td>						
									</tr><tr><td>File Category:</td>
										<td><select name='flCateg'>
												<option value='projectF'>Project File</option>
												<option value='contractF'>Contract File</option>												
											</select>
										</td></tr><tr></tr></table>
									<input type='hidden' name='loginName' value='$loginName'/>
									<input type='hidden' name='projName' value='$projName'/>
									<input type='hidden' name='projID' value='$projID'/>
									<input type='hidden' name='Cac' value='showFiles'/>
									<button type='submit' value='uploadFileWO' name='FLst'>Upload file</button>
								</form></div><div >";
				//show files under a project	
					
					//PROJECT FILES CATEGORY
								$sql_fl_1="SELECT * FROM projectFiles WHERE projID='$projID' AND fileCategory='projectF'
									ORDER BY pfID DESC";
								$result_fl_1=mysqli_query($cxn,$sql_fl_1);
								if(@mysqli_num_rows($result_fl_1)==0)
								{echo"<p class='no_files'>No Project files shown under the Project \"$projName\"</p><br/>";
								}else{	
									echo"<div class='subtb_head'>Project Files</div>";
									echo"<table width='600px'><tr class='cltb_34_head'> <td colspan='3'></td></tr>";			
									
									
									for($i=0;$i<mysqli_num_rows($result_fl_1);$i++)
									{
										$row1= mysqli_fetch_row($result_fl_1);
										//FILE SUB CATEGORY SECTION
										switch($row1[8]){
											case"iterationSET":
												//ITERATION SET
												
												echo "<tr class='cltb_34_head'>
													<td><b>ITERATION SET</b><br/>
														<b>I.SET Name: </b>$row1[3]<br/></td>
													<td><b>Iteration SET ID: </b>$row1[0]<br/>
														<b>Uploaded at: </b>$row1[6]<br/>";
														
														$sql66="SELECT feedID, theFeed FROM voxFeeds WHERE parentID='$row1[0]'";
														$result66=mysqli_query($cxn,$sql66);														
														if(@mysqli_num_rows($result66)!=0){
															$rw66=mysqli_fetch_row($result66);
															if($rw66[1]!=""){
															
																echo"Feedback: $rw66[1]";
															}else{
																echo"No feedback";
															}
														}
														
													
													echo"</td>
													<td><a href='admin.php?FLst=editITSET&Cac=showFiles&pfID=$row1[0]&projID=$projID&loginName=$loginName'>
														Update Set</a>  
												</td></tr>
												<tr class='cltb_34_head'><td colspan='3'>
													<table>";
														$sql_itG="SELECT * FROM iterationItem WHERE pfID='$row1[0]'";
														$result_itG=mysqli_query($cxn,$sql_itG);
														if(@mysqli_num_rows($result_itG)!=0)
														{
															for($it3=0;$it3<mysqli_num_rows($result_itG);$it3++){
																
																echo"<tr ><td width='50px'></td>";
																$rowitG=mysqli_fetch_row($result_itG);
																	echo"<td><b>File(iter) ID: </b>$rowitG[0]</br>
																	<b>File Name: </b>$rowitG[3]</br>
																	<b>File Description :</b>$rowitG[4]</br>
																	<b>File Size :</b>$rowitG[5]
																	</td><td>";															
																$sql_itFd="SELECT * FROM voxFeeds WHERE parentID='$rowitG[0]'";
																$result_itFd=mysqli_query($cxn,$sql_itFd);
																if(@mysqli_num_rows($result_itFd)!=0){
																$rowitFd=mysqli_fetch_row($result_itFd);
																	
																	if($rowitFd[4]!=""){
																	echo"<b><u>Feedback & Ratings</u></b></br>";
																		if($rowitFd[4]!=""){echo"$rowitFd[8]/5 - $rowitFd[4]</br>";}
																		if($rowitFd[5]!=""){echo"$rowitFd[9]/5 - $rowitFd[5]</br>";}
																		if($rowitFd[6]!=""){echo"$rowitFd[10]/5 - $rowitFd[6]</br>";}
																		if($rowitFd[7]!=""){echo"$rowitFd[11]/5 - $rowitFd[7]</br>";}
																	}
																	echo"Feedback: ";
																		if($rowitFd[3]==""){echo"n/a";}
																			else{echo"$rowitFd[3]";}														
																	
																	echo"</td>";
																}else{echo"<td>No Feedback or ratings</td>";}
																echo"
																<td>
																	<a href='admin.php?FLst=pDITF&Cac=showFiles&
																	iterID=$rowitG[0]&projID=$projID&loginName=$loginName'>
																	Delete file</a>
																</td>
																</tr>";
															}
														}
														else{echo"<td>No files found under this iteration set</td>";}	
													echo"
													</tr>
													</table>
												</td></tr>
												";
											break;
											
											case"downLNow":
												echo "<tr class='cltb_34_head'>
													<td><b>File ID: </b>$row1[0]<br/>
														<b>File Name: </b>$row1[3]<br/><b>F.Path: </b>$row1[2]</td>
													<td><b>File Size: </b>$row1[5] ($row1[7])<br/>
														<b>Uploaded at: </b>$row1[6]<br/>
														<b>F. subCat <a href='' title='File Subcategory under project Files'>(?)</a></b>: $row1[8]</td>
													<td><a href='admin.php?loginName=$loginName&flID=$row1[0]
														&Cac=showFiles&FLst=preDelFE&projID=$projID' title=
														'This will delete the database entry of the file and not the actual file'>
															Delete File</a><br/>  
														<a href='admin.php?loginName=$loginName&flID=$row1[0]&projID=$projID
														&Cac=showFiles&FLst=editFile'>Update Info</a>
												</td></tr>";												
											break;
											
											case"viewNow":
												$sql_84="SELECT * FROM voxFeeds WHERE parentID='$row1[0]'";
												$result_84=mysqli_query($cxn,$sql_84);
												if(@mysqli_num_rows($result_84)!=""){
													$rw_84=mysqli_fetch_row($result_84);
													
														if($rw_84[4]!=""){$feedRt="$rw_84[8]/5 - $rw_84[4]";}
														if($rw_84[5]!=""){$feedRt.="<br/>$rw_84[9]/5 - $rw_84[5]";}
														if($rw_84[6]!=""){$feedRt.="<br/>$rw_84[10]/5 - $rw_84[6]";}
														if($rw_84[7]!=""){$feedRt.="<br/>$rw_84[11]/5 - $rw_84[7]";}
													
													if($rw_84[3]!=""){$feedRt.="<br/>Feedback: $rw_84[3]";}
												
												}else{$feedRt="No Feedbacks or ratings";}
												echo "<tr class='cltb_34_head'>
													<td><b>File ID: </b>$row1[0]<br/>
														<b>File Name: </b>$row1[3]<br/><b>F.Path: </b>$row1[2]</td>
													<td><b>File Size: </b>$row1[5] ($row1[7])<br/>
														<b>Uploaded at: </b>$row1[6]<br/>
														<b>F. subCat <a href='' title='File Subcategory under project Files'>(?)</a></b>: $row1[8]														
														<br/><b><u>Feedback and Ratings</b></u><br/>
														$feedRt
													</td>
													<td><a href='admin.php?loginName=$loginName&flID=$row1[0]
														&Cac=showFiles&FLst=preDelFE&projID=$projID' title=
														'This will delete the database entry of the file and not the actual file'>
															Delete File</a><br/>  
														<a href='admin.php?loginName=$loginName&flID=$row1[0]&projID=$projID
														&Cac=showFiles&FLst=editFile'>Update Info</a>
												</td></tr>";
											
											break;
										}								
									}
									echo "</tbody></table>";	
								}
								
				//Contract Files
								$sql_fl="SELECT * FROM projectFiles WHERE projID='$projID' AND fileCategory='contractF'";
								$result_fl=mysqli_query($cxn,$sql_fl);
								if(@mysqli_num_rows($result_fl)==0){
									echo"<p class='no_files'><b>Contract Files</b> No files under the Project \"$projName\"</p>";
								}else{	
									echo"<div class='subtb_head'>Contract Related Files</div>
									<table><thead><tr><th>File Title</th>										
										<th>File Path</th><th>Action</th></tr></thead><tbody>";			
									for($i=0;$i<mysqli_num_rows($result_fl);$i++)
									{
										$row2= mysqli_fetch_row($result_fl);	
										echo "<tr class='cltb_34_head'>
												<td><b>File ID: </b>$row2[0]<br/>
													<b>File Name: </b>$row2[3]<br/><b>F.Path: </b>$row2[2]</td>
												<td><b>F.Size: </b>$row2[5]<br/><b>F.Type: </b>$row2[7]<br/>
													<b>Uploaded at: </b>$row2[6]</td>
												<td><a href='admin.php?loginName=$loginName&projName=$projName&flID=$row2[0]
													&Cac=showFiles&FLst=preDelFE&projID=$projID' title=
													'This will delete the database entry of the file and not the actual file'>
														Delete File</a><br/>  
													<a href='admin.php?loginName=$loginName&flID=$row2[0]&projName=$projName&projID=$projID
													&Cac=showFiles&FLst=editFile'>Update Info</a>													
											</td></tr>";
									}echo "</tbody></table>";	
								}

				//SHOW client uploaded files
								$sql_ufl="SELECT * FROM clientUploads WHERE projID='$projID'";
								$result_ufl=mysqli_query($cxn,$sql_ufl);
								if(@mysqli_num_rows($result_ufl)==0){
									echo"<p class='no_files'>No Files uploaded by client under the Project \"$projName\"</p>";
								}else
								{	echo"<p><div class='subtb_head'>Files uploaded by Client</div>
									<table width='600px'><tr class='cltb_34_head'> <td colspan='3'></td></tr>";
									for($i3=0;$i3<mysqli_num_rows($result_ufl);$i3++)
									{
										$row3= mysqli_fetch_row($result_ufl);
										echo "<tr class='cltb_34_head'>
												<td><b>File ID: </b>$row3[0]<br/>
													<b>File Name: </b>$row3[2]<br/>
													<b>Description: </b>$row3[3]</td>
												<td><b>F.Size: </b>$row3[5]<br/>
													<b>F.Type: </b>$row3[7]<br/>
													<b>Uploaded at: </b>$row3[6]</td>
												<td><a target='_blank'href='../clients/$row3[4]/clientFiles/$row3[8]'>Download File</a></td></tr>";
									}echo "</table>";
								}
						echo"</div>";					
					break;

					
////////////////////////////////////////////////	
//Cac > 	
//SHOW ALL FILES
					case"shAF":
						echo"
							All Files from all projects on database<br/>							
							<div >";							
								$sql_shaf="SELECT * FROM projectFiles ORDER BY projID";					
								$result_shaf=mysqli_query($cxn,$sql_shaf);					
								if($result_shaf==false)
									{echo"Could send the query to files DB";}
								elseif(@mysqli_num_rows($result_shaf)==0)
									{echo"No files found";}
								else{
									echo"<table class='subtb'><thead><tr>
										<th>Project ID</th><th>File Title</th>
										<th>File Path</th><th>Uploaded Date</th>
										<th>Action</th>";									
									echo"<th></th></tr></thead><tbody>";			
									for($i=0;$i<mysqli_num_rows($result_shaf);$i++){
										echo "<tr>";
										$rowS= mysqli_fetch_row($result_shaf);				
										echo"
											<td>$rowS[1]</td><td>$rowS[3]</td>
											<td>$rowS[2]</td><td>$rowS[6]</td>";															
										echo "<td>				
											<a href='admin.php?Cac=shAF&FLst=preDelFE&flID=$rowS[0]'>
												Delete DB Entry</a> 
											<a href='admin.php?Cac=shAF&FLst=editFile&flID=$rowS[0]'>
												Edit Info</a> 											
											</td></tr>";
									}echo "</tbody></table>";			
								}echo"</div>";
					break;
////////////////////////////////////////////////					
					
				}
			?>
		</td>	
	</tr>
</table>

</body>
</html>