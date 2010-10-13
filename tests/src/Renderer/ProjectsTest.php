<?php
require_once __DIR__ . '/../../TestCase.php';
require_once __DIR__ . '/../../../src/Renderer/Projects.php';
require_once __DIR__ . '/../../../src/Renderer/Renderer_Interface.php';

/**
 * Projects test case.
 */
class ProjectsTest extends TestCase {

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


		$this->Projects = new Projects(/* parameters */);

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

