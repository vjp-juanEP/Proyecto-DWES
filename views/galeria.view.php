<?php include __DIR__ . '/partials/inicio-doc.part.php' ?>
<?php include __DIR__ . '/partials/nav.part.php' ?>


<div class="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h2>GALERIA</h2>
            <hr>

            <?php
                if (!empty($array_error)) {
                    echo "<div class='alert alert-danger'>";
                    foreach ($array_error as $valor) {
                        echo "<li> $valor ";
                    }
                    echo "</div>";
                }

                if(!empty($array_mostrarDatos)) {
                    echo "<div class='alert alert-info'>";
                    foreach ($array_mostrarDatos as $valor) {
                        echo "<li> $valor ";
                    }
                    echo "</div>";
                }
			?>

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']?>">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control" for="fileImagen">Imagen</label>
                        <input class="form-control-file" type="file" id="fileImagen" name="imagen">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripcion</label>
                        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>
            <hr class="divider">
            <div class="imagenes_galeria">
            
            </div>
        </div>    
    </div>
</div>

<?php include __DIR__ . '/partials/fin-doc.part.php' ?>