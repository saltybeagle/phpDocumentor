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

namespace PEAR2\phpDocumentor2;

use PEAR2\phpDocumentor2\Console\ArgumentParser,
    PEAR2\phpDocumentor2\Console\Runner;
use PEAR2\phpDocumentor2\Parser\Tokenizer;

/**
 * A sample file for parsing
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */
class Sample
    extends \PEAR2\phpDocumentor2\Events\Dispatcher
    implements \Serializable
{
    /**
     * Example comment
     */
    public function serialize()
    {
    }

    /**
     * Example comment
     */
    public function unserialize($serialized)
    {
    }
}

function thisIsAtest() {
}

?>
