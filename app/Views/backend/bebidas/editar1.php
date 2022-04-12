<?=$header?>
    <br/>
    <br/>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ingresar los datos de la bebida</h5>
            <p class="card-text">
                <form method="post" action="<?=site_url('/actualizar1');?>" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" value="<?=$bebida['id']?>">
            
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" value="<?=$bebida['nombre']?>" class="form-control" type="text" name="nombre">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input id="descripcion" value="<?=$bebida['descripcion']?>" class="form-control" type="text" name="descripcion">
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input id="precio" value="<?=$bebida['precio']?>" class="form-control" type="text" name="precio">
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <br/>
                        <img class="img-thumbnail" 
                            src="<?=base_url()?>/uploads/<?=$bebida['imagen'];?>" 
                            width="100" alt="">
                        <input id="imagen" class="form-control-file" type="file" name="imagen">
                    </div>
                    <button class="btn btn-success" type="submit">Actualizar</button>
                        <a href="<?=base_url('listar1');?>" class="btn btn-info">Cancelar</a>
                </form>
            </p>
        </div>
    </div>
<?=$footer?>