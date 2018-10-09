<?php

require_once "Client.php";
require_once "Divida.php";
class Mount
{
    public function __construct()
    {
    }

    public function setValues(Client $obj):array
    {
        $data = [
        "nome" => $obj->getName(),
        "telefone" => preg_replace("/[^0-9]/", "", $obj->getTelefone()),
        "email"  => $obj->getEmail(),
        "endereco" => $obj->getEndereco(),
        "id" => $obj->getId()
        ];
        return $data;
    }


    public function setValuesInsert(Client $data):array
    {
        $data = [
        "nome" => $data->getName(),
        "telefone" => preg_replace("/[^0-9]/", "", $data->getTelefone()),
        "email"  => $data->getEmail(),
        "endereco" => $data->getEndereco(),
        ];
        return $data;
    }

    /**
     * Prepara os dados para tualizar uma divida
     *
     * @param [type] $data
     * @return array
     */

    public function setInserDivi(Divida $data):array
    {
        $data = [
          "identificador" => $data->getIdentificador(),
          "valor" => $data->getValor(),
          "vencimento" => $data->getVencimento(),
          "descricao" => $_POST['descricao'],
          "user_id" => $_POST['user_id'],
          "id" => $_POST['update_id']
    ];

        return $data;
    }

    /**
     * Prepara os dados para inserir uma nova divida
     *
     * @param Divida $data
     * @return array
     */
    public function setValuesDivida(Divida $data):array
    {
        $data = [
      "identificador" => $_POST['identificador'],
      "valor" => $_POST['valor'],
      "vencimento" => $_POST['vencimento'],
      "descricao" => $_POST['descricao'],
      "user_id" => $_POST['id']
        ];
        return $data;
    }
}
