<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_logo.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sess.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_cache.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sesh.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/cloudOps.php');

class novOps
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
		if(isset($data['nova_agentbuild_id'])) 				$this->nova_agentbuild_id					= $data['nova_agentbuild_id'];
		if(isset($data['nova_aggregates_id'])) 				$this->nova_aggregates_id					= $data['nova_aggregates_id'];
		if(isset($data['nova_aggregate_hosts_id'])) 		$this->nova_aggregate_hosts_id				= $data['nova_aggregate_hosts_id'];
		if(isset($data['nova_aggregatemetadata_id'])) 		$this->nova_aggregatemetadata_id			= $data['nova_aggregatemetadata_id'];
		if(isset($data['nova_blockdevicemap_id'])) 			$this->nova_blockdevicemap_id				= $data['nova_blockdevicemap_id'];
		if(isset($data['nova_bw_usage_cache_id'])) 			$this->nova_bw_usage_cache_id				= $data['nova_bw_usage_cache_id'];
		if(isset($data['nova_cells_id'])) 					$this->nova_cells_id						= $data['nova_cells_id'];
		if(isset($data['nova_certificates_id'])) 			$this->nova_certificates_id					= $data['nova_certificates_id'];
		if(isset($data['nova_compute_nodes_id'])) 			$this->nova_compute_nodes_id				= $data['nova_compute_nodes_id'];
		if(isset($data['nova_consoles_id'])) 				$this->nova_consoles_id						= $data['nova_consoles_id'];
		if(isset($data['nova_console_pools_id'])) 			$this->nova_console_pools_id				= $data['nova_console_pools_id'];
		if(isset($data['nova_instance_id'])) 				$this->nova_instance_id						= $data['nova_instance_id'];
		if(isset($data['nova_instance_action_id'])) 		$this->nova_instance_action_id				= $data['nova_instance_action_id'];
		if(isset($data['nova_instanceaction_events_id'])) 	$this->nova_instanceaction_events_id		= $data['nova_instanceaction_events_id'];
		if(isset($data['nova_instancegroup_id'])) 			$this->nova_instancegroup_id				= $data['nova_instancegroup_id'];
		if(isset($data['nova_instancegroup_uuid'])) 		$this->nova_instancegroup_uuid				= $data['nova_instancegroup_uuid'];
		if(isset($data['nova_instance_group_member_id'])) 	$this->nova_instance_group_member_id		= $data['nova_instance_group_member_id'];
		if(isset($data['nova_instancegroup_meta_id'])) 		$this->nova_instancegroup_meta_id			= $data['nova_instancegroup_meta_id'];
		if(isset($data['nova_instancegroup_policy_id'])) 	$this->nova_instancegroup_policy_id			= $data['nova_instancegroup_policy_id'];
		if(isset($data['nova_instance_id_mappings'])) 		$this->nova_instance_id_mappings			= $data['nova_instance_id_mappings'];
		if(isset($data['nova_instance_infocache_id'])) 		$this->nova_instance_infocache_id			= $data['nova_instance_infocache_id'];
		if(isset($data['nova_instance_metadata_id'])) 		$this->nova_instance_metadata_id			= $data['nova_instance_metadata_id'];
		if(isset($data['nova_instance_system_id'])) 		$this->nova_instance_system_id				= $data['nova_instance_system_id'];
		if(isset($data['nova_instance_type_id'])) 			$this->nova_instance_type_id				= $data['nova_instance_type_id'];
		if(isset($data['nova_instance_typeextraspecs_id'])) $this->nova_instance_typeextraspecs_id		= $data['nova_instance_typeextraspecs_id'];
		if(isset($data['nova_instance_type_projects_id'])) 	$this->nova_instance_type_projects_id		= $data['nova_instance_type_projects_id'];
		if(isset($data['nova_isci_target_id'])) 			$this->nova_isci_target_id					= $data['nova_isci_target_id'];
		if(isset($data['nova_keypairs_id'])) 				$this->nova_keypairs_id						= $data['nova_keypairs_id'];
		if(isset($data['nova_migrateversion_repo_id'])) 	$this->nova_migrateversion_repo_id			= $data['nova_migrateversion_repo_id'];
		if(isset($data['nova_migrations_id'])) 				$this->nova_migrations_id					= $data['nova_migrations_id'];
		if(isset($data['nova_pci_devices_id'])) 			$this->nova_pci_devices_id					= $data['nova_pci_devices_id'];
		if(isset($data['nova_pci_devices_product_id'])) 	$this->nova_pci_devices_product_id			= $data['nova_pci_devices_product_id'];
		if(isset($data['nova_pci_devices_vendor_id'])) 		$this->nova_pci_devices_vendor_id			= $data['nova_pci_devices_vendor_id'];
		if(isset($data['nova_project_userquota_id'])) 		$this->nova_project_userquota_id			= $data['nova_project_userquota_id'];
		if(isset($data['nova_provider_fwrules_id'])) 		$this->nova_provider_fwrules_id				= $data['nova_provider_fwrules_id'];
		if(isset($data['nova_quotas_id'])) 					$this->nova_quotas_id						= $data['nova_quotas_id'];
		if(isset($data['nova_quotas_classes_id'])) 			$this->nova_quotas_classes_id				= $data['nova_quotas_classes_id'];
		if(isset($data['nova_quota_usage_id'])) 			$this->nova_quota_usage_id					= $data['nova_quota_usage_id'];
		if(isset($data['nova_reservation_id'])) 			$this->nova_reservation_id					= $data['nova_reservation_id'];
		if(isset($data['nova_services_id'])) 				$this->nova_services_id						= $data['nova_services_id'];
		if(isset($data['nova_reservation_uuid'])) 			$this->nova_reservation_uuid				= $data['nova_reservation_uuid'];
		if(isset($data['nova_securitygroup_id'])) 			$this->nova_securitygroup_id				= $data['nova_securitygroup_id'];
		if(isset($data['nova_default_secgrouprules_id'])) 	$this->nova_default_secgrouprules_id		= $data['nova_default_secgrouprules_id'];
		if(isset($data['nova_secgroupinstanceassoc_id'])) 	$this->nova_secgroupinstanceassoc_id		= $data['nova_secgroupinstanceassoc_id'];
		if(isset($data['nova_secgroup_ruls_id'])) 			$this->nova_secgroup_ruls_id				= $data['nova_secgroup_ruls_id'];
		if(isset($data['nova_snapshot_id'])) 				$this->nova_snapshot_id						= $data['nova_snapshot_id'];
		if(isset($data['nova_snapshot_idmappings_id'])) 	$this->nova_snapshot_idmappings_id			= $data['nova_snapshot_idmappings_id'];
		if(isset($data['nova_tasklog_id'])) 				$this->nova_tasklog_id						= $data['nova_tasklog_id'];
		if(isset($data['nova_volume_id'])) 					$this->nova_volume_id						= $data['nova_volume_id'];
		if(isset($data['nova_virtual_interfaces_id'])) 		$this->nova_virtual_interfaces_id			= $data['nova_virtual_interfaces_id'];
		if(isset($data['nova_volumeidmappings_id'])) 		$this->nova_volumeidmappings_id				= $data['nova_volumeidmappings_id'];
		if(isset($data['nova_volumeusagecache_id'])) 		$this->nova_volumeusagecache_id				= $data['nova_volumeusagecache_id'];

	}
}

?>