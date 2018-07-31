<?php

# This is the database name
#$dbname = 'caredb';
$dbname = 'caredb';
$weberp_db = 'weberp';
# Database user name, default is root or httpd for mysql, or postgres for postgresql
$dbusername = 'c2xdev';
# Database user password, default is empty char
$dbpassword = 'c2xdev';
# Database host name, default = localhost
$dbhost = 'localhost';

# Hospitals Logo Filename in directory gui/img/common/default/
$hospital_logo = 'government.png';

#NHIF Service Credentials
#For use when integrating wiht NHIF Restful Service
#
//Old NHIF Base
//$nhif_base = 'https://verification.nhif.or.tz/NHIFService';


$verification_token_url = 'https://verification.nhif.or.tz/nhifservice/Token';
$verification_service_url = 'https://verification.nhif.or.tz/nhifservice/breeze/';

$claims_token_url = 'https://verification.nhif.or.tz/claimsserver/Token';
$claims_api_url = 'https://verification.nhif.or.tz/claimsserver/api/v1/';


#Service username
$nhif_user = '';

#NHIF service password
$nhif_pwd = '';

#WebERP REST Service Credentials
#For use when integrating wiht webERP Restful Service
#
#$dcmtk_path = '/usr/local/dcmtk/3.6.0/bin';
$dcmtk_path = '/usr/bin/';

$weberp_base = 'http://localhost/weberp_aicc/api/api_xml-rpc.php';

$weberp_api_user = '';

$weberp_api_pass = '';

# First key used for simple chaining protection of scripts
$key = '2.67452802362E+28';

# Second key used for accessing modules
$key_2level = '2.48431445375E+26';

# 3rd key for encrypting cookie information
$key_login = '1.69264361013E+27';

#Default timezone
date_default_timezone_set('Africa/Nairobi');

# Main host address or domain
$main_domain = '';

# Host address for images
$fotoserver_ip = 'localhost';

# Transfer protocol. Use https if this runs on SSL server
$httprotocol = 'http';

# Set this to your database type. For details refer to ADODB manual or goto http://php.weblogs.com/ADODB/
$dbtype = 'mysqli';
