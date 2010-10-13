<?php
require_once __DIR__ . '/../../TestCase.php';
require_once __DIR__ . '/../../../src/Parser/Directory.php';
require_once __DIR__ . '/../../../src/Parser/Directory_Interface.php';
require_once __DIR__ . '/../../../src/Parser/Parser_Interface.php';
/**
 * Directory test case.
 */
class DirectoryTest extends TestCase {

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

