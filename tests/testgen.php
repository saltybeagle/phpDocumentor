<?php

$base = dirname(__DIR__) . '/src';
$dirs = new RecursiveDirectoryIterator($base);
$iter = new RecursiveIteratorIterator($dirs);

foreach ($iter as $file) {
    $path = $file->getPathname();
    $name = $file->getBasename();

    if (substr($name, -4) != '.php') {
        continue;
    }

    $class = 'PEAR2/phpDocumentor2' . str_replace($base, '', $path);
    $class = str_replace('.php', '', $class);
    $class = str_replace('/', '\\', $class);

    $testFile = str_replace($base, __DIR__ . '/src', $path);
    $testFile = str_replace('.php', 'Test.php', $testFile);
    $testDir = dirname($testFile);
    $testClass = str_replace('.php', '', $name) . 'Test';

    if (!is_dir($testDir)) {
        mkdir($testDir, 0755, true);
    }

    if (is_file($testFile)) {
        echo "Do you wish to overwrite the {$class} test? [Y/n] ";
        $answer = trim(fgets(STDIN));

        if (strcasecmp($answer, "n") === 0) {
            continue;
        }
    }

    $testContents = <<<CONTENTS
<?php

/**
 * PhpDocumentor is a JavaDoc-like documentation tool for PHP.
 *
 * PHP versions 5.3
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */

use $class;

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * Test cases for $class
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */
class $testClass extends PHPUnit_Framework_TestCase
{
}

?>
CONTENTS;

    file_put_contents($testFile, $testContents);
}

?>
