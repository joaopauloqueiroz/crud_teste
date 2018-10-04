<?php


require_once '../repository/Base.php';
class Divida
{
    public $query;
    public function __construct()
    {
        
        $this->query = new Base("dividas");
    }

    public function setValues($data):array{
    	$data = [
      "identificador" => $_POST['identificador'],
      "valor" => $_POST['valor'],
      "vencimento" => $_POST['vencimento'],
      "descricao" => $_POST['descricao'],
      "user_id" => $_POST['id']
    	];
		return $data;
    }


    public function setValuesInsert($data):array{
    	$data = [
    	  "identificador" => $_POST['identificador'],
	      "valor" => $_POST['valor'],
	      "vencimento" => $_POST['vencimento'],
	      "descricao" => $_POST['descricao'],
	      "user_id" => $_POST['user_id'],
	      "id" => $_POST['update_id']
  ];

  return $data;
    }
}
