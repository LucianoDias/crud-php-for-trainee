<main>
    <section>
    <div class="card bg-info ">
        <div class="card-body text-center">
            <h5 class="card-title "><?php echo TITLE;?></h5>
        </div>
    </div><br>
    <a href="index.php" class="btn btn-primary">Voltar</a>
    </section> <br>

    <section>
    <form method="POST">
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="exampleInputEmail1" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" value="<?=$objPost->titulo?>">
            </div>
        </div><br>
        <div class="form-group row">
            <div class="col-sm-6">
                <label class="form-label">Mensagem</label>
               <textarea name="msg" class="form-control" cols="30" rows="4"><?=$objPost->body?></textarea>
            </div>
        </div><br>

       
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <label class="form-control bg-success" for= "ativo_s">
                            <input type="radio" name="ativo"  id="ativo_s" value="S" checked> Ativo
                        </label>
                    </div>
                    <div class="form-check form-check-inline ">
                        <label class="form-control bg-danger" for="ativo_n">
                            <input type="radio" name="ativo"  value="N" <?=$objPost->ativo === 'N' ? 'checked':''?> id="ativo_n"> Inativo
                        </label>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="form-group row">
            <div class="col-sm-6"> 
                <button type="submit" class="btn btn-success">Enviar formúlario</button>
            </div>
        </div>
</form>
    </section>
    <br><br>
</main>