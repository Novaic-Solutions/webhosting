<?php session_start();
		$title ="";
		if(isset($_SESSION['pageTitle']))
		{
			$title= "Nebula-Hosting.net ".$_SESSION['pageTitle']; 
		}
		if(!isset($_SESSION['pageTitle']))
		{
			$title="Nebula-Hosting.net";
		} 
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
	<title>
	<?php echo $title; ?>
	</title>
	<link HREF="/Styles/content.css" REL="stylesheet" TYPE="text/css" />
	<link href="/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
	<script src="/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="/includes/js_includes/jquery.reveal.js" type="text/javascript"></script>
	<link href="/Styles/reveal.css" rel="stylesheet" type="text/css" />
	<link HREF="/Styles/cloud.css" REL="stylesheet" TYPE="text/css" />

</head>
<script src="/includes/js_includes/modals.js" type="text/javascript"></script>
<?php
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&	Start the session and session handler  &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
/*sessions = new forum_sesh();
session_set_save_handler(array(&$sessions, "sess_open"),
						array(&$sessions, "sess_close"),
						array(&$sessions, "sess_read"),
						array(&$sessions, "sess_write"),
						array(&$sessions, "sess_destroy"),
						array(&$sessions, "sess_gc"));
session_start();*/
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
?>