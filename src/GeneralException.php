<?php
namespace PEAR2\phpDocumentor2;
use PEAR2\phpDocumentor2\Exception as ExceptionInterface;
class GeneralException extends \Exception implements ExceptionInterface
{
    protected $params;

    public function __construct($message, array $params = array())
    {
        $this->params = $params;
        parent::__construct($message);
    }
}