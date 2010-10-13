<?php
require_once __DIR__ . '/../../TestCase.php';
require_once __DIR__ . '/../../../src/Parser/Block.php';
require_once __DIR__ . '/../../../src/Parser/Block_Interface.php';
require_once __DIR__ . '/../../../src/Parser/Parser_Interface.php';
/**
 * Block test case.
 */
class BlockTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Block
	 */
	private $Block;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();

		// TODO Auto-generated BlockTest::setUp()


		$this->Block = new Block(/* parameters */);

	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated BlockTest::tearDown()


		$this->Block = null;

		parent::tearDown ();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

}

