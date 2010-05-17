<?php
/**
 * PhpDocumentor is a JavaDoc-like documentation tool for PHP.
 *
 * @category  ToolsAndUtilities
 * @package   PhpDocumentor
 * @author    PhpDocumentor Team
 * @copyright 2010 PhpDocumentor Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @filesource
 * @link      http://www.phpdoc.org
 * @link      http://pear.php.net/PhpDocumentor
 */

namespace pear2\PhpDocumentor;

use \pear2\PhpDocumentor\Resources\File;
use \pear2\PhpDocumentor\Resources\Object;
use \pear2\PhpDocumentor\Resources\Method;
use \pear2\PhpDocumentor\Resources\Variable;
use \pear2\PhpDocumentor\Resources\Constant;

/**
 * Takes a file path and tokenizes the contents.
 *
 * @category  ToolsAndUtilities
 * @package   PhpDocumentor
 * @author    PhpDocumentor Team
 * @copyright 2010 PhpDocumentor Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.phpdoc.org
 * @link      http://pear.php.net/PhpDocumentor
 */
class Tokenizer {
	public function toResource($path) {
		$source = @file_get_contents($path);

		if (!$source) {
			throw new Exception('Unable to load file for tokenizing (' . $path . ')');
		}

		$resource = new File($path);
		$tokens = token_get_all($source);

		return $resource;
	}
}

?>
