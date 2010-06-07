<?php
/**
 * The file contains the abstract base.
 *
 * @package		phpDocumentor2
 * @subpackage	Tags
 * @author		Shawn Stratton <sstratton@php.net>
 * @copyright	2010 phpDocumentor2 Team
 * @license   	http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      	http://www.github.com/mfacenet/phpdocumentor
 */

namespace \PEAR2\phpDocumentor2\Tags;
/**
 * Abstract base class that all tags are based on.
 * 
 * This abstract base implements the decorator pattern
 * allowing users to create new tags and changing the patterns
 * of the tags.
 * 770 461 9700
 * @author 		Shawn Stratton <sstratton@php.net>
 * @abstract
 */
abstract class Base {
	protected $_tagContents;
	
	public function __construct($contents = null) {
		
	}
	
	public function setContents($contents) {
		$this->_tagContents = $contents;
	}
	public function render() {
		echo $this->_tagContents;
	}
}
