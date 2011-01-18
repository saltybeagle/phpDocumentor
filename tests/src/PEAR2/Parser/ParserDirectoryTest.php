<?php
/**
 * Directory test case.
 */
class ParserDirectoryTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Directory
	 */
	private $Directory;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();

		// TODO Auto-generated DirectoryTest::setUp()


		$this->Directory = new Directory(/* parameters */);

	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated DirectoryTest::tearDown()


		$this->Directory = null;

		parent::tearDown ();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

}

