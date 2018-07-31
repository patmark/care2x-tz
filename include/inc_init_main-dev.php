<?php

# This is the database name
$dbname = 'caredb';
# Database user name, default is root or httpd for mysql, or postgres for postgresql
$dbusername = 'root';
# Database user password, default is empty char
$dbpassword = 'precious';
# Database host name, default = localhost
$dbhost = 'localhost';

# Hospitals Logo Filename in directory gui/img/common/default/
$hospital_logo = 'logo.gif';

#NHIF Service Credentials
#For use when integrating wiht NHIF Restful Service
#

$nhif_base = 'https://verification.nhif.or.tz/NHIFService';

#Service username
$nhif_user = '';

#NHIF service password
$nhif_pwd = '';


#A path to dcmtk toolkit installation
$dcmtk_path = '/usr/bin';


#WebERP REST Service Credentials
#For use when integrating wiht webERP Restful Service
#
$weberp_base = 'https://127.0.0.1/restservice';

#WebERP Service username
$weberp_user = '';

#WebERP Service user password
$weberp_pwd = '';

# First key used for simple chaining protection of scripts
$key = '2.67452802362E+28';

# Second key used for accessing modules
$key_2level = '2.48431445375E+26';

# 3rd key for encrypting cookie information
$key_login = '1.69264361013E+27';

# Main host address or domain
$main_domain = '';

# Host address for images
$fotoserver_ip = 'localhost';

# Transfer protocol. Use https if this runs on SSL server
$httprotocol = 'https';

# Set this to your database type. For details refer to ADODB manual or goto http://php.weblogs.com/ADODB/
$dbtype = 'mysqli';
