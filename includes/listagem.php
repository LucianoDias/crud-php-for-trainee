<!-- RESULTADO DA TABELA --> 
<?php 
    $mensagens = '';

    if(isset($_GET['status'])){
        if($_GET['status'] ==='success'){
            $mensagens = '<div class="alert alert-success">Ação executada com sucesso</div>';
        }
        if($_GET['status'] ==='error'){
            $mensagens = '<div class="alert alert-danger">Ação não executada </div>';
        }
    }

    $resultado = "";
    foreach($posts as $post){
        $resultado .= '<tr>
                            <td>'.$post->id.'</td>
                            <td>'.$post->titulo.'</td>
                            <td>'.($post->ativo === 'S' ? 'Ativa':'Inativo').'</td>
                            <td>'.date("d/m/Y H:i:s", strtotime($post->data)).'</td>
                            <td>
                            <a href="editar.php?id='.$post->id.'" class="btn btn-info btn-sm">Editar</a>
                            <a href="del.php?id='   .$post->id.'" class="btn btn-danger btn-sm">Deleta</a>
                            </td>
                       </tr>';
    }

?>
<!-- --> 

<!--##############################################################################################-->  
<main>
    <section>
        <div class="bg-dark text-light">
            <div class="card-body">
                <h5 class="card-title  text-center">Lista de Posts</h5>
            </div>
        </div><br>
        <?= $mensagens;?>
        <a href="cadastrar.php" class="btn btn-primary">Novo Post</a>
    </section><br>

<?php if(count($posts) > 0):?>
    <table class="table bg-light table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Status</th>
            <th scope="col">Data</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?= $resultado;?>
        </tbody>
    </table>
<?php else: echo "<div>Não tem registro </div>"; endif;?>
<!--##############################################################################################--> 