<?php
//GO THROUGH AND ADD USERS FOR EACH TYPE OF CALL THATS GOING TO BE USED SO WE CAN AVOID USING AN OVERALL ADMIN
//TO QUERY ALL TABLES, INSTEAD WE USE A SINGLE USER PER TABLE TO ENSURE IF ITS COMPROMISED THAT THERE IS MINIMAL DAMAGE
class siteOps
{
public static function getConfig()
{
	$configA = new mysqli("localhost","root","r!530FtH3Tyr@nt!!~","nebula_hosting");
	if (!$configA)
	{ 
		die('Could not connect: ' . mysqli_error()); 
	}
	return $configA;
}

public static function getCHostingConfig()
{
	$configA = new mysqli("localhost","root","r!530FtH3Tyr@nt!!~","nebula_hosting");
	if (!$configA)
	{ 
		die('Could not connect: ' . mysqli_error()); 
	}
	return $configA;
}

public static function getDHostingConfig()
{
	$configA = new mysqli("localhost","root","r!530FtH3Tyr@nt!!~","nebula_hosting");
	if (!$configA)
	{ 
		die('Could not connect: ' . mysqli_error()); 
	}
	return $configA;
}

public static function getSHostingConfig()
{
	$configA = new mysqli("localhost","root","r!530FtH3Tyr@nt!!~","nebula_hosting");
	if (!$configA)
	{ 
		die('Could not connect: ' . mysqli_error()); 
	}
	return $configA;
}

public static function getCServers()
{
	$configA = new mysqli("localhost","root","r!530FtH3Tyr@nt!!~","nebula_hosting");
	if (!$configA)
	{ 
		die('Could not connect: ' . mysqli_error()); 
	}
	return $configA;
}

public static function getCDatab()
{
	$configA = new mysqli("localhost","root","r!530FtH3Tyr@nt!!~","nebula_hosting");
	if (!$configA)
	{ 
		die('Could not connect: ' . mysqli_error()); 
	}
	return $configA;
}

public static function getCBackups()
{
	$configA = new mysqli("localhost","root","r!530FtH3Tyr@nt!!~","nebula_hosting");
	if (!$configA)
	{ 
		die('Could not connect: ' . mysqli_error()); 
	}
	return $configA;
}

public static function getCStorage()
{
	$configA = new mysqli("localhost","root","r!530FtH3Tyr@nt!!~","nebula_hosting");
	if (!$configA)
	{ 
		die('Could not connect: ' . mysqli_error()); 
	}
	return $configA;
}

public static function getCNetwork()
{
	$configA = new mysqli("localhost","root","r!530FtH3Tyr@nt!!~","nebula_hosting");
	if (!$configA)
	{ 
		die('Could not connect: ' . mysqli_error()); 
	}
	return $configA;
}
}
?>