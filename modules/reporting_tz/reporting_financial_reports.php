<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

define('LANG_FILE', 'reporting.php');
require($root_path . 'include/inc_front_chain_lang.php');
require_once('gui/gui_reporting_financial_reports.php');
?>