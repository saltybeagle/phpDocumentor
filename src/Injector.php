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

abstract class Injector
{
    protected $classes = array();

    public function __call($method, $params)
    {
        $action = strtolower(substr($method, 0, 3));
        $local = strtolower(substr($method, 3));

        if (!isset($this->classes[$local])) {
            return;
        }

        switch ($action) {
        case 'get':
            if (empty($this->{$local})) {
                $class = $this->classes[$local];
                $this->{$local} = new $class;
            }

            return $this->{$local};
        }
    }
}

?>
