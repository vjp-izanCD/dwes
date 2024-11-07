<?php include __DIR__ . "/partials/inicio-doc.parts.php"; ?>
<?php include __DIR__ . "/partials/nav.parts.php"; ?>

<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-push-2">
            <h1>Galeria</h1>
            <hr>
            <?php if($_SERVER["REQUEST_METHOD"] === "POST"):?>
                <div class="alert alert-<?=empty($errores)? 'info' : 'danger';?> alert-dismissibre" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <?php if (empty($errores)) : ?>
                        <p> <?= $mensaje ?></p>
                    <?php else : ?>
                        <ul>
                            <?php foreach ($errores as $error) : ?>
                                <li><?=$error?></li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <form class="form_horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']?>">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Imagen</label>
                        <input class="form-control-file" type="file" name="imagen">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripcion</label>
                        <textarea class="form-control" name="descripcion"><?= $descripcion?></textarea>
                        <button class="pull-rigth btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>
            <hr class="divider">
            <div class="imagenes_galeria">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Visualizaciones</th>
                        <th scope="col">Likes</th>
                        <th scope="col">Descargas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($imagenes as $img): ?>
                        <tr>
                            <th scope="row"><?= $img->getId() ?></th>
                            <td>
                                <img src="<?= $img->getUrlGallery() ?>" alt="<?= $img->getDescripcion() ?>" title="<?= $img->getDescripcion() ?>" width="100px">
                            </td>
                            <td>
                                <?= $img->getNumVisualizaciones() ?>
                            </td>
                            <td>
                                <?= $img->getNumLikes() ?>
                            </td>
                            <td>
                                <?= $img->getNumDescargas() ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partials/fin-doc.parts.php"; ?>