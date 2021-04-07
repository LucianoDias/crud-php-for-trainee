<?php 
include_once __DIR__.'/vendor/autoload.php';
define('TITLE', 'Cadastrar - Post');
use \App\Classes\Post;
$post = new Post();

// Validação do POSt
if(isset($_POST['titulo'],  $_POST['msg'])){

    $post->titulo  =  $titulo = ucfirst(addslashes($_POST['titulo']));
    $post->body  =  $mensagem = $_POST['msg'];
    $post->ativo   =  $ativo = addslashes( $_POST['ativo']);
    $post->cadastrar();
    header('Location: index.php?status=success'); exit;

}

// inclusão das paginas 
include_once __DIR__ .'/includes/header.php';
include_once __DIR__ .'/includes/formulario.php';
include_once __DIR__ .'/includes/footer.php';