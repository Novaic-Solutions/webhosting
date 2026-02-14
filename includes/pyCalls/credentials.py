from os import environ as env
import novaclient
import keystoneclient.v2_0.client as ksclient
import glanceclient.v2.client as glclient
from neutronclient.v2_0 import client as neutronclient
###################################################################################################
###################################################################################################
###################################################################################################
class credentials:
	def get_nova_creds():
		nova = novaclient.client.Client("1.1", auth_url=env['http://10.1.10.150:35357/v2.0'],
										username=env['admin'],
										api_key=env['Z3M00nchyk1nzexport'],
										project_id=env['admin'],
										region_name=env['regionOne'])
		return nova
	###################################################################################################
	###################################################################################################
	###################################################################################################
	def get_keyst_creds():	
		keystone = ksclient.Client(auth_url=env['http://10.1.10.150:35357/v2.0'],
								   username=env['admin'],
								   password=env['Z3M00nchyk1nzexport'],
								   tenant_name=env['admin'],
								   region_name=env['regionOne'])
		return keystone
	###################################################################################################
	###################################################################################################
	###################################################################################################
	def get_glance_creds():
		glance_endpoint = keystone.service_catalog.url_for(service_type='image')
		glance = glclient.Client(glance_endpoint, token=keystone.auth_token)
		return glance
		###################################################################################################
	###################################################################################################
	###################################################################################################
	def get_neutron_creds():
		neutron = neutronclient.Client(auth_url=env['http://10.1.10.150:35357/v2.0'],
									   username=env['admin'],
									   password=env['Z3M00nchyk1nzexport'],
									   tenant_name=env['admin'],
									   region_name=env['regionOne'])
		return neutron