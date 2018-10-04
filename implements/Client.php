<?php


require_once '../repository/Base.php';
class Client
{
    public $query;
    public function __construct()
    {
        
        $this->query = new Base("clientes");
    }

    public function setValues($data):array{
    	$data = [
    	"nome" => $data['name'],
        "telefone" => $data['telefone'],
        "email"  => $data['email'],
        "endereco" => $data['endereco'],
        "id" => $data['id']
    	];
    	return $data;
    }

    public function setValuesInsert($data):array{
    	$data = [
    	"nome" => $data['name'],
        "telefone" => $data['telefone'],
        "email"  => $data['email'],
        "endereco" => $data['endereco'],
    	];
    	return $data;
    }

}
