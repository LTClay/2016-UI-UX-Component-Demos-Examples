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
				<p>Projects </p>
			</div>
			<div class="projectC_inside">
			<?php
			include("/mnt/w0610/d23/s07/b030e947/cgi-bin/voxyBacon.inc");
			$cxn =mysqli_connect($host, $user, $password, $database)
			or die ("Could not connect to database");
				
				$sql_01="SELECT * FROM clientProjects WHERE loginName='$clientNM'";
				$result_01=mysqli_query($cxn,$sql_01);
				if($result_01== false)
				{//cant send the query
					Echo"<p>Could not connect to the database at this time. Please try again later</p>";
				}else
				{
					if(@mysqli_num_rows($result_01)==0)
					//No projects for a client
					{echo"<div class='PC_head'>
								<div class='PC_title'><p>No projects available</p></div>
						</div>";
					}else
					{
					
					//Projects found for a client						
						for($i_01=0;$i_01<mysqli_num_rows($result_01);$i_01++)
						{
							$projects_01=mysqli_fetch_assoc($result_01);
							echo"
								<div class='PC_head'>
									<div class='PC_title'>
										<p>$projects_01[projectName]</p>";
										
								if($projects_01[projStatus]=="Completed" || $projects_01[projStatus]=="Not Started"){
									echo"<style type='text/css'>
										#PC_con$i_01 {display:none;}
									</style>
									<script type='text/javascript'>
									$(document).ready(function(){
										$('#PC_show$i_01').click(function(){
										$('#PC_con$i_01').slideDown('fast');
										$('#PC_hide$i_01').show();$('#PC_show$i_01').hide();
										});
										$('#PC_hide$i_01').click(function(){
										$('#PC_con$i_01').slideUp('fast');
										$('#PC_show$i_01').show();$('#PC_hide$i_01').hide();
										});
									});
									</script>
									<p class='PC_show PC_showhide' id='PC_show$i_01'></p>
									<p class='PC_hide PC_showhide' id='PC_hide$i_01'style='display:none;'></p>";
								}
									echo"</div>
									<div class='PC_progress'><p>Status: $projects_01[projStatus]</p></div>
								</div>";
								
							echo"<div class='PC_inside' id='PC_con$i_01'>
									<table class='PC_in'><tbody>
										<tr><td class='PCT_left'>
												<div class='PCI_left'>
													<p class='PCIL_head'>Project Information</p>
													<p class='PCIL_tx'>Project ID: $projects_01[projID]</p>
													<p class='PCIL_tx'>Project Type: $projects_01[projectType]</p>
													<p class='PCIL_tx'>Project Started on: $projects_01[projectStart]</p>";
														//Project pricing information
														$projID=$projects_01[projID];
														$sql_03="SELECT * FROM projectPayments WHERE projID='$projID'";
														$result_03=mysqli_query($cxn,$sql_03);
														$row_03=mysqli_fetch_row($result_03);
														
														//Connection to payment history
														$sql_04="SELECT payAmount FROM paymentHistory WHERE projID='$projects_01[projID]'";
														$result_04=mysqli_query($cxn,$sql_04);													
														if(@mysqli_num_rows($result_04)!=0)//there are payments
														{ 
															$paid_04="sum".$i_01;
															for($tr=0;$tr<@mysqli_num_rows($result_04);$tr++){
																$rowCL2=mysqli_fetch_row($result_04);												
																$paid_04+=$rowCL2[0];													
															}	
														
														}else{$paid_04=0;}	//There are no payments
														
														$paid_04=sprintf("%.2f",$paid_04);														
														
														$pricesof=$row_03[2]*$row_03[3];
														$pricesof=sprintf("%.2f",$pricesof);
														
														if($row_03[1]=="Hourly")
														{
															echo"
																<p class='PCIL_tx'>Pricing Method: Hourly</p>
																<div class='PCIL_price'>
																	<div class='PCILP_left'>
																		<p class='price_head'>Price so far:</p>
																		<p class='price_txt'>$$pricesof</p>
																	</div><div class='PCILP_right'>
																		<p class='price_head'>Rate: $$row_03[2]/hr</p>
																		<p class='price_head'>Hours: $row_03[3] hr</p>
																		<p class='price_head'>Paid already: $$paid_04</p>
																	</div>
																</div>";
														}else{
															echo"<div class='PCIL_price'>
																	<div class='PCILP_left'>
																		<p class='price_head'>Project Price:</p>
																		<p class='price_txt'>$$row_03[4]</p>
																	</div><div class='PCILP_right'>
																		<p class='price_head'>Paid Already: </p>
																		<p class='price_txt'>$$paid_04</p>
																	</div></div>";
														}														
												echo"</div>
											</td><td class='PCT_right'>
												<div class='PCI_right'>
													<div class='PCIR_projectFiles'>
														<div class='subProj_head'><p class='PCIR_header'>Project Files</p></div>														
														<div class='PCIR_pf'>
															<table class='PCR_in'>
																<tr class='PCIR_pf_head'>
																	<td><p>File Name</p></td>
																	<td><p>File Type</p></td>
																	<td><p>File Size</p></td>
																	<td><p>Last Modified</p></td>
																	<td></td>
																</tr>
																<!--Lines-->";
																//check to see if there are any project files onboard for this project
																$sql_02="SELECT * FROM projectFiles WHERE projID='$projects_01[projID]' 
																	AND fileCategory='projectF' ORDER BY pfID DESC";
																$result_02=mysqli_query($cxn,$sql_02);
																if($result_02== false)
																{//cant send the query
																	echo"<tr class='PCIR_pf_lines'><td colspan='5'><p>Could not connect to the database at this time. 
																			Please try again later</p></td></tr>";
																}else
																{
																	if(@mysqli_num_rows($result_02)==0)//No files for a project
																	{echo"<tr class='PCIR_pf_lines'><td colspan='5'><p>No files found for this project</p></td></tr>";
																	}else
																	{//Files found for the project																		
																		for($i_02=0;$i_02<mysqli_num_rows($result_02);$i_02++)
																		{
																			$files_02=mysqli_fetch_assoc($result_02);
																			$file_use=$files_02[filePath];//file the path of the file																			
																			$file_ex=end(explode(".",$file_use));//file extention
																			
																			echo"
																				<tr class='PCIR_pf_lines'>
																					<td><p>$files_02[fileName]</p></td>
																					<td><p>$file_ex</p></td>
																					<td><p>$files_02[fileSize]</p></td>
																					<td><p>$files_02[fileTime]</p></td>
																					";
																					switch($files_02[fileSubCat])
																					{
																					 case"iterationSET":
																						echo"<td><a href='iterationSet.php?pfID=$files_02[pfID]' class='file_view'><em>viewIT</em></a></td>";
																					 break;
																					 case"viewNow":
																						echo"<td><a href='singleItem.php?pfID=$files_02[pfID]' class='file_view'><em>viewIT</em></a></td>";
																					 break;
																					 case"downLNow":
																						echo"<td><a target='_blank'href='downloadFile.php?pfID=$files_02[pfID]' class='file_download'><em>download</em></a></td>";
																					 break;
																					 default:
																						echo"<td><a target='_blank'href='downloadFile.php?pfID=$files_02[pfID]' class='file_download'><em>download</em></a></td>";
																					break;
																					
																					}
																			echo"</tr>";
																		}
																	}
																}	
													echo"</table></div></div>";
													
													//start contract files section
													$projID=$projects_01[projID];
													$sql_05="SELECT * FROM projectFiles WHERE projID='$projID' 
														AND fileCategory='contractF'";
													$result_05=mysqli_query($cxn,$sql_05);
													$numbe_05=mysqli_num_rows($result_05);
													
													if($numbe_05==""||$numbe_05=="0")
														{}
													else{//There are contract documents available
														echo"<!---Contract files-->
														<div class='PCIR_contractFiles'>
															<div class='subProj_head'>
																<p class='PCIR_header'>Contract and Invoices</p>
															</div>
															<div class='PCIR_pf'>
																<table class='PCR_in'>
																	<tr class='PCIR_pf_head'>
																		<td><p>File Name</p></td>
																		<td><p>File Type</p></td>
																		<td><p>File Size</p></td>
																		<td><p>Last Modified</p></td>
																		<td></td>
																	</tr>";
														for($i_05=0;$i_05<$numbe_05;$i_05++)
														{
															$files_05=mysqli_fetch_assoc($result_05);
															$file_use5=$files_05[filePath];//file the path of the file															
															$file_ex5=end(explode(".",$file_use5));//file extention
															
															echo"
															<tr class='PCIR_pf_lines'>
																<td><p>$files_05[fileName]</p></td>
																<td><p>$file_ex5</p></td>
																<td><p>$files_05[fileSize]</p>
																</td><td><p>$files_05[fileTime]</p></td>
																<td><a target='_blank'href='downloadFile.php?pfID=$files_05[pfID]' class='file_view'><em>view</em></a>
															</td></tr>";															
														}
														echo"</table></div></div>";
														//Contract files END														
													}
													
													//////////////////////////////////////////////////////
													//Uploading files forms
													//MAIN functional part of the client page
													switch($clFunc){
														case"upfile":
															include("fileUpload.inc");
														break;														
														default:
															echo"<style type='text/css'>
															.PCIR_uf {display:none;}
														</style>";
														break;
													}
													if($projects_01[clUpload]=="Yes")
													{//upload-files is enable for this client
														echo"
														<!---uploading files-->
														<div class='PCIR_uploadFiles'>
															<div class='subProj_head_v2'>																	
																<p class='PCIR_header'>Upload a file to use in this project</p>
																<a id='PCIR_h_upd' class='pgsub_updw'><em>down</em></a>
																<a id='PCIR_h_up' class='pgsub_updw'><em>up</em></a>
															</div>";
															
															if(isset($upf_msg)){//express mesages for upload form
																	echo"<p class='upfile_msg'>$upf_msg</p>";}
															if(isset($upf_Ermsg)){//express mesages for upload form
																	echo"<p class='upfile_er_msg'>$upf_Ermsg</p>";}
																	
															echo"<div class='PCIR_uf'>
																<form enctype='multipart/form-data' action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
																	<table><tr id='uptb_00'>
																	<td id='uptb_01'>Add a description to the File<br/> (Optional):  </td>
																	<td><input maxlength='150'type='text' id='flDesc' name='flDesc'/></td>
																	</tr>
																	<tr><td colspan='2'>
																		<input type='hidden' name='projID' value='$projID'/>
																		Choose a file: <input type='file' name='vImage'/>																	
																		<button name='clFunc' value='upfile' type='submit'>Upload File</button></td>
																	</tr>
																	</table>
																
																</form>
															</div>
														</div>															
														";
														
														//SWITCH from lines of client uploaded files
														switch($clSSFunc)
														{
															case"ufSave"://Save updated file desctiption
																$uflDesc=addslashes($flDesc);
																$sql_v4="UPDATE clientUploads SET fileDesc='$uflDesc' WHERE upFileID='$upFileID'";
																$result_v4=mysqli_query($cxn,$sql_v4);
																if($result_v4==false){
																	$clfStatus="Could not update file description at this time";}
																else{
																	$clfStatus="Successfully updated file description";}
															break;
															case"ufDel":
																
																//links for both original image file and thumb file
																$sql_v5b="SELECT clCode, fileAName FROM clientUploads WHERE upFileID='$upFileID'";
																$result_v5b=mysqli_query($cxn,$sql_v5b);
																$row_v5b=mysqli_fetch_row($result_v5b);
																$OriginalFile="$row_v5b[0]/clientFiles/$row_v5b[1]";
																$ThumbFile="$row_v5b[0]/clientFiles/thumbs/$row_v5b[1]";
																																
																$sql_v5="DELETE FROM clientUploads WHERE upFileID='$upFileID'";
																$result_v5=mysqli_query($cxn,$sql_v5);
																
																$ext = strrchr($OriginalFile,'.');
																$ext = strtolower($ext);
																if(!$ext==".doc"){
																	if($result_v5==true && unlink($OriginalFile)==true && unlink($ThumbFile)==true){
																		$cfDStatus="<tr class='PCIR_pf_edln'><td colspan='5'>
																					File Successfully Deleted!</td></tr>";
																		}
																	else{$cfDStatus="<tr class='PCIR_pf_edln'><td colspan='5'>
																					Could not delete the file due to an error</td></tr>";}
																}
															break;
															default:
															break;
														
														}
														//SHOW files client has uploaded
														$sql_v1="SELECT * FROM clientUploads WHERE projID='$projects_01[projID]'";
														$result_v1=mysqli_query($cxn,$sql_v1);
														if(@mysqli_num_rows($result_v1)!=0)
														{//there are files uploaded by client
															echo"
															<!---Client uploaded files-->
															<div class='PCIR_uploadedFiles'>
																<div class='subProj_head'>
																	<p class='PCIR_header'>Files you have uploaded to use in this project</p>
																</div>
																<div class='PCIR_pf'>
																	<table class='PCR_in'>
																		<tr class='PCIR_pf_head'>
																			<td id='upFileName'><p>Preview</p></td>
																			<td><p>File Name & Description</p></td>
																			<td id='clflsize'><p>File Size</p></td>
																			<td><p>Uploaded time</p></td>
																			<td id='clupfiles'></td>
																		</tr>";
																	for($v1=0;$v1<mysqli_num_rows($result_v1);$v1++)
																	{
																		$row_v1=mysqli_fetch_row($result_v1);	
																		
																		
																		echo"
																		<!--Lines-->
																		<tr class='PCIR_pf_lines'>
																			<td><img src='$row_v1[4]/clientFiles/thumbs/$row_v1[8]'/></td>
																			<td>
																				<p class='fNM'>$row_v1[2]</p>
																				<p>$row_v1[3]</p>
																			</td>
																			<td><p>$row_v1[5]</p>
																			</td>
																			<td><p>$row_v1[6]</p>
																			</td>
																			<td >
																				<a href='clients.php?clSFunc=ufEdit$row_v1[0]&upFileID=$row_v1[0]' 
																					title='Edit File description'class='cfile_edit voxtip clfiles'><em>edit</em></a>
																				<a href='clients.php?clSFunc=ufPDel$row_v1[0]&upFileID=$row_v1[0]'
																					title='Delete File'class='cfile_delete voxtip clfiles'><em>delete</em></a>
																			</td>
																		</tr>";
																	//SWITCH for each line
																	switch($clSFunc){
																		//Update description
																		case"ufEdit$row_v1[0]":
																			$sql_v3="SELECT fileDesc FROM clientUploads WHERE upFileID='$upFileID'";
																			$result_v3=mysqli_query($cxn,$sql_v3);
																			$row_v3=mysqli_fetch_row($result_v3);
																			$flDesc=$row_v3[0];
																			
																			echo"<tr class='PCIR_pf_edln'><form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
																			<td colspan='5'>File Description:  <input type='text' id='flDesc_U'name='flDesc'value='$flDesc'/>
																			<input type='hidden' name='upFileID' value='$upFileID'/>
																			<input type='hidden' name='clSSFunc' value='ufSave'/>
																			<button type='submit' name='clSFunc' value='ufSave$row_v1[0]'>Save</button>
																			<button type='cancel' name='clSFunc' value=''>Cancel</button></td></form></tr>";
																			
																		break;
																		case"ufSave$row_v1[0]":																			
																			echo"<tr class='PCIR_pf_edln'><td colspan='5'>
																				$clfStatus</td></tr>";																			
																		break;
																		
																		//Predeletion																		
																		case"ufPDel$row_v1[0]":
																			echo"<tr class='PCIR_pf_edln'><form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
																			<td colspan='5'>Are you sure you want to delete this file? 
																			<input type='hidden' name='upFileID' value='$upFileID'/>
																			<input type='hidden' name='clSFunc' value='ufDel$row_v1[0]'/>
																			<button type='submit' name='clSSFunc' value='ufDel'>Yes</button>
																			<button type='cancel' name='clSSFunc' value=''>No</button></td></form></tr>";
																		break;
																		case"ufDel$row_v1[0]":
																			echo$cfDStatus;
																		break;
																		default:																			
																		break;
																	}
																		
																	}
																	echo"</table>
																</div>
															</div>
															";
														
														}			
													}
						
						//after the end of right side box content
						echo"</div></td></tr></tbody></table></div>";
						}
					}
				}		
			?>					
			</div>
		</div>
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