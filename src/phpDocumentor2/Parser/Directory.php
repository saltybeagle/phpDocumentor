<?php

namespace PEAR2\phpDocumentor2\Parser;
use PEAR2\phpDocumentor2\Parser\File as File;

class Directory implements Directory_Interface {

    protected $_directory;
    protected $_childDirectories = array();
    protected $_childFiles = array();
    protected $_populated = false;

    public function __construct($directory = null) {
        empty($directory) || $this->setDirectory($directory);
    }

    protected function _populateChildren() {
        if (empty($this->_directory)) {
            throw new Exception('No Directory Set');
        }
        $dir = new SplDirectoryIterator($this->_directory);
        foreach ($dir as $entry) {
            if ($entry->isDot()) {
                continue;
            }
            if ($entry->isDir()) {
                $this->childDirectories[] = new self((string) $entry);
            } else if ($entry->isFile() && !$entry->isLink()) {
                //@todo Make this overwritable with a different classname/path
                $this->childFiles[] = new File((string) $entry);
            }
        }
        $this->_populated = true;

    }

    public function getDirectory() {
        return $this->_directory;
    }

    public function setDirectory($directory) {
        if (empty($directory) || is_dir($directory))
        {
            throw new Exception('No Directory passed or value passed was not a directory');
        }
        $this->_directory = $directory;
    }

    public function getChildren() {
        return $this->_children;
    }
}