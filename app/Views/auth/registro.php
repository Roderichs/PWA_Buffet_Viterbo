<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <!-- Etiquetas -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <div class="row" style="margin-top:45px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>Registrarse</h4><hr>
                <form action="<?=base_url('auth/guardar');?>" method="post" autocomplete="off">

                <?=csrf_field();?>
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
                <?php endif ?>
                
                <?php if(!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
                <?php endif ?> 
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre" 
                            value="<?=set_value('nombre');?>">
                        <span class="text-danger"><?=isset($validation) ? display_error($validation, 'nombre') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" name="correo" placeholder="Ingresa tu correo"
                            value="<?=set_value('correo');?>">
                        <span class="text-danger"><?=isset($validation) ? display_error($validation, 'correo') : '' ?></span>

                    </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña"
                            value="<?=set_value('password');?>">
                        <span class="text-danger"><?=isset($validation) ? display_error($validation, 'password') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Confirma tu contraseña"
                        value="<?=set_value('cpassword');?>">
                        <span class="text-danger"><?=isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn block" type="submit">
                            Registrarse
                        </button>
                    </div>
                    <br>
                    <a href="<?=site_url('auth')?>">Ya tengo una cuenta, Ingresar ahora</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>