<?php session_start();
error_reporting(E_ALL); ini_set('display_errors', 'On');

//&&&&&&&&&&&&&&&&&&&&&&& USER ACCOUNT INFO &&&&&&&&&&&&&&&&&&&&&&&&&&
$services 		= array();
$serviceType 	= array();
$payments 		= array();
$packageLevels 	= array();
$SesCheck 		= TRUE;
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
if(isset($_SESSION['svc'])) 	$services 			= explode(",", $_SESSION['svc']);
if(isset($_SESSION['svcType'])) $serviceType 		= explode(",", $_SESSION['svcType']);
if(isset($_SESSION['pmt'])) 	$payments 			= explode(",", $_SESSION['pmt']);
if(isset($_SESSION['pkg'])) 	$packageLevels 		= explode(",", $_SESSION['pkg']);
//&&&&&&&&&&&&&&&&&&&&&&&&& Check to make sure session vars are set &&&&&&&&&&&&&&&&&&&&&&&&&&&&
if (!isset($_SESSION['svc']))
{
	$_SESSION['err'][]="NO SERVICE IS SET FOR USER".$_SESSION['usr'];
	$SesCheck = FALSE;
}
if (!isset($_SESSION['svcType']))
{
	$_SESSION['err'][]="NO SERVICE TYPE IS SET FOR USER".$_SESSION['usr'];
	$SesCheck = FALSE;
}
if (!isset($_SESSION['pmt']))
{
	$_SESSION['err'][]="NO PAYMENT IS SET FOR USER".$_SESSION['usr'];
	$SesCheck = FALSE;
}
if (!isset($_SESSION['pkg']))
{
	$_SESSION['err'][]="NO PACKAGE IS SET FOR USER".$_SESSION['usr'];
	$SesCheck = FALSE;
}
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

if (isset($_SESSION['usr']) && isset($_SESSION['users_id']) && isset($_SESSION['group_id']) && $SesCheck==TRUE)
{	//because this is holding the info in memory, I need to see if its just better to put it into sessions and then get rid of it in the end or if its better
	//to just have the data read directly from the DB dynamically
	require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/dashHeader.php');
	require ($_SERVER['DOCUMENT_ROOT'].'/customer/dashboard.html');		
}
else
{
	require ($_SERVER['DOCUMENT_ROOT'].'/includes/templates/error.html');
}
?>