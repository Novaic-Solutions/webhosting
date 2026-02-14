#!/usr/bin/env python
from utils import print_values
import credentials
class networkCalls:
	###################################################################################################
	###################################################################################################
	###################################################################################################
	# Server and Network are passed here, and then they are used to get the corresponding ID's of each. From there, the function goes on to create a port on the Server
	def create_server_port(server,networks)
		server_id = server.id
		network_id = networks.id
		server_detail = nova_client.servers.get(server_id)
		print(server_detail.id)
		 
		if server_detail != None:
			credentials = get_credentials()
			neutron = client.Client(**credentials) # returns a dictionary of credentials
		 
			body_value = {
							 "port": {
									 "admin_state_up": True,
									 "device_id": server_id,
									 "name": "port1",
									 "network_id": network_id
							  }
						 }
			response = neutron.create_port(body=body_value)
			print(response)
	###################################################################################################
	###################################################################################################
	###################################################################################################
	# Router and Networks are psssed to the function, then used to create a new port on the corresponding router.
	def create_router_port(router,networks)
		router_id = router.id
		network_id = networks.id
		try: 
			router = neutron.show_router(router_id)
			print(router)
			body_value = {'port': {
									'admin_state_up': True,
									'device_id': router_id,
									'name': 'port1',
									'network_id': network_id,
									}	
						}
						
			response = neutron.create_port(body=body_value)
			print(response)
		finally:
			print("Execution completed")
	###################################################################################################
	###################################################################################################
	###################################################################################################