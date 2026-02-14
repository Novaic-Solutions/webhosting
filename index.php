<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
error_reporting(E_ALL); ini_set('display_errors', 'On');
if (isset( $_GET['action'] ))
{
	$action =  $_GET['action'];
}	
else
{
	$action = 'home';
}

switch ( $action )
{
	case 'MC_Pricing':
		viewMcPricing();
		break;
	default:
		homepage();
}  

function homepage()
{
	require($_SERVER['DOCUMENT_ROOT'].'/includes/main.php');  
}
?>