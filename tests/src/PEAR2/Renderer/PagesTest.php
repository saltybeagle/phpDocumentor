<?php
/**
 * Pages test case.
 */
class PagesTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Pages
	 */
	private $Pages;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();

		// TODO Auto-generated PagesTest::setUp()


		$this->Pages = new \PEAR2\phpDocumentor2\Renderer\Pages(/* parameters */);

	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated PagesTest::tearDown()


		$this->Pages = null;

		parent::tearDown ();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

	/**
	 * Tests Pages->render()
	 */
	public function testRender() {
		// TODO Auto-generated PagesTest->testRender()
		$this->markTestIncomplete ( "render test not implemented" );

		$this->Pages
			->render(/* parameters */);

	}

}

