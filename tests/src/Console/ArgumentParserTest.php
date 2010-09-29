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

use PEAR2\phpDocumentor2\Console\ArgumentParser as ArgumentParser;

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * Test cases for PEAR2\phpDocumentor2\Console\ArgumentParser
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */
class ArgumentParserTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test setting, parsing and getting of flags.
     *
     * @return void
     */
    public function testFlags()
    {
        $parser = new ArgumentParser();
        $parser->addFlag(array('short' => 'v'));
        $parser->parse(array('-v'));
        $this->assertTrue($parser->hasFlag('v'));

        $parser = new ArgumentParser();
        $parser->addFlag(array('long' => 'verbose'));
        $parser->parse(array('--verbose'));
        $this->assertTrue($parser->hasFlag('verbose'));

        $parser = new ArgumentParser();
        $parser->addFlag(array('long' => 'verbose', 'short' => 'v'));
        $parser->parse(array('--verbose'));
        $this->assertTrue($parser->hasFlag('v'));
        $parser->parse(array('-v'));
        $this->assertTrue($parser->hasFlag('verbose'));
    }

    /**
     * Test setting, parsing and getting of options.
     *
     * @return void
     */
    public function testOptions()
    {
        $parser = new ArgumentParser();
        $parser->addOption(array('short' => 'p', 'long' => 'prefix'));
        $parser->parse(array('-p', 'home'));
        $this->assertEquals('home', $parser->getOption('p'));

        $parser->parse(array('--prefix', 'home'));
        $this->assertEquals('home', $parser->getOption('prefix'));

        $this->setExpectedException('InvalidArgumentException');
        $parser->parse(array('--prefix'));
    }

    /**
     * Test setting, parsing and getting of stackable flags.
     *
     * @return void
     */
    public function testStacks()
    {
        $parser = new ArgumentParser();
        $parser->addStack(array('short' => 'd'));
        $parser->parse(array('-ddddd'));
        $this->assertEquals(5, $parser->getStack('d'));

        $parser = new ArgumentParser();
        $parser->addStack(array('short' => 'd', 'max' => 3));
        $parser->parse(array('-ddddd'));
        $this->assertEquals(3, $parser->getStack('d'));
    }
}

?>
