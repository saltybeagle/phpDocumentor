<?php
require_once __DIR__ . '/../../TestCase.php';
require_once __DIR__ . '/../../../src/Renderer/Classes.php';
require_once __DIR__ . '/../../../src/Renderer/Renderer_Interface.php';
/**
 * Classes test case.
 */
class ClassesTest extends TestCase {

	/**
	 * @var Classes
	 */
	private $Classes;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();

		// TODO Auto-generated ClassesTest::setUp()


		$this->Classes = new Classes(/* parameters */);

	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated ClassesTest::tearDown()


		$this->Classes = null;

		parent::tearDown ();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

	/**
	 * Tests Classes->render()
	 */
	public function testRender() {
		// TODO Auto-generated ClassesTest->testRender()
		$this->markTestIncomplete ( "render test not implemented" );

		$this->Classes
			->render(/* parameters */);

	}

}
