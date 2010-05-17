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

/**
 * A Resource is an object (file, function, class, property) that can have
 * documentation and nested resources.
 *
 * @category  ToolsAndUtilities
 * @package   PhpDocumentor
 * @author    PhpDocumentor Team
 * @copyright 2010 PhpDocumentor Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.phpdoc.org
 * @link      http://pear.php.net/PhpDocumentor
 */
abstract class Resource {
	/**
	 * A collection of child Resources.
	 *
	 * @var array
	 */
	protected $_children = array();

	/**
	 * The name of this resource.
	 *
	 * @var string
	 */
	protected $_name;

	/**
	 * The namespace this resource belongs too (if any).
	 *
	 * @var string
	 */
	protected $_namespace;

	/**
	 * The parent resource for this object.
	 *
	 * @var \pear2\PhpDocumentor\Resource
	 */
	protected $_parent;
}

?>
