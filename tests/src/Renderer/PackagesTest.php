<?php
require_once __DIR__ . '/../../TestCase.php';
require_once __DIR__ . '/../../../src/Renderer/Packages.php'
require_once __DIR__ . '/../../../src/Renderer/Renderer_Interface.php';
/**
 * Packages test case.
 */
class PackagesTest extends TestCase {
	
	/**
	 * @var Packages
	 */
	private $Packages;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated PackagesTest::setUp()
		

		$this->Packages = new Packages(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated PackagesTest::tearDown()
		

		$this->Packages = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests Packages->render()
	 */
	public function testRender() {
		// TODO Auto-generated PackagesTest->testRender()
		$this->markTestIncomplete ( "render test not implemented" );
		
		$this->Packages
			->render(/* parameters */);
	
	}

}

