<?php
require_once 'PHPUnit/Framework/TestCase.php';

/**
 * Base test case.
 */
class BaseTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var Base
	 */
	private $Base;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		$this->Base = new \PEAR2\phpDocumentor2\Tags\Base('test');
	
	}
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->Base = null;
		parent::tearDown ();
	}
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
	}
	public function testGetContents() {
		$this->assertEquals('test', $this->Base->getContents());
	}	
	/**
	 * Tests Base->setContents()
	 */
	public function testSetContents() {
		$base = new \PEAR2\phpDocumentor2\Tags\Base();
		$this->Base
			->setContents('Setting');
		$this->assertEquals('Setting', $base->getContents());
	
	}
	
	/**
	 * Tests Base->render()
	 */
	public function testRender() {
		$base = new \PEAR2\phpDocumentor2\Tags\Base();
		$this->Base
			->setContents('Render');
		$this->assertEquals('Render', $base->render());
	}

}

