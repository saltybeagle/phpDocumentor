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

use \PEAR2\phpDocumentor2\Iterators\RegexIterator as RegexIterator;
use \PEAR2\phpDocumentor2\Iterators\ArrayReduce as ArrayReduce;

abstract class Locator
{
    protected $extensions = array('php', 'inc');

    abstract public function getIterator($path);

    public function find($path)
    {
        $pattern = '/^.+\.(?:' . join('|', $this->extensions) . ')/i';

        $iterator = $this->getIterator($path);
        $regex = new RegexIterator($iterator, $pattern, RegexIterator::GET_MATCH);

        $filter = new ArrayReduce($regex, function($match) {
            return $match[0];
        });

        return $filter;
    }
}

?>
