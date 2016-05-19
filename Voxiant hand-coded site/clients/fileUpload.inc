<?php

	
	$sql_u1="SELECT clientCode FROM Clients_tb WHERE loginName='$clientNM'";
	$result_u1=mysqli_query($cxn,$sql_u1);
	if($result_u1==false){
		$upf_Ermsg="Could not connect to Database";
	}else{
		$clcode_u1=mysqli_fetch_row($result_u1);
		$cCode=$clcode_u1[0];
	}
	
	
	$path_thumbs = "$cCode/clientFiles/thumbs/";
	$img_thumb_width = 35; // 

	$extlimit = "yes"; //Limit allowed extensions? (no for all extensions allowed)

		//List of allowed extensions 
		$limitedext = array(".gif",".jpg",".png",".jpeg",".bmp",".doc");		

		//the image -> variables
		$file_type = $_FILES['vImage']['type'];
		$file_name = $_FILES['vImage']['name'];
		$file_size = $_FILES['vImage']['size'];
		$file_tmp = $_FILES['vImage']['tmp_name'];
		
		//check the file's extension
		$ext = strrchr($file_name,'.');
		$ext = strtolower($ext);

//check if you have selected a file.

if(!is_uploaded_file($file_tmp)){
$upf_Ermsg="Error: Please select a file then upload!";

}else{
	$sql_u8="SELECT fileName FROM clientUploads WHERE projID='$projID'";
	$result_u8=mysqli_query($cxn,$sql_u8);
	$row_u8=mysqli_fetch_row($result_u8);
	
	if($file_name==$row_u8[0]){//there exist a file with that name under this project on the database
		$upf_Ermsg="You have already uploaded this file!";
	}else{

		if(!in_array($ext,$limitedext)){
			$upf_Ermsg="Wrong file format! (Only .gif, .jpg, .png, .jpeg, .bmp files are allowed)";
		}else{
		
			
		//correct format files
		
		//get file extension
		$getExt = explode ('.', $file_name);
		$file_ext = $getExt[count($getExt)-1];
		
		//Generate random name for the file
		$rand_name=rand(000001,999999);
		$sql_u2="SELECT upfileID FROM clientUploads WHERE projID='$projID'";
		$result_u2=mysqli_query($cxn,$sql_u2);
		if(@mysqli_num_rows($result_u2)!=0){
			$rw_u2=mysqli_fetch_row($result_u2);	
			while(in_array($rand_name,$rw_u2))
			{
				$rand_name=rand(000001,999999);
			}	
		}
		
			if(!$ext==".doc")
		{
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
		ImageJpeg ($resized_img,"$path_thumbs/$rand_name.$file_ext");
		ImageDestroy ($resized_img);
		ImageDestroy ($new_img);

		function createThumb()
		{						
		  $thumbSize = 35; // will create a 35 x 35 thumb
		  $this->thumb = imagecreatetruecolor($thumbSize, $thumbSize); 
		  imagecopyresampled($this->thumb, $this->myImage, 0, 0,$this->x, $this->y, $thumbSize, $thumbSize, $this->cropWidth, $this->cropHeight); 
		}  
		
		}
		//Move the uploaded files to main folder
		$path_big="$cCode/clientFiles";
		move_uploaded_file ($file_tmp, "$path_big/$rand_name.$file_ext");
		
		
			
		//write the file info to the database
		$fileSize=round(($file_size/1048576),2);
		$fileSize=$fileSize."mb";
		$uflName=$file_name;
		$uflTime=date('M j, Y: g:ia');
		$uflDesc=addslashes($flDesc);
		$uflDType=$file_type;
		$clCode=$cCode;
		$fileAName=$rand_name.".".$file_ext;
		
		$sql_u3="INSERT INTO clientUploads
			VALUES ('$rand_name','$projID','$uflName','$uflDesc',
			'$clCode','$fileSize','$uflTime','$uflDType','$fileAName')";
		$result_u3=mysqli_query($cxn, $sql_u3);
		if($result_u3==false){
			$upf_msg="Could not add new file info to database";
		}else{
			$upf_msg="Successfully uploaded the file";
			echo"<style type='text/css'>
					.PCIR_uf {display:none;}
				</style>";
		}
		
	}
	}
}



?>