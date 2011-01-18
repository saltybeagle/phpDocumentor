<?php
/**
 * Tutorials test case.
 */
class TutorialsTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Tutorials
	 */
	private $Tutorials;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();

		$this->Tutorials = new \PEAR2\phpDocumentor2\Renderer\Tutorials(/* parameters */);

	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated TutorialsTest::tearDown()


		$this->Tutorials = null;

		parent::tearDown ();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

	/**
	 * Tests Tutorials->render()
	 */
	public function testRender() {
		// TODO Auto-generated TutorialsTest->testRender()
		$this->markTestIncomplete ( "render test not implemented" );
		$this->Tutorials
			->render(/* parameters */);

	}

}

