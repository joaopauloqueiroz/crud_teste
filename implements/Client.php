<?php


require_once '../repository/Base.php';
class Client
{
    protected $name;
    protected $email;
    protected $telefone;
    protected $endereco;

    public $query;
    public function __construct()
    {
        $this->query = new Base("clientes");
    }

    public function setValues($data):array
    {
        $data = [
        "nome" => $data['name'],
        "telefone" => $data['telefone'],
        "email"  => $data['email'],
        "endereco" => $data['endereco'],
        "id" => $data['id']
        ];
        return $data;
    }

    public function setValuesInsert($data):array
    {
        $data = [
        "nome" => $data['name'],
        "telefone" => $data['telefone'],
        "email"  => $data['email'],
        "endereco" => $data['endereco'],
        ];
        return $data;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
