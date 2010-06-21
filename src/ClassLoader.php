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

/**
 * Class auto loader
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */
class ClassLoader
{
    /**
     * The namespace prefix that must be matched before attempting to load
     * a file.
     *
     * @var string
     */
    protected $namespace = 'PEAR2\phpDocumentor2';

    /**
     * Directory path to the class files.
     *
     * @var string
     */
    protected $path = __DIR__;

    /**
     * Load a class file.
     *
     * @param string $className name of the class
     *
     * @return void
     */
    public function loader($className)
    {
        if (strpos($className, $this->namespace) !== 0) {
            return;
        }

        $classFile = str_replace($this->namespace, '', $className);
        $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $classFile);
        $classFile = $this->path . $classFile . '.php';

        include_once $classFile;
    }

    /**
     * Register this instance on the SPL autoloader stack.
     *
     * @return void
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loader'));
    }

    /**
     * Unregister this instance from the SPL autoloader stack.
     *
     * @return void
     */
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loader'));
    }
}

?>
