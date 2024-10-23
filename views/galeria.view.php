<?php include __DIR__ . "/partials/inicio-doc.parts.php"; ?>

<?php include __DIR__ . "/partials/nav.parts.php"; ?>

<div id="galeria ">
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
            <form class="form_horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']?>"></form>
        </div>
    </div>
</div>



<?php include __DIR__ . "/partials/fin-doc.parts.php"; ?>