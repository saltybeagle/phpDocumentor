#!/usr/bin/env php
<?php
namespace PEAR2_tmp;
/**
 * If your package does special stuff in phar format, use this file.  Remove if
 * no phar format is ever generated
 */
if (version_compare(phpversion(), '5.3.1', '<')) {
    if (substr(phpversion(), 0, 5) != '5.3.1') {
        // this small hack is because of running RCs of 5.3.1
        echo "PEAR2_tmp/ requires PHP 5.3.1 or newer.
";
        exit -1;
    }
}
foreach (array('phar', 'spl', 'pcre', 'simplexml') as $ext) {
    if (!extension_loaded($ext)) {
        echo 'Extension ', $ext, " is required
";
        exit -1;
    }
}
try {
    Phar::mapPhar();
} catch (Exception $e) {
    echo "Cannot process PEAR2_tmp/ phar:
";
    echo $e->getMessage(), "
";
    exit -1;
}
function _autoload($class)
{
    $class = str_replace(array('_', '\\'), '/', $class);
    if (file_exists('phar://' . __FILE__ . '/PEAR2_tmp/-0.2.0/php/' . $class . '.php')) {
        include 'phar://' . __FILE__ . '/PEAR2_tmp/-0.2.0/php/' . $class . '.php';
    }
}
spl_autoload_register("PEAR2_tmp/_autoload");
$phar = new Phar(__FILE__);
$sig = $phar->getSignature();
define('PEAR2_tmp/_SIG', $sig['hash']);
define('PEAR2_tmp/_SIGTYPE', $sig['hash_type']);

// your package-specific stuff here, for instance, here is what Pyrus does:

$frontend = new \PEAR2\phpDocumentor2\Documentor();
@array_shift($_SERVER['argv']);
$frontend->run($_SERVER['argv']);

__HALT_COMPILER();
