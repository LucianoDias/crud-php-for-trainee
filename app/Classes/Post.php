<?php 
namespace App\Classes;

use App\Db\Database;
use \PDO;


class Post {

    /** * Indetificado unico do post  * @var integer */
    public $id;
    /** * Titulo do post * @var string  */
    public $titulo;
    /** * Corpo da mensagem do post * @var string  */
    public $body;
    /** * definir ser o post e ativo ou não  * @var string('S','N')  */
    public $ativo;
    /**  * data de publicação do post * @var string */
    public $data;

    /**  * Método para cadastrar novo post * @return boolean */
    public function cadastrar(){
        $this->data = date("Y-m-d H:i:s");
        $objDatabase  = new Database('posts');
       // echo "<pre>";  print_r($objDatabase) ;  echo "</pre>"; exit;
       $this->id = $objDatabase->inserir([
           'titulo' => $this->titulo,
           'body'   => $this->body,
           'ativo'  => $this->ativo,
           'data'   => $this->data
       ]);
       // debug a insta com objeto inserido
       //echo "<pre>";  print_r($this) ;  echo "</pre>"; exit;
       return true;
    }

    public function atualizar(){
        return (new Database('posts'))->update("id  = ".$this->id, [
            'titulo' => $this->titulo,
            'body'   => $this->body,
            'ativo'  => $this->ativo,
            'data'   => $this->data
        ]);
    }

    /** Método busca todas os posts
     * @param string $where  @param string $order @param string $limit
     * @return array
     */
    public static function getPosts($where = null, $order = null, $limit = null){
        return (new Database('posts'))->buscarPosts($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);

    }

    // buscar post
    public static function getPost($id){
        return (new Database('posts'))->buscarPosts("id = ".$id)->fetchObject(self::class);
    }

    public function excluir(){
        return (new Database('posts'))->delete("id =".$this->id);
        return true;
    }

   

}

