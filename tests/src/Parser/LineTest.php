<?php
require_once __DIR__ . '/../../TestCase.php';
require_once __DIR__ . '/../../../src/Parser/Line.php'
require_once __DIR__ . '/../../../src/Parser/Line_Interface.php';
require_once __DIR__ . '/../../../src/Parser/Parser_Interface.php';

/**
 * Line test case.
 */
class LineTest extends TestCase {
	
	/**
	 * @var Line
	 */
	private $Line;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated LineTest::setUp()
		

		$this->Line = new Line(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated LineTest::tearDown()
		

		$this->Line = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

}

