<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_logo.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sess.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_cache.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/forum_sesh.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/forum_scripts/cloudOps.php');

class neuOps
{
	public $neutron_agent_id = null;
	public $neutron_agent_type = null;
	public $neutron_port_id = null;
	public $neutron_subnet_id = null;
	public $neutron_network_id = null;
	public $neutron_floatingip_id = null;
	public $neutron_router_id = null;
	public $neutron_floating_net_id = null;
	public $neutron_floating_port_id = null;
	public $neutron_ipallocpool_id = null;
	public $neutron_ipallocpool_fip = null;
	public $neutron_ipallocpool_lip = null;
	public $neutron_gre_id = null;
	public $neutron_ml2_network_segments_id = null;
	public $neutron_quotas_id = null;
	public $neutron_router_l3_agentbindings_id = null;
	public $neutron_securitygrouprules_id = null;
	public $neutron_securitygroup_id = null;
	

	public function __construct( $data=array() )
	{
		if(isset($data['neutron_agent_id'])) 					$this->neutron_agent_id						= $data['neutron_agent_id'];
		if(isset($data['neutron_agent_type'])) 					$this->neutron_agent_type					= $data['neutron_agent_type'];
		if(isset($data['neutron_port_id'])) 					$this->neutron_port_id						= $data['neutron_port_id'];
		if(isset($data['neutron_subnet_id'])) 					$this->neutron_subnet_id					= $data['neutron_subnet_id'];
		if(isset($data['neutron_network_id'])) 					$this->neutron_network_id					= $data['neutron_network_id'];
		if(isset($data['neutron_floatingip_id'])) 				$this->neutron_floatingip_id				= $data['neutron_floatingip_id'];
		if(isset($data['neutron_router_id'])) 					$this->neutron_router_id					= $data['neutron_router_id'];
		if(isset($data['neutron_floating_net_id'])) 			$this->neutron_floating_net_id				= $data['neutron_floating_net_id'];
		if(isset($data['neutron_floating_port_id'])) 			$this->neutron_floating_port_id				= $data['neutron_floating_port_id'];
		if(isset($data['neutron_ipallocpool_id'])) 				$this->neutron_ipallocpool_id				= $data['neutron_ipallocpool_id'];
		if(isset($data['neutron_ipallocpool_fip'])) 			$this->neutron_ipallocpool_fip				= $data['neutron_ipallocpool_fip'];
		if(isset($data['neutron_ipallocpool_lip'])) 			$this->neutron_ipallocpool_lip				= $data['neutron_ipallocpool_lip'];
		if(isset($data['neutron_gre_id'])) 						$this->neutron_gre_id						= $data['neutron_gre_id'];
		if(isset($data['neutron_ml2_network_segments_id'])) 	$this->neutron_ml2_network_segments_id		= $data['neutron_ml2_network_segments_id'];
		if(isset($data['neutron_quotas_id'])) 					$this->neutron_quotas_id					= $data['neutron_quotas_id'];
		if(isset($data['neutron_router_l3_agentbindings_id'])) 	$this->neutron_router_l3_agentbindings_id	= $data['neutron_router_l3_agentbindings_id'];
		if(isset($data['neutron_securitygrouprules_id'])) 		$this->neutron_securitygrouprules_id		= $data['neutron_securitygrouprules_id'];
		if(isset($data['neutron_securitygroup_id'])) 			$this->neutron_securitygroup_id				= $data['neutron_securitygroup_id'];
	}

}

?>