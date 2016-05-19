<?php
switch($FLst)
{
//delete iteration set file
case"pDITF":
	echo"Are you sure you want to delete this iteration File? 
		<a href='admin.php?FLst=dITF&iterID=$iterID&Cac=showFiles&
		projID=$projID&loginName=$loginName'>
		Yes</a> 
		<a href='admin.php?Cac=showFiles&projID=$projID&loginName=$loginName'>
		No</a>
	";
break;

case"dITF":

//ITERATION SET FILE				
	$sql_54="SELECT iterFPath, iterTFPath FROM iterationItem WHERE iterID='$iterID'";
	$result_54=mysqli_query($cxn,$sql_54);
	$rw_54=mysqli_fetch_row($result_54);
	$iterFileP="../clients/$rw_54[0]";				
	
	$iter_thumbP="../clients/$rw_54[1]";
	
	//DELETE iterationItem entry
	$sql_delFE2="DELETE FROM iterationItem WHERE iterID='$iterID'";
	$result_delFE2=mysqli_query($cxn,$sql_delFE2);
	
	//Delete feeds for this file
	$sql_55="DELETE FROM voxFeeds WHERE parentID='$iterID'";
	$result_55=mysqli_query($cxn,$sql_55);
	
	if(unlink($iter_thumbP)==true ){
		echo"Successfully deleted the thumb file!";}
	else{					
	echo"Could not delete file";
	}
	if(result_delFE2==true &&  
		unlink($iterFileP)==true){
		echo"Successfully deleted the iteration file!";}
	else{
	
	echo"Could not delete file";
	}

break;

//UPDATE Iteration SET Holder
case"editITSET":	
	$sql_it1="SELECT pfID, fileName FROM projectFiles WHERE pfID='$pfID'";
	$result_it1=mysqli_query($cxn,$sql_it1);
	
	echo"<p><b>Edit iteration SET name</b></p>
	<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
	<table id='tb76' width='500px'><tr>";
			$it1=mysqli_fetch_row($result_it1);							
			
			echo"							
			<td>Iteration SET ID: </td>
			<td>$it1[0]</td>
			</tr><tr>
				<td>Allow feedbacks:</td>
				<td><input id='rt_83a' type='radio' name='ITSfeed' value='Yes'/>Yes
					<input id='rt_83a' type='radio' name='ITSfeed' value='No'/>No</td>
			</tr><tr>
			</tr></table>
			<input type='hidden' name='loginName' value='$loginName'/>
			<input type='hidden' name='projName'value='$projName'/>
			<input type='hidden' name='projID' value='$projID'/>
			<input type='hidden' name='pfID' value='$pfID'/>
			<input type='hidden' name='Cac' value='showFiles'/>
			<button type='submit' name='FLst' value='saveEditITSET'>Save i.SET information</button>
			<button type='cancel' name'Cac' value='showFiles'>Cancel</button>";
		
break;

//SAVE EDITTED Iteration SET Holder
case"saveEditITSET":
	if($ITSfeed=="Yes"){
		$sql67="SELECT feedID FROM voxFeeds WHERE parentID='$pfID'";
		$result67=mysqli_query($cxn,$sql67);
		if(@mysqli_num_rows($result67)==0){
			$rmn8=rand(100000,999999);
			$sql_ad2="INSERT INTO voxFeeds VALUES(
				'$rmn8','$pfID','$loginName','',
				'','','','',
				'','','','')";
			$result_ad2=mysqli_query($cxn,$sql_ad2);		
		}
		if($result_ad2==false){echo"Could not update Iteration Set";}
		else{echo"Successfully updated Iteration Set";}
	
	}
	if($ITSfeed=="No"){
		$sql67="SELECT feedID FROM voxFeeds WHERE parentID='$pfID'";
		$result67=mysqli_query($cxn,$sql67);
		if(@mysqli_num_rows($result67)!=0){			
			$sql_ad2="DELETE FROM voxFeeds WHERE pfID='$pfID'";
			$result_ad2=mysqli_query($cxn,$sql_ad2);		
		}
		if($result_ad2==false){echo"Could not update Iteration Set";}
		else{echo"Successfully updated Iteration Set";}
	}
		
break;
	
//ADD Iteration SET Holder
case"addITSET":
	$isCat="projectF";//fileCategory
	$isTime=date('M j, Y: g:ia');
	$sql_it1="INSERT INTO projectFiles 
		VALUES('$isID','$projID','n/a','$isName',
			'$isCat','n/a','$isTime','SET','iterationSET')";
	$result_it1=mysqli_query($cxn,$sql_it1);
	if($result_it1==false){echo"Could not Create Iteration Set";}
	else{echo"Successfully created Iteration Set";}
	
	if($feedISet=="Yes"){
		$rmn8=rand(100000,999999);
		$sql_ad2="INSERT INTO voxFeeds VALUES(
			'$rmn8','$isID','$loginName','',
			'','','','',
			'','','','')";
		$result_ad2=mysqli_query($cxn,$sql_ad2);
	}
		
break;

//Upload a file
case"uploadFile":
	//to get the client code for folder
		$sql_upfl=
		"SELECT clientCode FROM Clients_tb WHERE loginName='$loginName'";				
		$result_upfl=mysqli_query($cxn,$sql_upfl);
		$upfl_cd=mysqli_fetch_row($result_upfl);
		$clcode=$upfl_cd['0'];
	
	if($flCateg=="projectF")
	{
		$target_path="../clients/".$clcode."/projectFiles/";			
	}else{
		$target_path="../clients/".$clcode."/files/";			
	}
	
	//Get file information from the FILES array
	$file_type = $_FILES['uploadedfile']['type'];
	$file_name = $_FILES['uploadedfile']['name'];
	$file_size = $_FILES['uploadedfile']['size'];
	$file_tmp = $_FILES['uploadedfile']['tmp_name'];

	
	if($scat=="iterationSET")
	{
		$img_thumb_width = 140;
		//the new width variable
		$ThumbWidth = $img_thumb_width;
		
		//keep image type
		if($file_size){
			if($file_type == "image/pjpeg" || $file_type == "image/jpeg"){
			$new_img = imagecreatefromjpeg($file_tmp);
			}elseif($file_type == "image/x-png" || $file_type == "image/png"){
			$new_img = imagecreatefrompng($file_tmp);
			}elseif($file_type == "image/gif"){
			$new_img = imagecreatefromgif($file_tmp);
			}
		}
		//list the width and height and keep the height ratio.
		list($width, $height) = getimagesize($file_tmp);
		//calculate the image ratio
		$imgratio=$width/$height;
		
		//File name w/o extension
		$path_parts=pathinfo($file_name);
		$file_Bname=$path_parts['filename'];
		$file_Bname=$file_Bname."_thumb";
		
		//get file extension
		$getExt = explode ('.', $file_name);
		$file_ext = $getExt[count($getExt)-1];
		
		if ($imgratio>1){
			$newwidth = $ThumbWidth;
			$newheight = $ThumbWidth/$imgratio;
			}else{
			$newheight = $ThumbWidth;
			$newwidth = $ThumbWidth*$imgratio;
		}

		//function for resize image.
		if (function_exists(imagecreatetruecolor)){
		$resized_img = imagecreatetruecolor($newwidth,$newheight);
		}else{
		die("Error: Please make sure you have GD library ver 2+");
		}
		
		//the resizing is going on here!
		imagecopyresized($resized_img, $new_img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		//finally, save the image
		ImageJpeg ($resized_img,"$target_path/$file_Bname.$file_ext");
		ImageDestroy ($resized_img);
		ImageDestroy ($new_img);

		function createThumb()
		{						
		  $thumbSize = 140; // will create a 35 x 35 thumb
		  $this->thumb = imagecreatetruecolor($thumbSize, $thumbSize); 
		  imagecopyresampled($this->thumb, $this->myImage, 0, 0,$this->x, $this->y, 
		  $thumbSize, $thumbSize, $this->cropWidth, $this->cropHeight); 
		} 
			
		//Move the uploaded files to main folder
		$target_path=$target_path.basename($file_name);	
		if(move_uploaded_file($file_tmp, $target_path))
			{
				echo "The file ".basename($file_name).
				" has been uploaded.<br/>";								
			}else {echo"Could not upload the file due to some error";}
	}else{
	
	$target_path=$target_path.basename($file_name);	
	if(move_uploaded_file($file_tmp, $target_path))
		{
			echo "The file ".basename($file_name).
			" has been uploaded.<br/>";								
		}else {echo"Could not upload the file due to some error";}
	
	}
	//adding other file information to variables for adding to DB
	$flSizeRow=$file_size;
	//file size in MBs
		$flSize=round(($flSizeRow/1048576),2);
		$flSize=$flSize."mb";
	$flTime=date('M j, Y: g:ia');
	//type of the file
		$flType=$file_type;
	
	
	if($flCateg=="projectF")
	{
		$savePath=$clcode."/projectFiles/";//creating a path to save
		$savePath=$savePath.basename($file_name);
	}else{
		$savePath=$clcode."/files/";//creating a path to save
		$savePath=$savePath.basename($file_name);
	}	
	//Iteration SET files
	if($scat=="iterationSET"){				
		
		$iterTFPath="$clcode/projectFiles/$file_Bname.$file_ext";
		$sql_addit="INSERT INTO iterationItem VALUES(
		'$flID','$pfID','$savePath','$flName','$itDesc','$flSize','$flTime','$iterTFPath')";
		$result_addit=mysqli_query($cxn,$sql_addit);
		
		$rmn8=rand(100000,999999);
		$sql_ad2="INSERT INTO voxFeeds VALUES(
			'$rmn8','$flID','$loginName','','$ratingC1','$ratingC2','$ratingC3','$ratingC4',
			'','','','')";
		$result_ad2=mysqli_query($cxn,$sql_ad2);
		
		if($result_addit==false||$result_ad2==false)
			{echo"Could not add new file to database!";}
		else{
			echo"Successfully added the new file to database";
		}
	}
	//ViewNow uploaded files
	if($scat=="viewNow"){
		$sql_addit="INSERT INTO projectFiles VALUES(
		'$flID','$projID','$savePath','$flName','$flCateg',
		'$flSize','$flTime','$flType','$scat')";
		$result_addit=mysqli_query($cxn,$sql_addit);
		
		$rmn8=rand(100000,999999);
		$sql_ad2="INSERT INTO voxFeeds VALUES(
			'$rmn8','$flID','$loginName','','$VratingC1',
			'$VratingC2','$VratingC3','$VratingC4',
			'','','','')";
		$result_ad2=mysqli_query($cxn,$sql_ad2);
		
		if($result_addit==false||$result_ad2==false)
			{echo"Could not add new file to database!";}
		else{
			echo"Successfully added the new file to database";
		}
	}
	if($scat=="downLNow"){
	//Add file information to the database
	$sql_addfl="INSERT INTO projectFiles
		VALUES('$flID','$projID','$savePath','$flName','$flCateg',
		'$flSize','$flTime','$flType','$scat')";
		$result_addfl=mysqli_query($cxn,$sql_addfl);
		if($result_addfl==false)
			{echo"Could not add new file to database!";}
		else{
			echo"Successfully added the new file to database";
		}
	}
break;
		
		case"uploadFileWO":
			//to get the client code for folder
				$sql_upfl="SELECT Clients_tb.clientCode
					FROM Clients_tb
					INNER JOIN clientProjects
					ON clientProjects.loginName=Clients_tb.loginName
					WHERE clientProjects.projectName='$projName'";
				$result_upfl=mysqli_query($cxn,$sql_upfl);
				$upfl_cd=mysqli_fetch_row($result_upfl);
				$clcode=$upfl_cd[0];	
			//adding other file information to variables for adding to DB						
			$flTime=date('M j, Y: g:ia');				
			$flSize.="mb";
			if($flCateg=="projectF")
			{
				$savePath=$clcode."/projectFiles/";//creating a path to save							
			}else{
				$savePath=$clcode."/files/";//creating a path to save							
			}	
			$savePath=$savePath.$flPathX;
			//Add file information to the database
			$sql_addfl="INSERT INTO projectFiles
				VALUES('$flID','$projID','$savePath','$flName','$flCateg','$flSize','$flTime','$flType')";
				$result_addfl=mysqli_query($cxn,$sql_addfl);
				if($result_addfl==false)
					{echo"Could not add new file to database!";}
				else{
					echo"Successfully added the new file to database w/o actually uploading";
				}
		break;
		case"editFile":
			echo"
			<p><b>Update the File information</b></p>
			<form action="; echo $_SERVER[PHP_SELF]; echo" method='POST'>
			<table id='tb76' width='500px'><tr>";							
					$sql_fjd="SELECT * FROM projectFiles WHERE pfID='$flID'";
					$result_fjd=mysqli_query($cxn,$sql_fjd);
					if($result_fjd==false)
					{echo"Could not connect to the database";}
					else{
					
					$fjd=mysqli_fetch_row($result_fjd);							
					
					echo"							
					<td>Unique File ID: </td>
					<td>$fjd[0]</td>
					</tr><tr>
						<td>File Title:</td>
						<td><input type='text' name='flName' value='$fjd[3]'/></td>
					</tr><tr>
						<td>File Path:</td>
						<td><input type='text' name='flPath' value='$fjd[2]'/></td>
					</tr><tr>
						<td>Feedback/Rating:</td>";
						$sql89="SELECT * FROM voxFeeds WHERE parentID='$flID'";
						$result89=mysqli_query($cxn,$sql89);
						if(@mysqli_num_rows($result89)){$check89="checked";}
						
						echo"<td>
							<input id='rt_83a' type='radio' onclick='Rat65()'  name='Arate' value='Yes' $check89>Yes
							<input id='rt_83' type='radio'  name='Arate' value='No'>No
						</td>
					</tr>";
						if($check89=="checked"){
							$rw89=mysqli_fetch_row($result89);
							echo"<tr><td>Edit Rating Criteria:</td>
								<td>";
								for($re=4;$re<=7;$re++){
									$re2=$re-3;
									echo"#$re2 <input type='text' name='rateC$re2' value='$rw89[$re]'/><br/>";
								}
								echo"</td>
							</tr>";
						}else{
							echo"<script type = 'text/javascript'>
							function Rat65(){
								if(document.getElementById('rt_83a').checked){
									document.getElementById('rt5_a').style.display='';
								}else{
									document.getElementById('rt5_a').style.display='none';
								}
							}
							</script>";
							echo"<tr id='rt5_a' style='display:none;'><td>Enter Rating Criteria:</td>
								<td>";
									for($re=1;$re<=4;$re++){																		
									echo"#$re <input type='text' name='rateC$re' /><br/>";
									}
								
								echo"</td>
							</tr>";
						
						}
					
					echo"<input type='hidden' name='flID' value='$fjd[0]'/>
					<input type='hidden' name='Rcat' value='$check89'/>
					";
					}
			echo"</table>";
			
			if($Cac=="shAF"){
				 echo"
				<input type='hidden' name='Cac' value='shAF'/>
				<button type='submit' name='FLst' value='saveEditFile'>Save File information</button>
				<button type='cancel' name'Cac' value='shAF'>Cancel</button>";
			}else{
			echo"<input type='hidden' name='loginName' value='$loginName'/>
			<input type='hidden' name='projName'value='$projName'/>
			<input type='hidden' name='projID' value='$projID'/>
			
			<input type='hidden' name='Cac' value='showFiles'/>
			<button type='submit' name='FLst' value='saveEditFile'>Save File information</button>
			<button type='cancel' name'Cac' value='showFiles'>Cancel</button>";
			}
			
			echo"</form>";
		break;
case"saveEditFile":

	if($Rcat=="checked"){//voxFeeds already have a record
		if($Arate=="No"){
		$sql_82="DELETE FROM voxFeeds WHERE parentID='$flID'";
		$result_82=mysqli_query($cxn,$sql_82);
		}
		
		$sql82a="UPDATE voxFeeds SET 
			ratinC1='$rateC1',ratinC2='$rateC2',ratinC3='$rateC3',ratinC4='$rateC4'
			WHERE parentID='$flID'";
		$result82a=mysqli_query($cxn,$sql82a);
	}else{
		if($Arate=="Yes"){
		$rmn8=rand(100000,999999);
		$sql_ad2="INSERT INTO voxFeeds VALUES(
			'$rmn8','$flID','$loginName','',
			'$rateC1','$rateC2','$rateC3','$rateC4',
			'','','','')";
		$result_ad2=mysqli_query($cxn,$sql_ad2);	
		}
	}
	//SAVE updates of a FILES
	$sql_saveF="UPDATE projectFiles SET fileName='$flName',
	filePath='$flPath' WHERE pfID='$flID'";
	$result_saveF=mysqli_query($cxn,$sql_saveF);
	if($result_saveF==false){echo"Could not save the updated info";}
	else{
		echo"New File information updated sucessfully to system";
	}									
break;

/////////////////////////////////////////////////////////////////////////
///////DELETE project files (viewNow, Download now, contract files)
// PREDELETE FILE
	case"preDelFE":
		$sql_preD="SELECT * FROM projectFiles WHERE pfID='$flID'";
		$result_preD=mysqli_query($cxn,$sql_preD);
		$preD=mysqli_fetch_row($result_preD);
		
		echo"Are you sure you want to delete the file \"$preD[2]\"?";
		if($Cac=="shAF")
		{//we are located at show all files{
			echo"<a href='admin.php?Cac=shAF&flID=$flID&FLst=delFE'>
			Yes</a> 
			<a href='admin.php?Cac=shAF'>
			No</a><p>";
		}else{//we are located in a project page
			echo"<a href='admin.php?Cac=showFiles&FLst=delFE&loginName=$loginName&
			flID=$flID&projID=$preD[1]'>
			Yes</a> 
			<a href='admin.php?Cac=showFiles&projID=$preD[1]&loginName=$loginName
			'>No</a><p>";
		}
			
		
	break;
	//ACTUAL DELETE- FILE				
		case"delFE":
		
			//check to see the sub category of the project file
			$sql_d02="SELECT fileSubCat FROM projectFiles WHERE pfID='$flID'";
			$result_d02=mysqli_query($cxn,$sql_d02);
			$rw_d02=mysqli_fetch_row($result_d02);
			
			switch($rw_d02[0]){
				case"viewNow":
					$sql_d03="SELECT feedID FROM voxFeeds WHERE parentID='$flID'";
					$result_d03=mysqli_query($cxn,$result_d03);
					if(@mysqli_num_rows($result_d03)!=0){
						$sql_d04="DELETE FROM voxFeeds WHERE parentID='$flID'";
						$result_d04=mysqli_query($cxn,$sql_d04);
						if($result_d04==false){echo"Could not delete feedback entries";}
					}
					$sql_de2="SELECT filePath FROM projectFiles WHERE pfID='$flID'";
					$result_de2=mysqli_query($cxn,$sql_de2);
					$row_de2=mysqli_fetch_row($result_de2);
					$File2Del="../clients/$row_de2[0]";
					
					
					$sql_delFE="DELETE FROM projectFiles WHERE pfID='$flID'";
					$result_delFE=mysqli_query($cxn,$sql_delFE);
					if(result_delFE==true && unlink($File2Del)==true){
						echo"Successfully deleted the file (viewNow)!";}
					else{
					
					echo"Could not delete file";
					}
				break;
				
				default:
					$sql_de2="SELECT filePath FROM projectFiles WHERE pfID='$flID'";
					$result_de2=mysqli_query($cxn,$sql_de2);
					$row_de2=mysqli_fetch_row($result_de2);
					$File2Del="../clients/$row_de2[0]";
					
					
					$sql_delFE="DELETE FROM projectFiles WHERE pfID='$flID'";
					$result_delFE=mysqli_query($cxn,$sql_delFE);
					if(result_delFE==true && unlink($File2Del)==true){
						echo"Successfully deleted the file!";}
					else{
					
					echo"Could not delete file";
					}
				break;
			}
		break;

	}
?>