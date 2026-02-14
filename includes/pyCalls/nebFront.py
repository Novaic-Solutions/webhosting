import sys
import getopt
import argparse
import createInstace
import credentials
import keystAdd
import networkCalls
import utils
parser = argparse.ArgumentParser()
#Customer ID#
parser.add_argument("--id", help="ID of the customer in the database", type=int)
#Service Purchased#
parser.add_argument("--service", help="The service the customer has signed up for.")
#Service Type Purchased#
parser.add_argument("--serviceType", help="Service Type that the customer has purchased. IE Cloud Hosting(PAAS), Dedicated Service(IAAS), or Service(SAAS)")
#PAckage Level#
parser.add_argument("--package", help="Package Level of the service that the customer has purchased.")
parser.add_argument("--keypair", help="SSH Key Pair for the instance.")
#Add the arguments into a list?#
args = parser.parse_args()
###################################################################################################
###################################################################################################
###################################################################################################
if args.id:
	id = args.id #gets the ID from args
if args.service:
	service = args.service #gets the service from args
if args.service_type:
	service_type = args.serviceType #gets the service type from args
if args.package:
	package = args.package #gets the package level from args
if args.key:
	key = args.keypair
if args.network:
	network = service+service_type+"-net" # gets the name of the network to use
if args totalService:
	totalService = serivce+service_type