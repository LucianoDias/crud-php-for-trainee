<?php 
include_once __DIR__.'/vendor/autoload.php';
define('TITLE', 'Editar- Post');
use \App\Classes\Post;


if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
   header('location: index.php?status=error'); exit;
}
// CONSULTAR O POST
$objPost = Post::getPost($_GET['id']);
// validar o post
if(!$objPost instanceof Post){
    header('location: index.php?status=error'); exit;
}


// Validação do POSt
if(isset($_POST['titulo'],  $_POST['msg'])){
   
    $objPost->titulo  =  $titulo = ucfirst(addslashes($_POST['titulo']));
    $objPost->body  =  $mensagem = $_POST['msg'];
    $objPost->ativo   =  addslashes($_POST['ativo']);
    $objPost->atualizar();
    //echo "<pre>"; print_r($objPost) ;echo"</pre>";exit;
    header('Location: index.php?status=success'); exit;
}

// inclusão das paginas 
include_once __DIR__ .'/includes/header.php';
include_once __DIR__ .'/includes/formulario.php';
include_once __DIR__ .'/includes/footer.php';