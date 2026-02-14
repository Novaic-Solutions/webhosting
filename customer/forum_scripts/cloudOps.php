<?php
class cloudOps
{
// Each function will log the user in to the corresponding database on the controller server. May need to add ports to the address though.
	public static function getKeystone()
	{
		$configA = new mysqli("10.1.10.150","keystone","M00nchyPr1nc35$!~417","keystone");
		if (!$configA)
		{ 
			die('Could not connect: ' . mysqli_error()); 
		}
		return $configA;
	}
	
	public static function getGlance()
	{
		$configA = new mysqli("10.1.10.150","glance","AnArchyst1988","glance");
		if (!$configA)
		{ 
			die('Could not connect: ' . mysqli_error()); 
		}
		return $configA;
	}
	
	public static function getNova()
	{
		$configA = new mysqli("10.1.10.150","nova","MyFUck1ng3y3$!5","nova");
		if (!$configA)
		{ 
			die('Could not connect: ' . mysqli_error()); 
		}
		return $configA;
	}
	
	public static function getCinder()
	{
		$configA = new mysqli("10.1.10.150","cinder","T0n1ghtz0rz??!","cinder");
		if (!$configA)
		{ 
			die('Could not connect: ' . mysqli_error()); 
		}
		return $configA;
	}
	
	public static function getDash()
	{
		$configA = new mysqli("10.1.10.150","dash","N3buL@!1nTh3Skyz","dash");
		if (!$configA)
		{ 
			die('Could not connect: ' . mysqli_error()); 
		}
		return $configA;
	}
	
	public static function getNeutron()
	{
		$configA = new mysqli("10.1.10.150","neutron","Th3Str15G0nn3spl0d3!","neutron");
		if (!$configA)
		{ 
			die('Could not connect: ' . mysqli_error()); 
		}
		return $configA;
	}	
}
?>
