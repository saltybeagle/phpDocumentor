<?php
/**
 * PhpDocumentor is a JavaDoc-like documentation tool for PHP.
 *
 * PHP versions 5.3
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    Shawn Stratton <sstratton@php.net>
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */

namespace PEAR2\phpDocumentor2;

use PEAR2\phpDocumentor2\Injector as Injector,
    PEAR2\phpDocumentor2\Locatorn as Locator;

/**
 * Documentation builder
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    Shawn Stratton <sstratton@php.net>
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */
class Documentor extends Injector
{
    protected $classes = array(
        'locator' => 'PEAR2\phpDocumentor2\Locator\RegexLocator',
        'renderer' => 'PEAR2\phpDocumentor2\Renderer\PhpTemplate',
        'storage' => 'PEAR2\phpDocumentor2\Storage\SmartStorage',
        'parser' => 'PEAR2\phpDocumentor2\Parser\Parser',
    );

    protected $locator;

    protected $parser;

    protected $path;

    public function __construct($path)
    {
        if (!is_dir($path)) {
            throw new Exception('Invalid path', compact('path'));
        }

        $this->path = $path;
    }

    public function run()
    {
        $files = $this->getLocator()->find($this->path);

        foreach ($files as $file) {
            $this->getParser()->parse($file);
        }
    }
}

?>
