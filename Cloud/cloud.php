<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

if (isset( $_GET['action'] ))
{
	$action =  $_GET['action'];
}	


switch ( $action )
{
	case 'Cloud_Servers':
		cloudServer();
		break;
	case 'Cloud_BF':
		cloudBF();
		break;
	case 'Cloud_Websites':
		cloudWeb();
		break;
	case 'Cloud_DBs':
		cloudDB();
		break;
	case 'Cloud_Storage':
		clkoudStorage();
		break;
	case 'Cloud_Backups':
		cloudBackup();
		break;
	case 'Cloud_MCS':
		cloudMC();
		break;
	case 'Cloud':
		cloudHome();
		break;
	default:
		cloudHome();
}  

function cloudMC()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Cloud/cloudMC.html');
}

function cloudServer()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Cloud/cloudServer.html');
}

function cloudBF()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Cloud/cloudBF.html');
}

function cloudWeb()
{
	require($_SERVER['DOCUMENT_ROOT'].'/Cloud/cloudWeb.html');
}

function cloudDB()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Cloud/cloudDB.html');
}

function cloudStorage()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Cloud/cloudStorage.html');
}

function cloudHome()
{
	 require ($_SERVER['DOCUMENT_ROOT'].'/Cloud/cloudHome.html');
}


require($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
?>