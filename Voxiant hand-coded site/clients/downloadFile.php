<?php
if(isset($pfID))
{
	include("/mnt/w0610/d23/s07/b030e947/cgi-bin/voxyBacon.inc");
	$cxn =mysqli_connect($host, $user, $password, $database)
	or die ("Could not connect to database");
	
	
	if($scat=="iterationSET"){
		$sql22="SELECT iterFPath FROM iterationItem WHERE iterID='$iterID'";
		$result22=mysqli_query($cxn,$sql22);
		
		$row_dl=mysqli_fetch_row($result22);		
		//figuring out file path
		$filename=$row_dl[0];//iteration file path
	}
	else{
		//To download project files
		$sql_dl="SELECT * FROM projectFiles WHERE pfID='$pfID'";
		$result_dl=mysqli_query($cxn,$sql_dl);
		
		$row_dl=mysqli_fetch_assoc($result_dl);		
		$fileType=$row_dl[fileDType];
		//figuring out file path
		$filename=$row_dl[filePath];
	}

		if (ini_get('zlib.output_compression'))
				ini_set('zlib.output_compression', 'Off');

		
			
		if($access_type === 'url') {
		// access type is via the file 's url
			$parsed_url = parse_url($filename);
			$fileinfo = pathinfo($filename);
			$parsed_url['extension'] = $fileinfo['extension'];
			$parsed_url['filename'] = $fileinfo['basename'];

			$parsed_url['localpath'] = LOCALROOT . $parsed_url['path'];
		}
		else {
		// access type is the local file path
			$fileinfo = pathinfo($filename);
			$parsed_url['localpath'] = $filename;
			$parsed_url['filename'] = basename($filename);
			$parsed_url['extension'] = $fileinfo['extension'];
		}


		// just in case there is a double slash created when joining document_root and path
		$parsed_url['localpath'] = preg_replace('/\/\//', '/', $parsed_url['localpath']);

		if (!file_exists($parsed_url['localpath'])) {
			die('File not found: ' . $parsed_url['localpath']);
		}
		$allowed_ext = array('ics','pdf', 'png', 'jpg', 'jpeg', 'zip', 'doc', 'xls', 'gif', 'exe', 'ppt');
		if (!in_array($parsed_url['extension'], $allowed_ext)) {
			die('This file type is forbidden.');
		}

		switch ($parsed_url['extension']) {
			case "ics": $ctype="text/calendar";
				break;
			case "pdf": $ctype = "application/pdf";
				break;
			case "exe": $ctype = "application/octet-stream";
				break;
			case "zip": $ctype = "application/zip";
				break;
			case "doc": $ctype = "application/msword";
				break;
			case "xls": $ctype = "application/vnd.ms-excel";
				break;
			case "ppt": $ctype = "application/vnd.ms-powerpoint";
				break;
			case "gif": $ctype = "image/gif";
				break;
			case "png": $ctype = "image/png";
				break;
			case "jpeg":
			case "jpg": $ctype = "image/jpg";
				break;
			default: $ctype = "application/force-download";
		}
		header("Pragma: public"); // required
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private", false); // required for certain browsers
		header("Content-Type: $ctype");
		header("Content-Disposition: attachment; filename=\"" . $parsed_url['filename'] . "\";");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: " . filesize($parsed_url['localpath']));
		readfile($parsed_url['localpath']);
		clearstatcache();
		exit();

}else{
echo"<p>File could not be found for downloading!<br/>
	Please contact <a href='mailto:info@voxiant.com'>Voxiant</></p>";
}
?>