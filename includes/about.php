<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
if (isset( $_GET['action'] ))
{
	$action =  $_GET['action'];
}	


switch ( $action )
{
	case 'viewArticle':
		viewArticle();
		break;
	case 'MC_Pricing':
		viewMcPricing();
		break;
	default:
		homepage();
}  

function viewMcPricing()
{
	require($_SERVER['DOCUMENT_ROOT'].'/includes/mcprice.php');
}

function homepage()
{
	require($_SERVER['DOCUMENT_ROOT'].'/includes/main.php');  
}


?>
<?php
include ($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
?>