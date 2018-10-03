<?php


require_once '../repository/Base.php';
class Client
{
    public $query;
    public function __construct()
    {
        
        $this->query = new Base("clientes");
    }
}
