<?=$header?>
    <br/>
    <br/>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ingresar los datos del comentario</h5>
            <p class="card-text">
                <form method="post" action="<?=site_url('/guardarC')?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" value="<?=old('nombre')?>"
                            class="form-control" type="text" name="nombre">
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input id="correo" value="<?=old('correo')?>"
                            class="form-control" type="text" name="correo">
                    </div>

                    <div class="form-group">
                        <label for="comentario">Comentario:</label>
                        <input id="comentario" value="<?=old('comentario')?>"
                            class="form-control" type="text" name="comentario">
                    </div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                        <a href="<?=base_url('listarC');?>" class="btn btn-info">Cancelar</a>
                </form>
            </p>
        </div>
    </div>
<?=$footer?>