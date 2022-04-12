<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">

    <!-- Etiquetas -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<br/>
<br/>

<!-- Contenedor -->
<div class="container">
    <div class="card text-center">
        <div class="card-header card text-white bg-dark mb-3">
            BIENVENIDO
        </div>

        <div class="card-body">
            <h4><?= $title; ?></h4><hr>
            <table class="table table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=ucfirst($userInfo['nombre']); ?></td>
                        <td><?= $userInfo['correo']; ?></td>
                        <td><a href="<?=site_url('auth/logout');?>">Logout</a></td>
                    </tr>
                </tbody>
            </table>
        

        </div>
        <br/>
        <div class="d-grid gap-3 col-6 mx-auto">
            <a href="<?=base_url('listar');?>" class="btn btn-dark bottom-center-block">Platillos</a>
            <a href="<?=base_url('listar1');?>" class="btn btn-dark">Bebidas</a>
            <a href="<?=base_url('listar3');?>" class="btn btn-dark">Comentarios</a>
        </div>
        <br/>
    </div>
</div>


</body>
</html>