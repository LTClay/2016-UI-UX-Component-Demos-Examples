<?php
switch($projo){
//project related	
case('addProj'):
	$projID="proj".rand(1111,9999);
	
	$sql_p1="INSERT INTO projDash VALUES('$projID', '$projCode',
		'$projTitle', '$projDue', '$projStart', '$projStatus',
		'$projPrice', '$projPaid', '$clientName')";
	$result_p1=mysqli_query($cxn,$sql_p1);
	if($result_p1!=false){$queryST="Successfully created a project!";}
	else{$queryST='Could not create a project';}
break;
case('delProj'):
	
	//delete notes
	$sql_d2="SELECT noteID FROM notes WHERE projID='$projID'";
	$res_d2=mysqli_query($cxn,$sql_d2);
	if(@mysqli_num_rows($res_d2)!=0){
		$sql_d22="DELETE FROM notes WHERE projID='$projID'";
		$res_d22=mysqli_query($cxn,$sql_d22);
		if($res_d22!=false){$queryST.="<br/>Successfully deleted noted for project ".$projID;}
		else{$queryST.='<br/>Could not delete notes for project '. $projID;}
	}
	//delete todo
	$sql_d3="SELECT todoID FROM toDo WHERE projID='$projID'";
	$res_d3=mysqli_query($cxn,$sql_d3);
	if(@mysqli_num_rows($res_d3)!=0){
		$sql_d32="DELETE FROM toDo WHERE projID='$projID'";
		$res_d32=mysqli_query($cxn,$sql_d32);
		if($res_d32!=false){$queryST.="<br/>Successfully deleted todo for project ".$projID;}
		else{$queryST.='<br/>Could not delete todo for project '. $projID;}
	}
	//delete paypal link
	$sql_d4="SELECT ppLinkID FROM paypalLink WHERE projID='$projID'";
	$res_d4=mysqli_query($cxn,$sql_d4);
	if(@mysqli_num_rows($res_d4)!=0){
		$sql_d42="DELETE FROM paypalLink WHERE projID='$projID'";
		$res_d42=mysqli_query($cxn,$sql_d42);
		if($res_d42!=false){$queryST.="<br/>Successfully deleted paypal link for project ".$projID;}
		else{$queryST.='<br/>Could not delete paypal link for project '. $projID;}
	}
	
	$sql_d1="DELETE FROM projDash WHERE projID='$projID'";
	$res_d1=mysqli_query($cxn,$sql_d1);
	if($res_d1!=false){$queryST.="<br/>Successfully deleted project ".$projID;}
		else{$queryST.='<br/>Could not delete project '. $projID;}
	
break;
case('edProj'):
	$sql_p3="UPDATE projDash SET projCode='$projCode',
		projTitle='$projTitle', projDue='$projDue', projStart='$projStart',
		projPrice='$projPrice', projPaid='$projPaid', clientName='$clientName' WHERE projID='$projID'";
	$result_p3=mysqli_query($cxn,$sql_p3);
	if($result_p3!=false){$queryST="Successfully updated a project!";}
	else{$queryST='Could not save changes to project';}
break;
case('edPst'):
	$sql_ps1r="UPDATE projDash SET projStatus='$projStatus' WHERE projID='$projID'";
	$result_ps1r=mysqli_query($cxn,$sql_ps1r);	
	if($result_ps1r!=false){$queryST="Successfully updated a status!";}
	else{$queryST='Could not update status';}
case('edProjPay'):
	$sql_ps1d="UPDATE projDash SET projPaid='$projPaid' WHERE projID='$projID'";
	$result_ps1d=mysqli_query($cxn,$sql_ps1d);
	if($result_ps1d!=false){$queryST="Successfully updated proj paid price!";}
	else{$queryST='Could not update proj paid price';}
	
break;
case('edPprice'):
	$sql_ps1="UPDATE projDash SET projPrice='$projPrice' WHERE projID='$projID'";
	$result_ps1=mysqli_query($cxn,$sql_ps1);
	if($result_ps1!=false){$queryST="Successfully updated proj price!";}
	else{$queryST='Could not update proj price';}
	
break;
}

////////////////////////////////////////////////////////////////////// 
 switch($seco){

	//TO DO
	case('adTD'):
		$todoID="todo".rand(1111,9999);
		$sql_pp3="INSERT INTO toDo VALUES('$todoID', '$projID', '$todo', '')";
		$result_pp3=mysqli_query($cxn,$sql_pp3) or die(mysqli_error());
		if($result_pp3!=false){$queryST="Successfully added To-DO!";}
		else{$queryST='Could not add to do';}
			
	break;
		case('edTD'):
			$sql_pp2="UPDATE toDo SET todo='$todo' 
				WHERE todoID='$todoID'";
			$result_pp2=mysqli_query($cxn,$sql_pp2);
			if($result_pp2!=false){$queryST="Successfully editted To-DO!";}
			else{$queryST='Could not edit to do';}
		break;
		case('delTD'):			
			$sql_pp2="DELETE FROM toDo WHERE todoID='$todoID'";
			$result_pp2=mysqli_query($cxn,$sql_pp2);
			if($result_pp2!=false){$queryST="Successfully deleted Todo!";}
			else{$queryST='Could not delete todo';}
		break;
		case('doneTD'):			
			$sql_pp2="UPDATE toDo SET tdStatus='Complete' 
				WHERE todoID='$todoID'";
			$result_pp2=mysqli_query($cxn,$sql_pp2);
			if($result_pp2!=false){$queryST="Successfully changed to-do status!";}
			else{$queryST='Could not change todo status';}
		break;
	//NOTES
	case('adNote'):
		$noteID="note".rand(1111,9999);
		$sql_pp2="INSERT INTO notes VALUES('$noteID', '$projID', '$note')";
		$result_pp2=mysqli_query($cxn,$sql_pp2);
		if($result_pp2!=false){$queryST="Successfully added Note!";}
		else{$queryST='Could not add note';}
	break;
		case('edNote'):
			$sql_pp2="UPDATE notes SET note='$note' 
				WHERE noteID='$noteID'";
			$result_pp2=mysqli_query($cxn,$sql_pp2);
			if($result_pp2!=false){$queryST="Successfully editted Note!";}
			else{$queryST='Could not edit note';}
		break;
		case('delNote'):			
			$sql_pp2="DELETE FROM notes WHERE noteID='$noteID'";
			$result_pp2=mysqli_query($cxn,$sql_pp2);
			if($result_pp2!=false){$queryST="Successfully deleted Note!";}
			else{$queryST='Could not delete note';}
		break;

 }
?>