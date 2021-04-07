<?php 
namespace App\Db;
use \PDO;
use \PDOException;

class Database {
    const HOST = 'localhost';
    const NAME = "crud-php";
    const USER = 'root';
    const PASS = '';

    /** Nome da tabela no banco  @var string*/
    private $table;
    /** Instancia de conexao com banco  @var PDO*/
    private $connection;

    /** Na instancia da classe defina a tabela   */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /** Método criar conexão com banco de dados */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:dbname='.SELF::NAME.';host='.self::HOST, self::USER,self::PASS);
            /** se DER ERRO VOLTA ESSA STRING */
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /** Método  que exevuta a query no banco de dado 
     * @param string $query  @param array $params
     * @return PDOStatement
     */
    public function executarSql($query, $params = []){
        try{
           $statement = $this->connection->prepare($query);
           $statement->execute($params);
           return $statement;

        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }

    }

    /** Método para inserir os dados no banco
     * @param array  $valores [ field => value ]
     * @return integer  retorna o ID do post
     */
    public function inserir($valores){
        
        // dados da query
        $campos = array_keys($valores);
        $values = array_values($valores);
        // pega a quantidade no array para fazer os binds de valores
        $binds = array_pad([], count($campos), '?');
       
        $query = 'INSERT INTO '.$this->table.' ('.implode(', ',$campos).') VALUES ('.implode(', ', $binds).')';
        // executar o insert
        $this->executarSql($query, $values);
        return  $this->connection->lastInsertId();
    }

    /** Executar a consulta do banco */
    public function buscarPosts($where = null, $order = null, $limit = null, $fileds = '*'){
        // ddos da query
       
         $where  = strlen($where) ? " WHERE ".$where : "";
         $order  = strlen($order) ? " ORDER BY ".$order : "";
         $limit  = strlen($limit) ? " LIMIT ".$limit : "";
         $query = 'SELECT ' .$fileds. ' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
         return $this->executarSql($query);
    }

    // atualiza no banco de dados
    public function update($where, $values){
        $fields = array_keys($values);
        $query = 'UPDATE '.$this->table.' SET '.implode(' =?, ', $fields).' =?  WHERE '.$where;
        $this->executarSql($query, array_values($values));
        return true;
    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->executarSql($query);
        return true;
    }


}
