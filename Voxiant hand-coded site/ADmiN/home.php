<?php
include("/mnt/w0610/d23/s07/b030e947/cgi-bin/voxyBacon.inc");
$cxn =mysqli_connect($host, $user, $password, $database)
or die ("Could not connect to database");

//create an array for project statuses 12 values  $projSTS[1][0]
//MULTI-DIMENSIONAL Array motherfuckers!!!
$projSTS= array(
	array('Pre approval process', '#37b82d'),
	array('Need to work on', '#ff1e00'),
	array('Working on Logo Design', '#ef6f43'),
	array('Working on Biz Card', '#ea6132'),
	array('Creating Website Design', '#e3521f'),
	array('Making the HTML/CSS', '#d14210'),
	array('Wordpressing the site', '#c23808'),
	array('Currently working', '#ff4800'),
	array('Waiting on client', '#ffb400'),
	array('On hold', '#17a88e'),
	array('Waiting for Payment', '#93dd3b'),
	array('Completed', '#2ab5dd')	
);
//also in line 111

include('home_switch.php');//include switch statements

 
 ?>
<html>
<head>
	<link type='text/css' rel='stylesheet' href='home.css'>
	<script src="../js/jquery.js" type='text/javascript'></script>
	<script src='admin_java.js'type='text/javascript' ></script>
	<script type="text/javascript" src="../js/voxtip.js"></script>
	<script type='text/javascript'>
		$(document).ready(function() {
			adminShowHide();
			
			//Tool tips
			$('.voxtip').tipsy({gravity: 's'});
			$('.voxtipw').tipsy({gravity: 'w'});
			$('.voxtipe').tipsy({gravity: 'e'});
			$('.voxtipn').tipsy({gravity: 'n'});
		});
	</script>
</head>
<body>
<table id='tb_1'>
<tr>
	<td id='left' width='5px'>	
	</td>
	<td id='right_1'>
		<table id='tb_2'>
			
			<tr><td id='tophead'>
				<p class='bold_txt'><a href='admin.php'>HOME</a> | <a href='home.php'>REFRESH</a> | PROJECTS:</p>
				<p class='txt'>All</p>	
				<button id='projAD'>Add</button>
				<button id='projDE'>Delete</button>
				<!-- show status-->
				<?php if(isset($queryST)){echo $queryST;} ?>
			</td></tr>
			<tr id='deleteP'><td>
				<form action='home.php' method='POST'>
					<table id='addprojTB'>
						<tr><td>Project:</td>
						<td><select name='projID'>
							<?php
								$sql_hy="SELECT projID, projCode FROM projDash";
								$result_hy=mysqli_query($cxn,$sql_hy);
								for($hy=0;$hy<mysqli_num_rows($result_hy);$hy++){
									$row_hy=mysqli_fetch_row($result_hy);
									echo"<option value='$row_hy[0]'>$row_hy[1]</option>";
								}
							?>
							</select>
						<br/>
							<button type='submit' name='projo' value='delProj'>Delete</button>
							<button  id='projDE'>Cancel</button></td>
					</tr></table>
				</form>
			</td></tr>			
			<!-- add new project-->					
			<tr id='new_proj'><td>
				<form action='home.php' method='POST'>
					<table id='addprojTB'>
						<tr><td>Project Code:</td>
						<td><input type='text' name='projCode'/></td>
						</tr><tr><td>Project Title:</td><td><input type='text' name='projTitle'/></td>
						</tr><tr><td>Project Start:</td><td><input type='text' name='projStart'/></td>
						</tr><tr><td>Project Due Date:</td><td><input type='text' name='projDue'/></td>
						</tr><tr><td>Project Full price:</td><td><input type='text' name='projPrice'/></td>
						</tr><tr><td>Project Paid:</td><td><input type='text' name='projPaid'/></td>
						</tr><tr><td>Client:</td><td><select name='clientName'>
						<?php
								// get client names
								$sql_t5="SELECT clientName FROM clientInfo";
								$result_t5=mysqli_query($cxn,$sql_t5) or die (mysqli_error());								
								for($t3=0;$t3<mysqli_num_rows($result_t5);$t3++)
								{
									$row_t5=mysqli_fetch_row($result_t5);
									echo"<option value='$row_t5[0]'>$row_t5[0]</option>";
								}
						echo"</select></td>
						</tr><tr><td>Project Status:</td>
							<td><select name='projStatus'>";
								 for($q=0;$q<count($projSTS);$q++){
									echo"<option value='".$projSTS[$q][0]."'>".$projSTS[$q][0]."</option>";
								}?>
							</select>							
							<br/>
							<button type='submit' name='projo' value='addProj'>Add new</button>
							<button  id='projAD'>Cancel</button>
				</td></tr></table></form>
				</td>
			</tr>
			
			<?php
			$sql_b1="SELECT projID, projStatus FROM projDash ORDER BY CASE projStatus 
				WHEN 'Need to work on' THEN 1
				WHEN 'Working on Logo Design'  THEN 2
				WHEN 'Working on Biz Card' THEN 2 
				WHEN 'Creating Website Design'  THEN 2
				WHEN 'Making the HTML/CSS'  THEN 2
				WHEN 'Wordpressing the site' THEN 2
				WHEN 'Currently working' THEN 3 
				WHEN 'Waiting on client' THEN 4 
				WHEN 'On hold' THEN 5
				WHEN 'Waiting for Payment' THEN 6
				WHEN 'Completed' THEN 7 
				ELSE 99
				END";
			$result_b1=mysqli_query($cxn,$sql_b1) or die (mysqli_error());
			
			if(@mysqli_num_rows($result_b1)==0){echo "No projects found!";
			}else{		
				for($b1=0;$b1<mysqli_num_rows($result_b1);$b1++)
				{					
					$row_b1=mysqli_fetch_row($result_b1);
					$projID=$row_b1[0];
					echo"<tr><td class='projLine'>
							 <!-- edit project-->
							 <div class='edProj_R$b1 edProj_R'>
								<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>";
								// get client names
								$sql_t3="SELECT clientName FROM clientInfo";
								$result_t3=mysqli_query($cxn,$sql_t3);								
								
								//get project information
								$sql_t4="SELECT * FROM projDash WHERE projID='$projID'";
								$result_t4=mysqli_query($cxn,$sql_t4);
								$row_p2=mysqli_fetch_row($result_t4);
								
								echo"<table id='addprojTB'>
									<tr><td>Project Code:</td>
									<td><input type='text' name='projCode' value='$row_p2[1]'/></td>
									</tr><tr><td>Project Title:</td><td><input type='text' name='projTitle' value='$row_p2[2]'/></td>
									</tr><tr><td>Project Start:</td><td><input type='text' name='projStart' value='$row_p2[4]'/></td>
									</tr><tr><td>Project Due Date:</td><td><input type='text' name='projDue' value='$row_p2[3]'/></td>
									</tr><tr><td>Project Full price:</td><td><input type='text' name='projPrice' value='$row_p2[6]'/></td>
									</tr><tr><td>Project Paid:</td><td><input type='text' name='projPaid' value='$row_p2[7]'/></td>
									</tr><tr><td>Client:</td>
										<td><select name='clientName'>";
											for($t3=0;$t3<mysqli_num_rows($result_t3);$t3++){
												$clientNM = mysqli_fetch_row($result_t3);
												echo"<option value='$clientNM[0]'"; 
												if($row_p2[8]==$clientNM[0]){echo"selected";} echo">$clientNM[0]</option>";
											}
											echo"</select>
										<br/>
										<input type='hidden' name='projID' value='$projID'/>
										<button type='submit' name='projo' value='edProj'>Save changes</button>
										<button  id='projAD'>Cancel</button>
										</td></tr></table></form>
							 </div>";
				echo"<!-- edit project status-->
				 <div class='edPst_R$b1 edPst_R'>
					<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
						<table><tr><td>Project Status:</td>
						<td><select name='projStatus'>";
							for($q=0;$q<count($projSTS);$q++){
								echo"<option value='".$projSTS[$q][0]."'"; 
									if($row_p2[5]==$projSTS[$q][0]){echo"selected";} echo">".$projSTS[$q][0]."</option>";
							}
							echo"</select>
							<input type='hidden' name='projID' value='$projID'/>
							<input type='hidden' name='projPaid' value='$row_p2[7]'/>
							<button type='submit' name='projo' value='edPst'>Save</button>
							<button  id=''>Cancel</button>
						</td></tr></table>						
					</form>
				 </div>";
				echo"<!-- edit paid-->
				 <div class='edPpay_R$b1 edPpay_R'>					
					<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
						<table><tr><td>Paid:</td>
						<td><input type='text' name='projPaid' value='$row_p2[7]'/>					
							<input type='hidden' name='projID' value='$projID'/>
							<button type='submit' name='projo' value='edProjPay'>Save</button>
							<button  id=''>Cancel</button>
						</td></tr></table>						
					</form>
				 </div>
				 <!-- edit full price-->
				 <div class='edPprice_R$b1 edPprice_R'>
					<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
						<table><tr><td>Project Price:</td>
						<td><input type='text' name='projPrice' value='$row_p2[6]'/>					
							<input type='hidden' name='projID' value='$projID'/>
							<button type='submit' name='projo' value='edPprice'>Save</button>
							<button  id=''>Cancel</button>
						</td></tr></table>						
					</form>
				 </div>";	
				
		// MAIN CONTENT section for a project				
				//all if statements
				if($row_p2[7]==""){$row_p2[7]='0.00';}//paid price
				if($row_p2[5]==""){$row_p2[5]='no status';}//paid price
				
				echo"<div class='line_1'>
					<p class='edProj$b1 edProj ptitle'>$row_p2[1] <span>$row_p2[8]</span></p>
					<p class='pt_2s'>$row_p2[4]</p><p class='pt_2s'>$row_p2[3]</p>
					<div class='titleR'>";											
						//color proj status based on its status ... cool
						echo"<a class='edPst$b1 box_status'";
						for($gt=0;$gt<count($projSTS);$gt++){
							if($row_p2[5]==$projSTS[$gt][0]){echo"style='background-color:".$projSTS[$gt][1]."'";}
						}					
						$rem=($row_p2[6])-($row_p2[7]);
						echo">$row_p2[5]</a>
						<a class='edPpay$b1 paidP'>$$row_p2[7]</a>
						<p class='edPprice$b1 fullP voxtip' title='Ramaining: $$rem'>$$row_p2[6]</p>
					</div>
				 </div> 
				 <div class='line_1'><p class='pt_2'>$row_p2[2]</p>
					<p class='pt_2r$b1 pt_2r'>TOG</p>
				 </div> 
				 <div class='projC$b1'>";
					 					
					 // TODO
					 $sql_d2="SELECT * FROM toDo WHERE projID='$projID'";
					 $result_d2=mysqli_query($cxn,$sql_d2);
					 if(@mysqli_num_rows($result_d2)!=0){					 
						for($d2=0;$d2<mysqli_num_rows($result_d2);$d2++){
						$row_d2=mysqli_fetch_row($result_d2);
						 echo"
						 <div class='line_2'>
						<p class='TD_ed$b1 pt_h1'>TO-DO</p>						
						<div class='TD_on'>	
							<p class='pt_tx'>$row_d2[2]</p>
							<div class='titleR'>";
								if($row_d2[3]=="Complete"){echo"<p class='ppalM'>$row_d2[3]</p>";}else
									{echo"<a href='home.php?seco=doneTD&todoID=$row_d2[0]' class='Done'></a>";}
								echo"<a href='home.php?seco=delTD&todoID=$row_d2[0]' class='Del'></a>
							</div>
						</div></div>";
					}}
					//NOTES
					$sql_d3="SELECT * FROM notes WHERE projID='$projID'";
					 $result_d3=mysqli_query($cxn,$sql_d3);
					 if(@mysqli_num_rows($result_d3)!=0){					 
						for($d3=0;$d3<mysqli_num_rows($result_d3);$d3++){
						$row_d3=mysqli_fetch_row($result_d3);
						 echo"<div class='line_2'><p class='edNote$b1 pt_h1'>NOTES</p>
						<p class='pt_tx'>$row_d3[2]</p><div class='titleR'>
							<a href='home.php?seco=delNote&noteID=$row_d3[0]' class='Del'></a></div>
					 </div>
					  <!-- Edit notes -->
					 <div class='edNote_R$b1'>
						<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
							<table><tr><td>Edit Note:</td>
							<td><input class='L'type='text' name='note' value='$row_d3[2]'/>					
								<input type='hidden' name='noteID' value='$row_d3[0]'/>
								<button type='submit' name='seco' value='edNote'>Edit note</button>
								<button  id=''>Cancel</button>
							</td></tr></table>						
						</form>
					 </div>";
					 }}
				echo"</div>
				 <div class='line_1'>
					<p class='pt_h1'>+</p><a class='adTD$b1 addbtn'>To-do</a>
					<a class='adNote$b1 addbtn'>Note</a>
				 </div>";
			// MAIN CONTENET ENDS
				echo"<!-- Add paypal link -->
				 				 
				 
				 <!-- Add to-do link -->
				 <div class='adTD_R$b1'>
					<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
						<table><tr><td>To do:</td>
						<td><input class='L'type='text' name='todo'/>					
							<input type='hidden' name='projID' value='$projID'/>
							<button type='submit' name='seco' value='adTD'>Add to-do</button>
							<button  id=''>Cancel</button>
						</td></tr></table>						
					</form>
				 </div>
				 <!-- Edit to do -->
				 <div class='TD_ed_R$b1'>					
					<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
						<table><tr>
						<td>Edit (To-do):</td><td><input class='L'type='text' name='todo' value='$row_d2[2]'/>					
							<input type='hidden' name='todoID' value='$row_d2[0]'/>
							<button type='submit' name='seco' value='edTD'>Save</button>
							<button  id=''>Cancel</button>
						</td></tr></table>	
					</form>			
				 </div>
				  <!-- Add notes -->
				 <div class='adNote_R$b1'>
					<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
						<table><tr><td>Note:</td>
						<td><input class='L'type='text' name='note'/>					
							<input type='hidden' name='projID' value='$projID'/>
							<button type='submit' name='seco' value='adNote'>Add note</button>
							<button  id=''>Cancel</button>
						</td></tr></table>						
					</form>
				 </div>
				 
				 ";
				
					if(($b1+1)%6==0){
						echo"
							</td></tr></table>
						</td><td class='right_1'>
							<table class='tb_2'><td>
						";
					}
				 
				}				
				
				
				echo"<script>";
				for($g1=0;$g1<mysqli_num_rows($result_b1);$g1++){				 
					echo"
					 $('.adTD$g1').click(function(){ $('.adTD_R$g1').toggle() });
					$('.adNote$g1').click(function(){ $('.adNote_R$g1').toggle() }); 
					
					$('.edPst$g1').click(function(){ $('.edPst_R$g1').toggle() });
					$('.edProj$g1').click(function(){ $('.edProj_R$g1').toggle() });
					$('.edPpay$g1').click(function(){ $('.edPpay_R$g1').toggle() });
					$('.edPprice$g1').click(function(){ $('.edPprice_R$g1').toggle() });
					$('.edNote$g1').click(function(){ $('.edNote_R$g1').toggle() });
					
					$('.pt_2r$g1').click(function(){ $('.projC$g1').toggle() });
					$('.TD_ed$g1').click(function(){ $('.TD_ed_R$g1').toggle() });
				 
					//hide top forms
					$('.edProj_R$g1').hide();$('.edPst_R$g1').hide();$('.edPpay_R$g1').hide();
					$('.edPprice_R$g1').hide();
					
					//hide all forms					
					$('.adTD_R$g1').hide();$('.adNote_R$g1').hide();
					//to do
					$('.TD_ed_R$g1').hide();$('.edNote_R$g1').hide();";
				}
				echo"</script>";			
				
			}
			?>
			
				
			</td>
			</tr>
		</table>
	
	</td>
	<td id='right_2'>
	
	</td>
</tr>

</table>

</body>