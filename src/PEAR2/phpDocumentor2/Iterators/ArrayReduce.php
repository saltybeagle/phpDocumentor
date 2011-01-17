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

namespace PEAR2\phpDocumentor2\Iterators;

class ArrayReduce extends \IteratorIterator
{
    protected $reducer;

    public function __construct($iterator, $reducer)
    {
        if (!is_callable($reducer)) {
            throw new Exception('must pass valid reducer callback to this iterator');
        }

        $this->reducer = $reducer;
        parent::__construct($iterator);
    }

    public function current()
    {
        return call_user_func($this->reducer, parent::current());
    }
}

?>
