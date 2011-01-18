<?php
//Set Error Reporting and required PHP Settings.  We want tests to be verbose as
//possible.
error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
date_default_timezone_set('America/New_York');
//Iniitalize Autoloader (we're not require/require_once/include/include_once'ing
//anything in the development environment).
require_once 'PEAR2/Autoload.php';
\PEAR2\Autoload::initialize(realpath(__DIR__ . '/../src'));
?>
