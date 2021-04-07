<?php 
include_once __DIR__.'/vendor/autoload.php';
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
if(isset($_POST['excluir'])){
    $objPost->excluir();
    header('Location: index.php?status=success'); exit;
}

// inclusão das paginas 
include_once __DIR__ .'/includes/header.php';
include_once __DIR__ .'/includes/confirma-del.php';
include_once __DIR__ .'/includes/footer.php';