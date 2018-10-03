<?php


require_once '../repository/Base.php';
class Divida
{
    public $query;
    public function __construct()
    {
        
        $this->query = new Base("dividas");
    }
}
