#To authenticate against the Identity v2.0 endpoint, instantiate a keystoneclient.v_20.client.Client object:
from os import environ as env
import keystoneclient.v2_0.client as ksclient
keystone = ksclient.Client(auth_url=env['OS_AUTH_URL'],
                           username=env['OS_USERNAME'],
                           password=env['OS_PASSWORD'],
                           tenant_name=env['OS_TENANT_NAME'],
                           region_name=env['OS_REGION_NAME'])
						   
#After you instantiate a Client object, you can retrieve the token by accessing its auth_token attribute object:

keystone = ksclient.Client(...)
print keystone.auth_token

#To authenticate against an Image Service endpoint, instantiate a glanceclient.v2.client.Client object:

import glanceclient.v2.client as glclient
import keystoneclient.v2_0.client as ksclient
 
keystone = ksclient.Client(auth_url=env['OS_AUTH_URL'],
                           username=env['OS_USERNAME'],
                           password=env['OS_PASSWORD'],
                           tenant_name=env['OS_TENANT_NAME'],
                           region_name=env['OS_REGION_NAME'])
glance_endpoint = keystone.service_catalog.url_for(service_type='image')
glance = glclient.Client(glance_endpoint, token=keystone.auth_token)


#To authenticate against a Compute endpoint, instantiate a novaclient.v_1_1.client.Client object:
#To authenticate against a Compute endpoint, instantiate a novaclient.v_1_1.client.Client object:

from os import environ as env
import novaclient.v1_1.client as nvclient
nova = nvclient.Client(auth_url=env['OS_AUTH_URL'],
                       username=env['OS_USERNAME'],
                       api_key=env['OS_PASSWORD'],
                       project_id=env['OS_TENANT_NAME'],
                       region_name=env['OS_REGION_NAME'])
#Alternatively, you can instantiate a novaclient.client.Client object and pass the version number:


from os import environ as env
import novaclient
nova = novaclient.client.Client("1.1", auth_url=env['OS_AUTH_URL'],
                                username=env['OS_USERNAME'],
                                api_key=env['OS_PASSWORD'],
                                project_id=env['OS_TENANT_NAME'],
                                region_name=env['OS_REGION_NAME'])
#If you authenticate against an endpoint that uses a custom authentication back end, you must load the authentication plug-in and pass it to the constructor.

#The Rackspace public cloud is an OpenStack deployment that uses a custom authentication back end. To authenticate against this cloud, you must install the rackspace-novaclient library that contains the Rackspace authentication plug-in, called rackspace. The following Python code shows the additional modifications required to instantiate a Client object that can authenticate against the Rackspace custom authentication back end.


import novaclient.auth_plugin
import novaclient.v1_1.client as nvclient
from os import environ as env
auth_system = 'rackspace'
auth_plugin = novaclient.auth_plugin.load_plugin('rackspace')
nova = nvclient.Client(auth_url=env['OS_AUTH_URL'],
                       username=env['OS_USERNAME'],
                       api_key=env['OS_PASSWORD'],
                       project_id=env['OS_TENANT_NAME'],
                       region_name=env['OS_REGION_NAME'],
                       auth_system='rackspace',
                       auth_plugin=auth_plugin)
#If you set the OS_AUTH_SYSTEM environment variable, check for this variable in your Python script to determine whether you need to load a custom authentication back end:

import novaclient.auth_plugin
import novaclient.v1_1.client as nvclient
from os import environ as env
auth_system = env.get('OS_AUTH_SYSTEM', 'keystone')
if auth_system != "keystone":
  auth_plugin = novaclient.auth_plugin.load_plugin(auth_system)
else:
  auth_plugin = None
nova = nvclient.Client(auth_url=env['OS_AUTH_URL'],
                       username=env['OS_USERNAME'],
                       api_key=env['OS_PASSWORD'],
                       project_id=env['OS_TENANT_NAME'],
                       region_name=env['OS_REGION_NAME'],
                       auth_system=auth_system,
                       auth_plugin=auth_plugin)
					   
#To authenticate against a Networking endpoint, instantiate a neutronclient.v_2_0.client.Client object:


from os import environ as env
from neutronclient.v2_0 import client as neutronclient
neutron = neutronclient.Client(auth_url=env['OS_AUTH_URL'],
                               username=env['OS_USERNAME'],
                               password=env['OS_PASSWORD'],
                               tenant_name=env['OS_TENANT_NAME'],
                               region_name=env['OS_REGION_NAME'])
#You can also authenticate by explicitly specifying the endpoint and token:


from os import environ as env
import keystoneclient.v2_0.client as ksclient
from neutronclient.v2_0 import client as neutronclient
keystone = ksclient.Client(auth_url=env['OS_AUTH_URL'],
                           username=env['OS_USERNAME'],
                           password=env['OS_PASSWORD'],
                           tenant_name=env['OS_TENANT_NAME'],
                           region_name=env['OS_REGION_NAME'])
endpoint_url = keystone.service_catalog.url_for(service_type='network')
token = keystone.auth_token
neutron = neutronclient.Client(endpoint_url=endpoint_url, token=token)
