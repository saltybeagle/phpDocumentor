#!/usr/bin/env php
<?php
/**
 * PhpDocumentor is a JavaDoc-like documentation tool for PHP.
 *
 * PHP versions 5.3
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    Shawn Stratton <sstratton@php.net>
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */
$__prefix__ = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'src'); 
define('PHPDOC_PATH', $__prefix__);

//Require Autoloader
require 'PEAR2/Autoload.php';
//Start Autoloader
\PEAR2\Autoload::initialize(PHPDOC_PATH);

try {
    $cli = new PEAR2\phpDocumentor2\Console\Runner;
    //$cli->run();
} catch (Exception $e) {
    echo '*** Error: ' . $e->getMessage() . "\n\n";
}

?>
