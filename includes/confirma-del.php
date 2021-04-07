<main>
    <section>
    <div class="card bg-dark ">
        <div class="card-body ">
            <h5 class="card-title ">Ecluir post</h5>
        </div>
    </div><br>
    </section> <br>

    <section>
    <form method="POST">
        <div class="form-group row">
            <div class="col-sm-6">
             <div class="alert alert-danger text-center">
             <h5>Você deseja realmente excluir o <strong><?=$objPost->titulo;?></strong> ?</h5>
             </div>
            
            </div>
        </div><br><br>

        <div class="form-group row">
            <div class="col-sm-6"> 
                <a href="index.php" class="btn btn-primary">Cancelar</a>
                <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
            </div>
        </div>
</form>
    </section>
    <br><br>
</main>