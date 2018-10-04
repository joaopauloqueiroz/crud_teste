<?php
class Base extends PDO
{
    private $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->pdo = new PDO('mysql:localhost=;dbname=crud_teste', 'root', '180461');
        $this->table = $table;
    }

    /**
     * Metodo que recebe a query.
     *
     * @param [type] $rawQuery
     * @param array  $params
     */
    public function query($rawQuery, $params = array())
    {
        $stmt = $this->pdo->prepare($rawQuery);
        $this->setParams($stmt, $params);
        
        $stmt->execute();  
        return $stmt;
    }

    /**
     * Metodo prasetar os params.
     *
     * @param [type] $statement
     * @param array  $parameters
     */
    private function setParams($statement, $parameters = array())
    {
        foreach ($parameters as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }

    /**
     * Seta apenas um parametro.
     *
     * @param [type] $statement
     * @param [type] $key
     * @param [type] $value
     */
    private function setParam($statement, $key, $value)
    {
        $statement->bindParam($key, $value);
    }

    /**
     * Buscar todos os registros de um usuario.
     */
    public function getAll()
    {
        $stmt = $this->query("SELECT * FROM $this->table");

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Buscar um registro.
     */
    public function get($id)
    {
        $stmt = $this->query("SELECT * FROM $this->table WHERE id = :id", array(
            ':id' => $id,
        ));

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Criar um novo usuario.
     *
     * @param string $user
     * @param string $pass
     */
    public function createUser(array $data)
    {
        $res = $this->query("CALL sp_user_create (:nome, :telefone, :email, :endereco)", $data);

        return $res;
    }

        /**
         * atualiza registro do usuario
         *
         * @param array $data
         * @return void
         */
    public function updateUser(array $data)
    {
        $res = $this->query("UPDATE $this->table set nome = :nome, telefone = :telefone, email = :email, endereco = :endereco WHERE id = :id", $data);

        return $res;
    }

    /**
     * Cria uma nova divida
     *
     * @param array $data
     * @return void
     */
    public function createDivida(array $data)
    {       
       $res = $this->query('CALL sp_create_divida(:identificador, :valor, :vencimento, :descricao, :user_id)', $data);

        return $res;
    }

    /**
     * busca potr uma divida
     *
     * @param [type] $id
     * @return void
     */
    public function getDivida($id)
    { 
        $stmt = $this->query("SELECT * FROM $this->table WHERE user_id = :user_id", array(
            ':user_id' => $id,
        ));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

      public function getDividaUser($id){
        $stmt = $this->query("SELECT * FROM $this->table WHERE id = :id", array(
            ':id' => $id,
        ));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**'
     * atualiza uma divida
     */
    public function updateDivida(array $data)
    {
    $this->query("CALL sp_update (:identificador, :valor, :vencimento, :descricao, :user_id, :id)",$data);

        return $res;
    }
    /**
     * Dletar um registro
     */

     public function delete($id){
        $this->query("DELETE FROM $this->table WHERE id = :id", array(
            ":id" => $id,
        ));
     }
}
