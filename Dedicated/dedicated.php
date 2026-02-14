<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

if (isset( $_GET['action'] ))
{
	$action =  $_GET['action'];
}	


switch ( $action )
{
	case 'Dedi_Serv':
		dediServ();
		break;
	case 'Dedi_MC':
		dediMC();
		break;
	case 'Dedi_VM':
		dediVM();
		break;
	case 'Dedi_BF':
		dediBF();
		break;
	default:
		dediProd();
}  

function dediServ()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Dedicated/dediServ.html');
}

function dediVM()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Dedicated/dediVM.html');
}

function dediBF()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Dedicated/dediBF.html');
}

function dediMC()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Dedicated/dediMC.html');
}

function dediProd()
{
	require ($_SERVER['DOCUMENT_ROOT'].'/Dedicated/dediProd.html');
}

require ($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
?>