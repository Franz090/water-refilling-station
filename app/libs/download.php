<?php
error_reporting(E_ALL);
define('URL', 'http://localhost/octane-tracker/');


if(isset($_GET['url']))
{
	$file= $_SERVER['DOCUMENT_ROOT'] . '/octane-tracker/app/'.$_GET['url'];

	if(isset($_GET['type']))
	{
		$type = $_GET['type'];
		
		if($type=='del')
		{
			unlink($file);
			header('Location: '.URL.'application/bank');
			exit();
		}
	}
	
	$url_str =$_GET['url'];
	$url_array = explode('/',$url_str);
	$final_filename = str_replace(" ","_",basename($url_str));
	$final_filename = str_replace(",","",$final_filename);

	header("Content-Disposition: attachment; filename=" . ($final_filename));   
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header("Content-Description: File Transfer");  
	header('Expires: 0');         
	header("Content-Length: " . filesize($file));
	
	$fp = fopen($file, "r");
	// exit($fp);
	
	while (!feof($fp) )
	{
	    echo fread($fp,1024*1024);
		set_time_limit(0); 
	    flush(); // this is essential for large downloads
	} 

	fclose($fp);

	if(isset($_GET['filename']) && !isset($_GET['acquisition']))
	{
		exit('Filename is set but acquisition is not');
	}
	else{
		exit('Filename not set');
	}
}
?>