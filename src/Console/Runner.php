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

use PEAR2\phpDocumentor2\Console\ArgumentParser,
    PEAR2\phpDocumentor2\Documentor;

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
    public function findFiles($path)
    {
    }

    /**
     * Process the command line.
     *
     * @return void
     */
    public function run()
    {
        $builder = new \PEAR2\phpDocumentor2\Documentor('/home/jlogsdon/src/zf/library/Zend/Validator/Hostname');
        $builder->run();
    }
}

?>
