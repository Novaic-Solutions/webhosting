<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_logo.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sess.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_cache.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sesh.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/cloudOps.php');
class cinOps
{
	public $cind_volume_id = null;
	public $cind_iscsi_tar_id = null;
	public $cind_repo_id = null;
	public $cind_repo_path = null;
	public $cind_quota_id = null;
	public $cind_qclass_id = null;
	public $cind_qusage_id = null;
	public $cind_reserve_id = null;
	public $cind_reserve_uuid = null;
	public $cind_res_resource = null;
	public $cind_snapshot_id = null;
	public $cind_snapshot_encrypt_key = null;
	public $cind_snapshot = null;
	public $cind_volume_type_id = null;
	public $cind_name_id = null;
	public $cind_host = null;
	public $cind_instance_uuid = null;
	public $cind_admin_meta_id = null;
	public $cind_admin_meta_key = null;
	public $cind_admin_meta_value = null;
	public $cind_glance_id = null;

	public function __construct( $data=array() )
	{
		if(isset($data['cind_volume_id'])) 				$this->cind_volume_id				= $data['cind_volume_id'];
		if(isset($data['cind_iscsi_tar_id'])) 			$this->cind_iscsi_tar_id			= $data['cind_iscsi_tar_id'];
		if(isset($data['cind_repo_id'])) 				$this->cind_repo_id					= $data['cind_repo_id'];
		if(isset($data['cind_repo_path'])) 				$this->cind_repo_path				= $data['cind_repo_path'];
		if(isset($data['cind_quota_id'])) 				$this->cind_quota_id				= $data['cind_quota_id'];
		if(isset($data['cind_qclass_id'])) 				$this->cind_qclass_id				= $data['cind_qclass_id'];
		if(isset($data['cind_qusage_id'])) 				$this->cind_qusage_id				= $data['cind_qusage_id'];
		if(isset($data['cind_reserve_id'])) 			$this->cind_reserve_id				= $data['cind_reserve_id'];
		if(isset($data['cind_reserve_uuid'])) 			$this->cind_reserve_uuid			= $data['cind_reserve_uuid'];
		if(isset($data['cind_res_resource'])) 			$this->cind_res_resource			= $data['cind_res_resource'];
		if(isset($data['cind_snapshot_id'])) 			$this->cind_snapshot_id				= $data['cind_snapshot_id'];
		if(isset($data['cind_snapshot_encrypt_key']))	$this->cind_snapshot_encrypt_key	= $data['cind_snapshot_encrypt_key'];
		if(isset($data['cind_snapshot'])) 				$this->cind_snapshot				= $data['cind_snapshot'];
		if(isset($data['cind_volume_type_id'])) 		$this->cind_volume_type_id			= $data['cind_volume_type_id'];
		if(isset($data['cind_name_id'])) 				$this->cind_name_id					= $data['cind_name_id'];
		if(isset($data['cind_host'])) 					$this->cind_host					= $data['cind_host'];
		if(isset($data['cind_instance_uuid'])) 			$this->cind_instance_uuid			= $data['cind_instance_uuid'];
		if(isset($data['cind_admin_meta_id'])) 			$this->cind_admin_meta_id			= $data['cind_admin_meta_id'];
		if(isset($data['cind_admin_meta_key'])) 		$this->cind_admin_meta_key			= $data['cind_admin_meta_key'];
		if(isset($data['cind_admin_meta_value'])) 		$this->cind_admin_meta_value		= $data['cind_admin_meta_value'];
		if(isset($data['cind_glance_id'])) 				$this->cind_glance_id				= $data['cind_glance_id'];
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