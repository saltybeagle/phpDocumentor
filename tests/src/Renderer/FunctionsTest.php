<?php
require_once __DIR__ . '/../../TestCase.php';
require_once __DIR__ . '/../../../src/Renderer/Functions.php';
require_once __DIR__ . '/../../../src/Renderer/Renderer_Interface.php';
/**
 * Functions test case.
 */
class FunctionsTest extends TestCase {

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


		$this->Functions = new Functions(/* parameters */);

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

