<?php
/**
 * Projects test case.
 */
class ProjectsTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Projects
	 */
	private $Projects;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();

		// TODO Auto-generated ProjectsTest::setUp()


		$this->Projects = new \PEAR2\phpDocumentor2\Renderer\Projects(/* parameters */);

	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated ProjectsTest::tearDown()


		$this->Projects = null;

		parent::tearDown ();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

	/**
	 * Tests Projects->render()
	 */
	public function testRender() {
		// TODO Auto-generated ProjectsTest->testRender()
		$this->markTestIncomplete ( "render test not implemented" );

		$this->Projects
			->render(/* parameters */);

	}

}

