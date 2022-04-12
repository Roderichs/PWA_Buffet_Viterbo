<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Etiquetas -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <div class="row" style="margin-top:45px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>Iniciar Sesión</h4><hr>
                <form action="<?=base_url('auth/check')?>" method="POST" autocomplete="off">
                <?=csrf_field();?>
                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" name="correo" placeholder="Ingresa tu correo"
                            value="<?=set_value('correo')?>">
                        <span class="text-danger"><?=isset($validation) ? display_error($validation, 'correo') : ''?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña">
                        <span class="text-danger"><?=isset($validation) ? display_error($validation, 'password') : ''?></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn block" type="submit">
                            Iniciar Sesión
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>