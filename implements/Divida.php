<?php


require_once '../repository/Base.php';
class Divida
{
    protected $identificador;
    protected $valor;
    protected $vencimento;
    protected $descricao;
    

    public $query;
    public function __construct()
    {
        $this->query = new Base("dividas");
    }

    public function setValues($data):array
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


    public function setValuesInsert($data):array
    {
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

    /**
     * Get the value of identificador
     */
    public function getIdentificador()
    {
        return $this->identificador;
    }

    /**
     * Set the value of identificador
     *
     * @return  self
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;

        return $this;
    }

    /**
     * Get the value of valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of vencimento
     */
    public function getVencimento()
    {
        return $this->vencimento;
    }

    /**
     * Set the value of vencimento
     *
     * @return  self
     */
    public function setVencimento($vencimento)
    {
        $this->vencimento = $vencimento;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
}
