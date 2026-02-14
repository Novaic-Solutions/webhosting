#!/usr/bin/env python
import time
import sys
import getopt
import credentials
import os
#from credentials import get_nova_credentials_v2
#from novaclient.client import Client
from os import environ as env
#import keystoneclient.v2_0.client as ksclient

class createInstance:
	def __init__(self, id=None, service=None, serviceType=None, package=None, keypair=None):
		self.id = id
		self.service = service
		self.serviceType = serviceType
		self.package = package
		self.keypair = keypair
	#############################################################################
	########## Creates the proper string for service type and Flavor ############
	#############################################################################
	def create_instance():
		nova_client = credentials.get_nova_creds()
		totalService = self.service+self.serviceType
		key = self.gen_keypair(self.id)
		fla = totalService+self.package
		network = totalService+"-net"
		###################################################################################################
		###################################################################################################
		###################################################################################################
		image = { 'CHMC': 'MCUbuntu',
				}
		#bukkit, vanilla, tekkit, hexxit, ftb, spigot
		serverName = totalService+"-"+self.id
		networks = nova_client.networks.find(label=network)
		nics = [{'net-id': networks.id}]
		image = nova_client.images.find(name=image[totalService]) #Setup different MC images with the different addons that are required, or perhaps just a basic image and then a script can be ran after that will move them over.
		# will also need to put checks into place to ensure that the server is actually live. Look into how we check for down URLS on the app manager software.
		flavor = nova_client.flavors.find(name=fla)
		instance = nova_client.servers.create(name=serverName, image=image, flavor=flavor, key_name=key, nics=nics) # returns self._boot(resource_url, response_key, *boot_args, **boot_kwargs)
		time.sleep(30)
		if serverName in nova_client.servers.list()
			return TRUE
		else
			return FALSE
			
###################################################################################################
###################################################################################################
###################################################################################################	
	
	def gen_keypair(custID):
		nova_client = credentials.get_nova_creds()
		keypair_name = custID
		private_key_filename = "/opt/keys/"+custID
		keypair = nova_client.keypairs.create(name=keypair_name)
		print keypair.private_key
		###################################################################
		fp = os.open(private_key_filename, os.O_WRONLY | os.O_CREAT, 0o600)
		with os.fdopen(fp, 'w') as f:
			f.write(keypair.private_key)
		return keypair_name
###################################################################################################
###################################################################################################
###################################################################################################

