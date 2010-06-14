<?php
require_once __DIR__ . '/../../TestCase.php';
require_once __DIR__ . '/../../../src/Renderer/Tutorials.php'
require_once __DIR__ . '/../../../src/Renderer/Renderer_Interface.php';
/**
 * Tutorials test case.
 */
class TutorialsTest extends TestCase {
	
	/**
	 * @var Tutorials
	 */
	private $Tutorials;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated TutorialsTest::setUp()
		

		$this->Tutorials = new Tutorials(/* parameters */);
	
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

