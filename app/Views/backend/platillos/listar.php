<?=$header?>
    <br/>
    <br/>
        <a class="btn btn-success" href="<?=base_url('/crear')?>">Agregar un platillo</a>        
        <a class="btn btn-info" href="<?=base_url('/dashboard')?>">Menú de salida</a> 
    <br/>
    <br/>
        <table class="table table-gray">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($platillos as $platillo): ?>

                <tr>
                    <td><?=$platillo['id'];?></td>
                    <td>
                        <img class="img-thumbnail" src="<?=base_url()?>/uploads/<?=$platillo['imagen'];?>" 
                        width="100" alt="">
                    </td>
                    <td><?=$platillo['nombre'];?></td>
                    <td><?=$platillo['descripcion'];?></td>
                    <td>$ <?=$platillo['precio'];?></td>
                    <td>
                        <a href="<?=base_url('editar/'.$platillo['id'])?>" class="btn btn-info" type="button">Editar</a>    
                        <a href="<?=base_url('borrar/'.$platillo['id'])?>" class="btn btn-danger" type="button">Borrar</a>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>
<?=$footer?>