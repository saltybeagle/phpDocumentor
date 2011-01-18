<?php
/**
 * Functions test case.
 */
class FunctionsTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Functions
	 */
	private $Functions;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();

		// TODO Auto-generated FunctionsTest::setUp()


		$this->Functions = new \PEAR2\phpDocumentor2\Renderer\Functions(/* parameters */);

	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated FunctionsTest::tearDown()


		$this->Functions = null;

		parent::tearDown ();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

	/**
	 * Tests Functions->render()
	 */
	public function testRender() {
		// TODO Auto-generated FunctionsTest->testRender()
		$this->markTestIncomplete ( "render test not implemented" );

		$this->Functions
			->render(/* parameters */);

	}

}

