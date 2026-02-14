<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

if (isset( $_GET['action'] ))
{
	$action =  $_GET['action'];
}	


switch ( $action )
{
	case 'servApache':
		servApache();
		break;
	case 'servJoom':
		servJoom();
		break;
	case 'servWordP':
		servWordP();
		break;
	case 'servMySQL':
		servMySQL();
		break;
	case 'main':
		servMain();
		break;
	default:
		servMain();
}  

function servApache()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Services/servApache.html');
}

function servJoom()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Services/servJoom.html');
}

function servWordP()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Services/servWordP.html');
}

function servMySQL()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Services/servMySQL.html');
}

function servMain()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Services/servMain.html');
}

require ($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
?>