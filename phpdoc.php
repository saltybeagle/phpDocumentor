#!/usr/bin/env php
<?php
/**
 * PhpDocumentor is a JavaDoc-like documentation tool for PHP.
 *
 * PHP versions 5.3
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @author	  Shawn Stratton <sstratton@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */

$__prefix__ = __DIR__ . '/src';
$__file__ = '/Documentor.php';

if ($_prefix = getenv('PHPDOC_PREFIX')) {
    $__prefix__ = $_prefix;
}

if (is_file($__prefix__ . $__file__)) {
    define('PHPDOC_PATH', $__prefix__);
} else {
    $paths = explode(PATH_SEPARATOR, get_include_path());

    foreach ($paths as $path) {
        if (is_file($path . $__file__)) {
            define('PHPDOC_PATH', $path);
            break;
        }
    }
}

if (!defined('PHPDOC_PATH')) {
    die('Unable to locate phpDocumentor installation path. '.
        'Update your include_path or set the PHPDOC_PREFIX environment variable' . "\n\n");
}

try {
    require_once PHPDOC_PATH . '/ClassLoader.php';
    $loader = new PEAR2\phpDocumentor2\ClassLoader;
    $loader->register();

    $cli = new PEAR2\phpDocumentor2\Console\Runner;
    $cli->run();
} catch (Exception $e) {
    echo '*** Error: ' . $e->getMessage() . "\n\n";
}

?>
