<?php include __DIR__ . '/partials/inicio-doc.part.php'; ?>
<?php include __DIR__ . '/partials/nav.part.php'; ?>

<div class="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>GALERÍA</h1>
            <!--Compruebo a ver si estoy recibiendo los datos del formulario-->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                <!-- Si he recibido el post, meteré una alerta de tipo info, y en caso-->
                <!-- contrario muestro una alerta de tipo danger con clases de bootstrap-->
                <div class="alert alert-<?php echo empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php if (empty($errores)) : ?>
                        <p>Se subieron los archivos</p>
                    <?php else : ?>
                        <p>Se encontraron errores:</p>
                        <ul>
                            <?php foreach ($errores as $error) : ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Imagen</label>
                        <input class="form-control-file" type="file" name="imagen">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripción</label>
                        <textarea class="form-control" name="descripcion"><?php echo $descripcion ?></textarea>
                    </div>
                </div>
                <button class="pull-right btn btn-lg btn-info">ENVIAR</button>
            </form>
            <div class="divide"></div>
            <div class="imagenes_galeria"></div>
        </div>
    </div>
</div>

<!-- Principal Content Start -->
<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>