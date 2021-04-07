<?php 
include_once __DIR__.'/vendor/autoload.php';
use \App\Classes\Post;
$posts = Post::getPosts();


include_once __DIR__ .'/includes/header.php';
include_once __DIR__ .'/includes/listagem.php';
include_once __DIR__ .'/includes/footer.php';