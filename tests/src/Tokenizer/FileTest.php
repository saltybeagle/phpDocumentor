<?php
require_once __DIR__ . '/../../TestCase.php';
require_once __DIR__ . '/../../../src/Tokenizer/File.php'
require_once __DIR__ . '/../../../src/Tokenizer/File_Interface.php';

/**
 * File test case.
 */
class FileTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var File
	 */
	private $File;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated FileTest::setUp()
		

		$this->File = new File(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated FileTest::tearDown()
		

		$this->File = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

}

