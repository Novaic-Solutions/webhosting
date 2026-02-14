<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_logo.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/siteOps.php');
class forum_cache
{
	
	
	public $customer_id 	= null;
	public $activity 		= null;
	public $activated		= null;
	public $last_login		= null;
	public $locked			= null;
	public $banned			= null;
	public $login_attempts	= null;
	public $group_id		= null;
	public $unlockTime		= null;
	public $activationString = null;

	
public function __construct( $data=array() )
{
	if(isset($data['cust_id'])) 		$this->customer_id		= $data['cust_id'];
	if(isset($data['active'])) 			$this->activity			= $data['active'];
	if(isset($data['activated'])) 		$this->activated		= $data['activated'];	
	if(isset($data['lastLogin'])) 		$this->last_login		= $data['lastLogin'];
	if(isset($data['locked'])) 			$this->locked			= $data['locked'];
	if(isset($data['ban'])) 			$this->banned			= $data['ban'];
	if(isset($data['loginAttempts'])) 	$this->login_attempts	= $data['loginAttempts'];
	if(isset($data['groupId'])) 		$this->group_id			= $data['groupId'];
	if(isset($data['unlockTime']))		$this->unlockTime		= $data['unlockTime'];
	if(isset($data['activationString']))$this->activationString	= $data['activationString'];
}
//
//
//
//
//
public static function createLog($id, $actStr)
{
	if(!is_numeric($id))
	{
		return FALSE;
	}
	$config = siteOps::getConfig();
	$sql = "INSERT INTO members_logs(cust_id,activationString) VALUES(?,?)";
	$result = $config->prepare($sql);
	$result->bind_param("is",$id,$actStr);
	if ($result->execute())
	{
		$result->close();
		$config->close();
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			Lock user out					$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

public static function updateLock ($username, $attmpts=5, $lockStatus, $unlockTime)
{
	$config = siteOps::getConfig();
	$user = $config->real_escape_string($username);
	$id = forum_logo::getID($user);
	$sql= "UPDATE members_logs SET locked='?', unlockTime='?', loginAttempts='?' WHERE cust_id=?";
	$result = $config->prepare($sql);
	$result->bind_param('sssi',$lockStatus,$unlockTime,$attmpts,$id);
	if($result->execute())
	{
		$result->close();
		$config->close();
		return TRUE;
	}
	else
	{	
		return FALSE;
	}

}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			update login attempts			$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

public static function wrongInfo($username)
{
	$config = siteOps::getConfig();
	$user = $config->real_escape_string($username);
	$userinfo = $config->getByUsername($user);
	$id = $userinfo->customer_id;
	$sql = "SELECT cust_id,loginAttempts FROM members_logs WHERE cust_id=?";
	$result = $config->prepare($sql);
	$result->bind_param("i", $id);
	$result->execute();
	$result->bind_result($id,$logs);
	$result->fetch();
	$result->close();
	$config->close();
	$ar = array(
	'cust_id' => $id,
	'loginAttempts' => $logs
	);

	return new forum_cache($ar);
}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			CHECK FOR USERNAME				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

public static function loginUser($id)
{	
	if(!is_numeric($id))
	{
		return FALSE;
	}
	$config = siteOps::getConfig();
	$cid = $id;
	$attempts = 0;
	$activity = "online";
	$last =  date("Y-m-d H:i:s");
	$sql="UPDATE members_logs SET active='".$activity."',loginAttempts=".$attempts.",lastLogin='".$last."' WHERE cust_id=".$cid."";
	$result = $config->prepare($sql);
	if($result->execute())
	{
		$result->close();
		$config->close();
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			CHECK FOR USERNAME				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

public function logoutUser($ID)
{	
	if(!is_numeric($ID))
	{
		return FALSE;
	}
	$config = siteOps::getConfig();
	$sql = "UPDATE members_logs SET active='offline' WHERE cust_id=?";
	$result = $config->prepare($sql);
	$result->bind_param("i", $ID);
	if($result->execute())
	{
		$result->close();
		$config->close();
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			RETURNS THE USERS LOGS			$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

public static function getUserLogs($id)
{	
	if(!is_numeric($id))
	{
		return FALSE;
	}
	
	$config = siteOps::getConfig();
	$sql = "SELECT * FROM members_logs WHERE cust_id=?";
	$result = $config->prepare($sql);
	$result->bind_param("i",$id);
	if($result->execute())
	{
		$result->bind_result($row1,$row2,$row3,$row4,$row5,$row6,$row7,$row8,$row9,$row10,$row11);
		$result->fetch();
		$rowA = array(
			'cust_id'		=>	$row1,
			'active'		=>	$row2,
			'activated'		=>	$row3,
			'lastLogin'		=>	$row4,
			'locked'		=>	$row5,
			'unlockTime'	=>	$row6,
			'ban'			=>	$row7,
			'loginAttempts'	=>	$row8,
			'groupId'		=>	$row9,
			'logID'			=>	$row10,
			'activationString'=>$row11
			);
		$result->close();
		$config->close();
		
		if( isset($rowA))
		{			
			return new forum_cache($rowA);
		}
		else
		{
			return FALSE;
		}
	}
	else
	{
		return FALSE;
	}
}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			Activates the user				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

public function activateEmail($code)
{
	$config = siteOps::getConfig();
	$code = $config->real_escape_string($code);
	$sql = "UPDATE members_logs SET activated='activated' WHERE activation_string=?";
	$result = $config->prepare($sql);
	$result->bind_param("s",$code);
	$result->execute();
	$result->store_result();
	if($result->affected_rows >= 1)
	{
		$result->close();
		$config->close();
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
/*
public static function resendVerificationEmail($mail)
{		
		
		$config = self::getConfig();
		$sql="SELECT activation_string FROM members WHERE email =?";
		$result = $config->prepare($sql);
	 	$result->bind_param("s", $mail);
		if($result->execute())
		{
			$result->bind_result($newString);
			$result->fetch();
			$message = " To activate your account, please click on this link:\n\n";
	    	$message .= 'https://www.nebula-hosting.net/activate.php?key='.$newString;
    		mail($mail, 'Registration Confirmation', $message, 'From: admin@nebula-hosting.net');
			$result->close();
			$config->close();
			return TRUE;
		}
		else
		{
			return FALSE;
		}
}
*/

public static function generateActivationString()
{
    $randomSalt = 'JHjhkjnkjn9898';
    $uniqId = uniqid(mt_rand(), true);
    return md5($randomSalt.$uniqId);
}
}
?>