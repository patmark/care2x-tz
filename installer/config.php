<?php

/*
 * Created on Aug 16, 2005
 *
 * ClearHealth config file for application installer
 */

/*
 * Application name setting
 */
$app_name = "Care2x";

/*
 * Version number
 */
$short_version = "2.2";

/*
 * Long version description
 */
$long_version = "2nd Generation Deployment 2.2";

/*
 * Directories that will be looked in for Test classes.
 * These directories will be traversed in the order they
 * are added here. This variable is optional and is intended
 * as a way to allow developers to use their own Test classes
 * and not have to pollute the installer dir with files
 *
 * The Installer will always look in the $INSTALLER_BASE/tests
 * directory for Test classes last
 */
$test_dirs = array();


/*
 * Directories that will be looked in for Action classes.
 * These directories will be traversed in the order they
 * are added here. This variable is optional and is intended
 * as a way to allow developers to use their own Actions and
 * not have to pollute the installer dir with files
 *
 * The Installer will always look in the $INSTALLER_BASE/actions
 * directory for Actions last
 */
$action_dirs = array();

/*
 * The version file defines all the known versions of the application
 * and the Tests and Actions required to go from the previous version
 * to the defined version.
 */
$version_file = realpath(dirname(__FILE__)) . '/versions.php';

/*
 * We need to ensure the class for determining the current version
 * is available here.
 */
//require_once('MyVersionCheck.class.php');

/*
 * Define the class name for the version detection class. This
 * class must extend the VersionCheck class included with the
 * installer. The class must override the getCurrentVersion()
 * method from the VersionCheck class.
 */
$version_detection_class = 'VersionCheck';

/*
 * Writable directory for smarty compile dir
 */
$writable_dir = '/tmp';
if (!file_exists($writable_dir)) {
    $writable_dir = realpath(dirname(__FILE__) . '/tmp');
}

/*
 * Template directory
 */
//$template_dir = realpath(dirname(__FILE__)).'/templates';
?>
