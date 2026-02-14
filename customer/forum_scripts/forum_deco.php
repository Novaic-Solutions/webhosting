<?php

class forum_deco
{

	function store_in_session($key,$value)
	{
		if (isset($_SESSION))
		{
			$_SESSION[$key]=$value;
		}
	}
	function unset_session($key)
	{
		$_SESSION[$key]=' ';
		unset($_SESSION[$key]);
	}
	function get_from_session($key)
	{
		if (isset($_SESSION[$key]))
		{
			return $_SESSION[$key];
		}
		else {  return false; }
	}

}

?>