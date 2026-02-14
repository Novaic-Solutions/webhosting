<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_logo.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sess.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_cache.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sesh.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/cloudOps.php');

class keyOps
{
	public $keyst_id = null;
	public $keyst_username = null;
	public $keyst_extra = null;
	public $keyst_password = null;
	public $keyst_domain_id = null;
	public $keyst_domain_name = null;
	public $keyst_domain_extra = null;
	public $keyst_site_mem_id = null;
	public $keyst_region = null;
	public $keyst_role_id = null;
	public $keyst_service_id = null;
	public $keyst_token_id = null;
	public $keyst_trust_id = null;
	public $keyst_project_id = null;
	public $keyst_project_name = null;
	public $keyst_project_description = null;
	public $keyst_project_extra = null;

	public function __construct( $data=array() )
	{
		if(isset($data['keyst_id'])) 					$this->keyst_id						= $data['keyst_id'];
		if(isset($data['keyst_username'])) 				$this->keyst_username				= $data['keyst_username'];
		if(isset($data['keyst_extra'])) 				$this->keyst_extra					= $data['keyst_extra'];
		if(isset($data['keyst_password'])) 				$this->keyst_password				= $data['keyst_password'];
		if(isset($data['keyst_domain_id'])) 			$this->keyst_domain_id				= $data['keyst_domain_id'];
		if(isset($data['keyst_domain_name'])) 			$this->keyst_domain_name			= $data['keyst_domain_name'];
		if(isset($data['keyst_domain_extra'])) 			$this->keyst_domain_extra			= $data['keyst_domain_extra'];
		if(isset($data['keyst_site_mem_id'])) 			$this->keyst_site_mem_id			= $data['keyst_site_mem_id'];
		if(isset($data['keyst_region'])) 				$this->keyst_region					= $data['keyst_region'];
		if(isset($data['keyst_role_id'])) 				$this->keyst_role_id				= $data['keyst_role_id'];
		if(isset($data['keyst_service_id'])) 			$this->keyst_service_id				= $data['keyst_service_id'];
		if(isset($data['keyst_token_id'])) 				$this->keyst_token_id				= $data['keyst_token_id'];
		if(isset($data['keyst_trust_id'])) 				$this->keyst_trust_id				= $data['keyst_trust_id'];
		if(isset($data['keyst_project_id'])) 			$this->keyst_project_id				= $data['keyst_project_id'];
		if(isset($data['keyst_project_name'])) 			$this->keyst_project_name			= $data['keyst_project_name'];
		if(isset($data['keyst_project_description'])) 	$this->keyst_project_description	= $data['keyst_project_description'];
		if(isset($data['keyst_project_extra'])) 		$this->keyst_project_extra			= $data['keyst_project_extra'];
	}
	
	public static function getKeystUserInfo($user_ID)
	{
		$config = cloudOps::getKeystone();
	//	$site_config = forum_logo::getConfig();
		
		
	
	}
	
	public static function createKeystUser($username,$pwd,$email,$domain=null,$ID)
	{
		$config = cloudOps::getKeystone();
		$site_config = forum_logo::getConfig();
		$sql = "INSERT INTO user (name,extra,password,domain_id,site_mem_id) VALUES(?,?,?,?,?)";
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
			
		
		}

	public static function updateKeystUser($user_ID)
	{
	
	}
	
	public static function removeKeystUser($user_ID)
	{
	
	}

}

?>