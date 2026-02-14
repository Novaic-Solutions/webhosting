<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/siteOps.php');
class forum_logo
{
	public $usrname 	= null;
	public $customer_id = null;
	public $email		= null;
	public $svc			= null;
	public $svc_ty		= null;
	public $pkg			= null;
	public $card		= null;
	public $fname		= null;
	public $lname		= null;
	public $zip			= null;
	public $streetadd	= null;
	public $pwd			= null;
	public $reg_date	= null;
	public $last_pay	= null;
	public $next_pay	= null;
	public $has_paid	= null;
	public $state		= null;
	public $country 	= null;
	private $config		= "";
	
public function __construct( $data=array() )
{
	if(isset($data['username'])) 			$this->usrname		= $data['username'];
	if(isset($data['cust_id'])) 			$this->customer_id	= $data['cust_id'];
	if(isset($data['email'])) 				$this->email		= $data['email'];
	if(isset($data['service'])) 			$this->svc			= $data['service'];
	if(isset($data['service_type'])) 		$this->svc_ty		= $data['service_type'];
	if(isset($data['package'])) 			$this->pkg			= $data['package'];
	if(isset($data['card'])) 				$this->card			= $data['card'];
	if(isset($data['first_name'])) 			$this->fname		= $data['first_name'];
	if(isset($data['last_name'])) 			$this->lname		= $data['last_name'];
	if(isset($data['zipcode'])) 			$this->zip			= $data['zipcode'];
	if(isset($data['street_address'])) 		$this->streetadd	= $data['street_address'];
	if(isset($data['pass']))	 			$this->pwd			= $data['pass'];
	if(isset($data['date_registered'])) 	$this->reg_date		= $data['date_registered'];
	if(isset($data['last_payment_made'])) 	$this->last_pay		= $data['last_payment_made'];
	if(isset($data['next_payment_due'])) 	$this->next_pay		= $data['next_payment_due'];
	if(isset($data['uptodate_payments']))	$this->has_paid		= $data['uptodate_payments'];
	if(isset($data['State']))				$this->state		= $data['State'];
	if(isset($data['Country']))				$this->country		= $data['Country'];
	$config = siteOps::getConfig();
}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			CREATE NEW CUSTOMER				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public static function checkCredentials($user, $passw)
{	
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$userName = $config->real_escape_string($user);
	$passWord = $config->real_escape_string($passw);
	$testPass = self::getPass($userName);
	$salt = substr($testPass, 0, 32);
	$hashed = hash('SHA512',$passWord.$salt);
	$passWd = $salt.$hashed;	
	
	$sql = "SELECT * FROM members WHERE username=? AND pass=?";
	$result = $config->prepare($sql);
	$result->bind_param("ss", $userName, $passWd);
	
	if($result->execute())
	{
		$result->bind_result($rows1,$rows2,$rows3,$rows4,$rows5,$rows6,$rows7,$rows8,$rows9,$rows10,$rows11,$rows12,$rows13,$rows14,$rows15,$rows16,$rows17,$rows18);
		$result->fetch();
		$rowA = array(
				'username'			=>  $rows1,
				'cust_id'			=>	$rows2,
				'email'				=>	$rows3,
				'service'			=>	$rows4,
				'service_type'		=>	$rows5,
				'package'			=>	$rows6,
				'card'				=>	$rows7,
				'first_name'		=>	$rows8,
				'last_name'			=>	$rows9,
				'zipcode'			=>	$rows10,
				'street_address'	=>	$rows11,
				'State'				=>	$rows12,
				'Country'			=>	$rows13,
				'pass'				=>	$rows14,
				'date_registered'	=>	$rows15,
				'last_payment_made'	=>	$rows16,
				'next_payment_due'	=>	$rows17,
				'uptodate_payments'	=>	$rows18
			);
		$result->close();
		$config->close();
			
		if( isset($rowA))
		{			
			return new forum_logo($rowA);
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
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public static function getPass($username)
{
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$user = $config->real_escape_string($username);
	$sql = "SELECT pass FROM members WHERE username=?";
	$result = $config->prepare($sql);
	$result->bind_param("s", $user);
	
	if($result->execute())
	{
		$result->bind_result($res1);
		$result->fetch();
		$result->close();
		$config->close();
		return $res1;
	}
	else
	{
		return FALSE;
	}
}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			CREATE NEW CUSTOMER				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public function newCust()
{
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$sql = "INSERT INTO members(username,email,service,service_type,package,card,first_name,last_name,zipcode,street_address,State,Country,pass,date_registered,last_payment_made,next_payment_due,uptodate_payments) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,Now(),?,?,?)";
	$result = $config->prepare($sql);
	$result->bind_param("ssssiississssssi",
			$this->usrname, 
			$this->email, 
			$this->svc, 
			$this->svc_ty, 
			$this->pkg, 
			$this->card, 
			$this->fname, 
			$this->lname, 
			$this->zip,	
			$this->streetadd, 
			$this->state, 
			$this->country, 
			$this->pwd, 
			$this->last_pay, 
			$this->next_pay, 
			$this->has_paid);
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
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			GENERATE NEW SALT				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public static function genSalt()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
	$length = 32;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    
	return $randomString;
}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			CHECK FOR EMAIL 				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public static function checkEmail($em)
{
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$emai = $config->real_escape_string($em);
	$sql = "SELECT * FROM members WHERE email=?";
	$result = $config->prepare($sql);
	$result->bind_param("s", $emai);
	
	$result->execute();
	
		$result->store_result();
		$Test = $result->num_rows;
		$result->free_result();
		$result->close();
		$config->close();
		if($Test==0)
		{
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
public static function checkUsername($usrN)
{
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$user = $config->real_escape_string($usrN);
	$sql = "SELECT * FROM members WHERE username=?";
	$result = $config->prepare($sql);
	$result->bind_param("s", $user);
	
	if($result->execute())
	{
		$result->store_result();
		$Test = $result->num_rows;
		$result->free_result();		
		$result->close();
		$config->close();
		if($Test==0)
		{
			return TRUE;
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
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			GET SERVICE AND PACKAGE			$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public static function getSerPkg($id)
{
	if(!is_numeric($id))
	{
		return FALSE;
	}
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$sql = "SELECT service,service_type,package FROM members WHERE cust_id=?";
	$result = $config->prepare($sql);
	$result->bind_param("i", $id);
	
	if($result->execute())
	{
		$result->store_result();
		$Test = $result->num_rows;
		$result->free_result();
		$result->bind_result($rows1,$rows2,$rows3);
		$result->fetch();
		$result->close();
		$config->close();
			if( isset($rows1) && isset($rows2) && isset($rows3) && $Test ==1 )
			{			
				return array($rows1,$rows2,$rows3);
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

public static function getID($username)
{
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$user = $config->real_escape_string($username);
	$sql = "SELECT cust_id FROM members WHERE username='?'";
	$result = $config->prepare($sql);
	$result->bind_param('s',$user);
	if($result->execute())
	{
		$result->bind_result($row1);
		$result->fetch();
		$result->close();
		$config->close();
		
		return $row1;
	}
	else
	{
		return FALSE;
	}
}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			GET INFO BY ID  				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public static function getById($id)
{
	if(!is_numeric($id))
	{
		return FALSE;
	}
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$sql = "SELECT * FROM members WHERE cust_id=?";
	$result = $config->prepare($sql);
	$result->bind_param("i", $id);
	
	if($result->execute())
	{
		$result->store_result();
		$Test = $result->num_rows;
		$result->free_result();
		$result->bind_result($rows1,$rows2,$rows3,$rows4,$rows5,$rows6,$rows7,$rows8,$rows9,$rows10,$rows11,$rows12,$rows13,$rows14,$rows15,$rows16,$rows17);
		$result->fetch();
		$rowA = array(
			'username'			=>  $rows1,
			'cust_id' 			=>	$rows2,
			'email'				=>	$rows3,
			'service'			=>	$rows4,
			'service_type'		=>  $rows5,
			'package'			=>	$rows6,
			'card'				=>	$rows7,
			'first_name'		=>	$rows8,
			'last_name'			=>	$rows9,
			'zipcode'			=>	$rows10,
			'street_address'	=>	$rows11,
			'State'				=> 	$rows12,
			'Country'			=>	$rows13,
			'date_registered'	=>	$rows14,
			'last_payment_made'	=>	$rows15,
			'next_payment_due'	=>	$rows16,
			'uptodate_payments'	=>	$rows17
			);
			$result->close();
			$config->close();
			
			if( isset($rowA) && $Test ==1 )
			{			
				return new forum_logo($rowA);
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
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			GET INFO BY USERNAME			$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public function getByUsername($userName)
{
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$user = $config->real_escape_string($userName);
	$sql = "SELECT * FROM members WHERE username=?";
	$result = $config->prepare($sql);
	$result->bind_param("s", $user);
	
	if($result->execute())
	{
		$result->store_result();
		$Test = $result->num_rows;	
		$result->bind_result($rows1,$rows2,$rows3,$rows4,$rows5,$rows6,$rows7,$rows8,$rows9,$rows10,$rows11,$rows12,$rows13,$rows14,$rows15,$rows16,$rows17,$rows18);
		$result->fetch();
		$rowA = array(
			'username'			=>  $rows1,
			'cust_id' 			=>	$rows2,
			'email'				=>	$rows3,
			'service'			=>	$rows4,
			'service_type'		=>  $rows5,
			'package'			=>	$rows6,
			'card'				=>	$rows7,
			'first_name'		=>	$rows8,
			'last_name'			=>	$rows9,
			'zipcode'			=>	$rows10,
			'street_address'	=>	$rows11,
			'State'				=> 	$rows12,
			'Country'			=>	$rows13,
			'pass'				=>	$rows14,
			'date_registered'	=>	$rows15,
			'last_payment_made'	=>	$rows16,
			'next_payment_due'	=>	$rows17,
			'uptodate_payments'	=>	$rows18
			);
			$result->close();
			$config->close();
			
			if( isset($rowA) && $Test ==1 )
			{			
				return new forum_logo($rowA);
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
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			GET INFO BY EMAIL				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public static function getByEmail($mail)
{
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$sql = "SELECT * FROM members WHERE email=?";
	$result = $config->prepare($sql);
	$result->bind_param("s", $mail);
	
	if($result->execute())
	{
		$result->store_result();
		$Test = $result->num_rows;	
		$result->bind_result($rows1,$rows2,$rows3,$rows4,$rows5,$rows6,$rows7,$rows8,$rows9,$rows10,$rows11,$rows12,$rows13,$rows14,$rows15,$rows16,$rows17);
		$result->fetch();
		$rowA = array(
			'username'			=>  $rows1,
			'cust_id' 			=>	$rows2,
			'email'				=>	$rows3,
			'service'			=>	$rows4,
			'service_type'		=>  $rows5,
			'package'			=>	$rows6,
			'card'				=>	$rows7,
			'first_name'		=>	$rows8,
			'last_name'			=>	$rows9,
			'zipcode'			=>	$rows10,
			'street_address'	=>	$rows11,
			'State'				=> 	$rows12,
			'Country'			=>	$rows13,
			'date_registered'	=>	$rows14,
			'last_payment_made'	=>	$rows15,
			'next_payment_due'	=>	$rows16,
			'uptodate_payments'	=>	$rows17
			);
			$result->close();
			$config->close();
			
			if( isset($rowA) && $Test ==1 )
			{			
				return new forum_logo($rowA);
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
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			CHANGE PASSWORD 				$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public function changePass($id,$newP)
{
	if(!is_numeric($id))
	{
		return FALSE;
	}
	$salt = self::genSalt();
	$hashed = hash('SHA512',$newP.$salt);
	$passWd = $salt.$hashed;
	if($config=="")
	{
		$config = siteOps::getConfig();
	}
	$sql = "UPDATE members SET password=? WHERE cust_id=?";
	$result = $config->prepare($sql);
	$result->bind_param("si",$passWd,$this->customer_id);
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
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$			UPDATE PAYMENT STATUS			$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
public function updatePayment()
{
	$currentTime = date('n-j-y');
	$nextPay = mktime (0,0,0,date("n")+1,date("j"),date("y"));
	$config = siteOps::getConfig();
	$sql = "UPDATE members SET last_payment_made=?,next_payment_due=?,update_payments=? WHERE cust_id=? AND card=?";
	$result = $config->prepare($sql);
	$result->bind_param("sssii",$currentTime, $nextPay, "yes", $this->customer_id, $this->card);
	
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

public function createInstance()
{
	exec('/opt/automated/createNewReg.py -id '.$this->customer_id.' -service '.$this->svc.' -serviceType '.$this->svc_ty.' -package '.$this->pkg, $output, $retval);
	return $retval;
}
}// THIS IS THE FILE TO DEAL WITH THE DATABASE FOR REGISTERING A USER
?>