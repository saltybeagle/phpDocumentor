<?php

namespace PEAR2\phpDocumentor2;

class Exception extends \Exception
{
    protected $params;

    public function __construct($message, array $params = array())
    {
        $this->params = $params;
        parent::__construct($message);
    }
}

?>
