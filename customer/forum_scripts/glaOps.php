<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_logo.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sess.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_cache.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sesh.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/cloudOps.php');

class glaOps
{
	public $glance_img_id = null;
	public $glance_img_min_ram = null;
	public $glance_img_min_disk = null;
	public $glance_img_size = null;
	public $glance_img_loc_id = null;
	public $glance_img_mem_id = null;
	public $glance_img_mem = null;
	public $glance_img_property_id = null;
	public $glance_img_property_value = null;
	public $glance_img_property_name = null;
	public $glance_img_tag_id = null;
	public $glance_img_tag_value = null;


	public function __construct( $data=array() )
	{
		if(isset($data['glance_img_id'])) 				$this->glance_img_id				= $data['glance_img_id'];
		if(isset($data['glance_img_min_ram'])) 			$this->glance_img_min_ram			= $data['glance_img_min_ram'];
		if(isset($data['glance_img_min_disk'])) 		$this->glance_img_min_disk			= $data['glance_img_min_disk'];
		if(isset($data['glance_img_size'])) 			$this->glance_img_size				= $data['glance_img_size'];
		if(isset($data['glance_img_loc_id'])) 			$this->glance_img_loc_id			= $data['glance_img_loc_id'];
		if(isset($data['glance_img_mem_id'])) 			$this->glance_img_mem_id			= $data['glance_img_mem_id'];
		if(isset($data['glance_img_mem'])) 				$this->glance_img_mem				= $data['glance_img_mem'];
		if(isset($data['glance_img_property_id'])) 		$this->glance_img_property_id		= $data['glance_img_property_id'];
		if(isset($data['glance_img_property_value'])) 	$this->glance_img_property_value	= $data['glance_img_property_value'];
		if(isset($data['glance_img_property_name'])) 	$this->glance_img_property_name		= $data['glance_img_property_name'];
		if(isset($data['glance_img_tag_id'])) 			$this->glance_img_tag_id			= $data['glance_img_tag_id'];
		if(isset($data['glance_img_tag_value'])) 		$this->glance_img_tag_value			= $data['glance_img_tag_value'];

	}

}

?>