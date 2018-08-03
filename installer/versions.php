<?php

require(INSTALLER_PATH . '/config.php');

# seed the random generator
srand((double) microtime() * 1000000);
$rmax = getrandmax();

$versions = new VersionSet();

$version = new Version($short_version, $long_version);

$version->addSeparator('Database Information');
$version->collectOption('db_type', 'Server Type', array('MySQL'), array('mysql'), 'mysql');
$version->collectText('db_user', 'User Name', 'root');
$version->collectPassword('db_password', 'Password', '');
$version->collectText('db_server', 'Server Address', 'localhost');
$version->collectText('db_database', 'Database Name', 'care2x');
$version->addSeparator('System Administrator User');
$version->collectText('admin_user', 'User Name', 'admin');
$version->collectPassword('admin_password', 'Password', '');
$version->collectPassword('admin_confirm', 'Password Confirm', '');
$version->addSeparator('Network Protocol and Domain');
$version->collectOption('transfer_protocol', 'Transfer Protocol', array('http', 'https'), array('http', 'https'), 'http');
$version->collectText('care2x_address', 'Care2x Host', 'localhost');
$version->addSeparator('Encryption Keys');
$version->collectText('1st_key', '1st Key', (rand(1, $rmax) . rand(1, $rmax)) * rand(1, $rmax));
$version->collectText('2nd_key', '2nd Key', (rand(1, $rmax) . rand(1, $rmax)) * rand(1, $rmax));
$version->collectText('3rd_key', '3rd Key', (rand(1, $rmax) . rand(1, $rmax)) * rand(1, $rmax));
$version->addSeparator('');

$version->addTest('PHPVersionOver', array('4.3.0'));
$version->addTest('PHPVersionUnder', array('5.2.6'));
//$version->addTest('PHPMemory', array('8M'));
//$version->addTest('PHPMagicQuotes', array('Off'));
//$version->addTest('PHPRegisterGlobals', array('Off'));
$version->addTest('PHPDBExtension', array('type_field' => 'db_type'));
$version->addTest('PHPExtension', array('calendar', 'gd'));
$version->addTest('DBVersionOver', array(
    'username_field' => 'db_user',
    'password_field' => 'db_password',
    'server_field' => 'db_server',
    'type_field' => 'db_type',
    'version' => array('mysql' => '3.23.0', 'postgres7' => '7.4.0')));
$version->addTest('AdminPasswordConfirmed', array(
    'password_field' => 'admin_password',
    'confirm_field' => 'admin_confirm'));

$version->addTest('WritableLocation', array(APP_PATH . '/counter'));
$version->addTest('WritableLocation', array(APP_PATH . '/counter/hitcount.txt'));
$version->addTest('WritableLocation', array(APP_PATH . '/fotos'));
$version->addTest('WritableLocation', array(APP_PATH . '/fotos/encounter'));
$version->addTest('WritableLocation', array(APP_PATH . '/fotos/registration'));
$version->addTest('WritableLocation', array(APP_PATH . '/fotos/news'));
$version->addTest('WritableLocation', array(APP_PATH . '/logs'));
$version->addTest('WritableLocation', array(APP_PATH . '/logs/access'));
$version->addTest('WritableLocation', array(APP_PATH . '/pharma'));
$version->addTest('WritableLocation', array(APP_PATH . '/med_depot'));
$version->addTest('WritableLocation', array(APP_PATH . '/radiology'));
$version->addTest('WritableLocation', array(APP_PATH . '/radiology/dicom_img'));
$version->addTest('WritableLocation', array(APP_PATH . '/gui'));
$version->addTest('WritableLocation', array(APP_PATH . '/gui/img'));
$version->addTest('WritableLocation', array(APP_PATH . '/gui/smarty_template/templates_c'));
$version->addTest('WritableLocation', array(APP_PATH . '/include'));
$version->addTest('WritableLocation', array(APP_PATH . '/include/inc_init_main.php'));
$version->addTest('WritableLocation', array(APP_PATH . '/installer'));
$version->addTest('WritableLocation', array(APP_PATH . '/installer/install.php'));

$version->addAction('AcceptText', 'License Agreement', array(dirname(__FILE__) . '/LICENSE'));

/* $version->addAction('SQLSchema', array(
  'username_field' => 'db_user',
  'password_field' => 'db_password',
  'server_field' => 'db_server',
  'type_field' => 'db_type',
  'db_field' => 'db_database',
  'schema' => dirname(__FILE__).'/db/schema.xml')); */

$version->addAction('SQLFile', 'Install Database Schema', array(
    'username_field' => 'db_user',
    'password_field' => 'db_password',
    'server_field' => 'db_server',
    'type_field' => 'db_type',
    'db_field' => 'db_database',
    'files' => array(dirname(__FILE__) . '/db/sql/%type%_dump.sql')));

$version->addAction('CreateAdmin', 'Create Administrator User', array(
    'username_field' => 'db_user',
    'password_field' => 'db_password',
    'server_field' => 'db_server',
    'type_field' => 'db_type',
    'db_field' => 'db_database',
    'adminuser_field' => 'admin_user',
    'adminpass_field' => 'admin_password'));

$version->addAction('ReplaceString', 'Save System Configuration', array(
    'message' => "Configuration information saved",
    'files' => array(
        dirname(__FILE__) . '/inc_init_main.php.dist' => APP_PATH . '/include/inc_init_main.php'),
    'fields' => array(
        'INSTALL_DB_USERNAME' => 'db_user',
        'INSTALL_DB_PASSWORD' => 'db_password',
        'INSTALL_DB_DATABASE' => 'db_database',
        'INSTALL_DB_SERVER' => 'db_server',
        'INSTALL_DB_TYPE' => 'db_type',
        'INSTALL_ADDRESS' => 'care2x_address',
        'INSTALL_PROTOCOL' => 'transfer_protocol',
        'INSTALL_KEY_1' => '1st_key',
        'INSTALL_KEY_2' => '2nd_key',
        'INSTALL_KEY_3' => '3rd_key')
));


$version->addAction('CSVOptions', 'Install Optional DB Tables', array(
    'username_field' => 'db_user',
    'password_field' => 'db_password',
    'server_field' => 'db_server',
    'type_field' => 'db_type',
    'db_field' => 'db_database',
    'files' => array(
        dirname(__FILE__) . '/db/icd10',
        dirname(__FILE__) . '/db/ops301')));

$version->addFinalAction('RenameFile', 'Rename Critical Installation Files', array(
    'message' => "Critical installation files renamed",
    'files' => array(
        APP_PATH . '/install/install.php' => APP_PATH . '/install/install_' . rand(1, $rmax) . '.php',
        APP_PATH . '/install/encode_pw_md5.php' => APP_PATH . '/install/encode_pw_md5_' . rand(1, $rmax) . '.php',
        APP_PATH . '/create_admin.php' => APP_PATH . '/create_admin_' . rand(1, $rmax) . '.php',
        APP_PATH . '/install/initialize.php' => APP_PATH . '/install/initialize_' . rand(1, $rmax) . '.php',
        APP_PATH . '/installer/install.php' => APP_PATH . '/installer/install_' . rand(1, $rmax) . '.php'),
));

$versions->add($version);
?>
