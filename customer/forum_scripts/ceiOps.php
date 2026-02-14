<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_logo.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sess.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_cache.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sesh.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/cloudOps.php');

class ceiOps
{

	public $nova_agentbuild_id = null;
	public $nova_aggregates_id = null;
	public $nova_aggregate_hosts_id = null;
	public $nova_aggregatemetadata_id = null;
	public $nova_blockdevicemap_id = null;
	public $nova_bw_usage_cache_id = null;
	public $nova_cells_id = null;
	public $nova_certificates_id = null;
	public $nova_compute_nodes_id = null;
	public $nova_consoles_id = null;
	public $nova_console_pools_id = null;
	public $nova_instance_id = null;
	public $nova_instance_action_id = null;
	public $nova_instanceaction_events_id = null;
	public $nova_instancegroup_id = null;
	public $nova_instancegroup_uuid = null;
	public $nova_instance_group_member_id = null;
	public $nova_instancegroup_meta_id = null;
	public $nova_instancegroup_policy_id = null;
	public $nova_instance_id_mappings = null;
	public $nova_instance_infocache_id = null;
	public $nova_instance_metadata_id = null;
	public $nova_instance_system_id = null;
	public $nova_instance_type_id = null;
	public $nova_instance_typeextraspecs_id = null;
	public $nova_instance_type_projects_id = null;
	public $nova_isci_target_id = null;
	public $nova_keypairs_id = null;
	public $nova_migrateversion_repo_id = null;
	public $nova_migrations_id = null;
	public $nova_pci_devices_id = null;
	public $nova_pci_devices_product_id = null;
	public $nova_pci_devices_vendor_id = null;
	public $nova_project_userquota_id = null;
	public $nova_provider_fwrules_id = null;
	public $nova_quotas_id = null;
	public $nova_quotas_classes_id = null;
	public $nova_quota_usage_id = null;
	public $nova_reservation_id = null;
	public $nova_reservation_uuid = null;
	public $nova_securitygroup_id = null;
	public $nova_default_secgrouprules_id = null;
	public $nova_project_userquota_id = null;
	public $nova_secgroupinstanceassoc_id = null;
	public $nova_secgroup_ruls_id = null;
	public $nova_services_id = null;
	public $nova_snapshot_id = null;
	public $nova_snapshot_idmappings_id = null;
	public $nova_tasklog_id = null;
	public $nova_virtual_interfaces_id = null;
	public $nova_volume_id = null;
	public $nova_volumeidmappings_id = null;
	public $nova_volumeusagecache_id = null;
	
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

}
?>