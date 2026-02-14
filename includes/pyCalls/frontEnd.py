import os
import sys
import getopt
import argparse
import credentials
import createInstance
import keystAdd
import networkCalls
import utils
#from credentials import get_nova_credentials_v2
#from novaclient.client import Client
from os import environ as env

checker = True

while checker is True:
	parser = argparse.ArgumentParser()
	parser.add_argument("--task", help="What are you trying to do with openstack. EX: createInstance")
	parser.add_argument("--id", help="Customer's ID")
	parser.add_argument("--username", help="Username of the customer")
	parser.add_argument("--password", help="The Customers' Password")
	parser.add_argument("--service", help="Service that the customer has purchased")
	parser.add_argument("--serviceType", help="Service type that the customer purchased")
	parser.add_argument("--package", help="Package level of the service")
	parser.add_argument("--keypair", help="Keypair generated for the customer")
	parser.add_argument("--tenant", help="Tenant to be created")
	parser.add_argument("--role", help="New role to be created")
	parser.add_argument("--server", help="New server object to create a server port for")
	parser.add_argument("--network", help="Network object in which to add a new router or server port to")
	parser.add_argument("--router", help="New router to create on a given network")
	args = parser.parse_args()

	if args.task is not None
		if args.task is "createInstance"
			if args.keypair is not None
				newInstance = createInstance(args.id, args.service, args.serviceType, args.package, args.keypair)
				instance = newInstance.create_instance()
				print instance
				checker = False
				break
			elif args.keypair is None
				newInstance = createInstance(args.id, args.service, args.serviceType, args.package)
				print newInstance.create_instance()
				checker = False
				break
		elif args.task is "keystAdd"
			newKeystone = keystAdd(args.tenant, args.username, args.password, args.service)
			keyst = newKeystone.add_keystone_creds()
			print keyst
			checker = False
			break
		elif args.task is "networkCalls"
			if args.server is not None and args.router is not None
				newNetServPort = networkCalls.create_server_port(args.server, args.network)
				print newNetServPort
				newNetRouter = networkCalls.create_router_port(args.router, args.network)
				print newNetRouter
				checker = False
				break
			elif args.router is not None and args.server is None
				newNetRouter = networkCalls.create_router_port(args.router, args.network)
				print newNetRouter
				checker = False
				break
			elif args.server is not None and args.router is None
				newNetServPort = networkCalls.create_server_port(args.server, args.network)
				print newNetServPort
				checker = False
				break	
		else
			print "Error or the task entered was incorrect. The entry is case sensitive!"
			break
	else
		print args
		checker = False
		break
		