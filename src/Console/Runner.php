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

namespace PEAR2\phpDocumentor2\Console;

use PEAR2\phpDocumentor2\Console\ArgumentParser;

/**
 * Command line runner
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */
class Runner
{
    /**
     * Instance of an ArgumentParser.
     *
     * @var PEAR2\phpDocumentor2\Console\ArgumentParser
     */
    protected $parser;

    /**
     * Process the command line.
     *
     * @return void
     */
    public function run()
    {
        $parser = $this->getParser();
    }

    /**
     * Sets the argument parser. Argument parsers must extend the base class
     * PEAR2\phpDocumentor2\Console\ArgumentParser.
     *
     * @param ArgumentParser $parser an ArgumentParser instance
     *
     * @return void
     */
    public function setParser(ArgumentParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Get the ArgumentParser for this instance. If one has not been injected
     * instantiate the default.
     *
     * @return PEAR2\phpDocumentor2\Console\ArgumentParser the ArgumentParser instance
     */
    public function getParser()
    {
        if (empty($this->parser)) {
            $this->parser = new ArgumentParser();
        }

        return $this->parser;
    }
}

?>
