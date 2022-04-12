<?=$header?>
    <br/>
    <br/>
        <a class="btn btn-success" href="<?=base_url('/crear1')?>">Agregar una bebida</a>        
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

            <?php foreach($bebidas as $bebida): ?>

                <tr>
                    <td><?=$bebida['id'];?></td>
                    <td>
                        <img class="img-thumbnail" src="<?=base_url()?>/uploads/<?=$bebida['imagen'];?>" 
                        width="100" alt="">
                    </td>
                    <td><?=$bebida['nombre'];?></td>
                    <td><?=$bebida['descripcion'];?></td>
                    <td>$ <?=$bebida['precio'];?></td>
                    <td>
                        <a href="<?=base_url('editar1/'.$bebida['id'])?>" class="btn btn-info" type="button">Editar</a>    
                        <a href="<?=base_url('borrar1/'.$bebida['id'])?>" class="btn btn-danger" type="button">Borrar</a>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>
<?=$footer?>