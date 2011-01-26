<?php
abstract class Base {
	protected $_options = false;
	protected $_injector;
	protected $_locator;
	abstract function run();
    public function setOptions(\PEAR2\phpDocumentor2\Options $options = null) {
        $this->_options = $options ?: new \PEAR2\phpDocumentor2\Options();
    }
    public function getOptions() {
    	return $this->_options;
    }
    public function setOption($name, $value = null)
    {
    	if (!$this->_options)
    	{
    		return false;
    	}
    	return $this->_options->set($name, $value);
    }
    public function getOption($name) {
    	if (!$this->_options)
    	{
    		return false;
    	}
    	return ($this->_options->get($name));
    }

	public function _initLocator($bindings = null) {
		if (! isset ( $this->_locator )) {
			if (!is_array ( $bindings )) {
				//Parse Bindings should handle case where the bindings are a string (resource uri) or null
				$bindings = $this->_parseBindings($bindings);
			} 
				
				$this->setLocator ( new \PEAR2\Wires\Locator ( $bindings ?  : $this->_parseBindings () ) );
			}
		return $this->_locator;
	}
	public function _initInjector() {
		if (! isset ( $this->_injector )) {
			$this->setInjector ( new PEAR2_Wires_Injector ( $this->getLocator () ) );
		}
	}
	
	public function getInjector() {
		$this->_initInjector ();
		return $this->_injector;
	}
	
	public function setInjector(\PEAR2\Wires\Interfaces\Injector $injector) 
	{
		$this->_injector = $injector;
	}
	
	public function getLocator() {
		$this->_initLoader ();
		return $this->_loader;
	}
	
	public function setLocator(\PEAR2\Wires\Interfaces\Locator $locator) {
		$this->_locator = $locator;
	}
	
	protected function _parseBindings() {
	
	}
}