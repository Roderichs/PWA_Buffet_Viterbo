<?=$header?>
    <br/>
    <br/>
        <a class="btn btn-info" href="<?=base_url('/dashboard')?>">Menú de salida</a> 
    <br/>
    <br/>
        <table class="table table-gray">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Comentarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($comentarios as $comentario): ?>

                <tr>
                    <td><?=$comentario['id'];?></td>
                    <td><?=$comentario['nombre'];?></td>
                    <td><?=$comentario['correo'];?></td>
                    <td><?=$comentario['comentario'];?></td>
                    <td>
                        <a href="<?=base_url('borrarC/'.$comentario['id'])?>" class="btn btn-danger" type="button">Borrar</a>
                    </td>
                </tr>

         <?php endforeach; ?>

            </tbody>
        </table>
<?=$footer?>