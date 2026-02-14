###################################################################################################
###################################################################################################
###################################################################################################
import time
import sys
import getopt
import credentials
from os import environ as env

class keystAdd:
###################################################################################################
###################################################################################################
###################################################################################################
	def __init__(self, username, password, tenant, service):
		self.tenant = tenant
		self.username = username
		self.password = password
		self.service = service
	###################################################################################################
	###################################################################################################
	###################################################################################################
	def add_keystone_creds():
	###################################################################################################
	###################################################################################################
	###################################################################################################
		keystone = credentials.get_keystone_creds()
		
		if service.find("CH") != -1:
			self.role = "SAAS_user"
		elif service.find("DE") != -1:
			self.role = "IAAS_user"
		elif service.find("SE") != -1:
			self.role = "PAAS_user"
		###################################################################################################
		###################################################################################################
		###################################################################################################	
		keystone.tenants.create(tenant_name=self.tenant,description=self.sername+" server tenant for "+self.service, enabled=True) # new tenant is created for user.
		tenantList = keystone.tenants.list() # lists all the tenants and holds them in the variable.
		usersTenant = [x for x in tenantList if x.name==self.tenant][0] # gets the tenant belonging to the new customer.
		newUser = keystone.users.create(name=self.sername, password=self.password, tenant_id=usersTenant.id) # creates a user and joins it to the tenant for the new customer.
		keystone.roles.add_user_role(newUser, self.role, usersTenant) # Adds the user to the role depending on what service has been purchased.
		
		
	def update_keystone_pass(username, oldPW, newPW):
		keystone = credentials.get_keystone_creds()
		
	def update_keystone_user(username)
		