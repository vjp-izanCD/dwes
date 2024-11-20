<?php
    require_once "utils/utils.php";

    $claseActivaHome = "active";
    $claseActivaAbout = "";
    $claseActivaBlog = "";
    $claseActivaContact = "";
    $claseActivaGaleria = "";
    $claseActivaAsociados = "";

    if ($_SERVER["REQUEST_URI"]) {
        if (strpos($_SERVER["REQUEST_URI"], "about.php") !== false) {
            $claseActivaHome = "";
            $claseActivaAbout = "active";
        } elseif (existeOpcionMenuActivaEnArray(["blog", "single_post"])) {
            $claseActivaHome = "";
            $claseActivaBlog = "active";
        } elseif (strpos($_SERVER["REQUEST_URI"], "contact.php") !== false) {
            $claseActivaHome = "";
            $claseActivaContact = "active";
        } elseif (strpos($_SERVER["REQUEST_URI"], "galeria.php") !== false) {
            $claseActivaHome = "";
            $claseActivaGaleria = "active";
        } elseif (strpos($_SERVER["REQUEST_URI"], "asociados.php") !== false) {
            $claseActivaHome = "";
            $claseActivaAsociados = "active";
        } elseif (strpos($_SERVER["REQUEST_URI"], "index.php") !== false) {
            }
    }
?>


<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <span>[PHOTO]</span>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav">
                <li class="<?php echo $claseActivaHome; ?> lien"><a href="index.php"><i class="fa fa-home sr-icons"></i> Home</a></li>
                <li class="<?php echo $claseActivaAbout; ?> lien"><a href="about.php"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
                <li class="<?php echo $claseActivaBlog; ?> lien"><a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
                <li class="<?php echo $claseActivaContact; ?> lien"><a href="contact.php"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
                <li class="<?php echo $claseActivaGaleria; ?> lien"><a href="galeria.php"><i class="fa fa-image sr-icons"></i> Galeria</a></li>
                <li class="<?php echo $claseActivaAsociados; ?> lien"><a href="asociados.php"><i class="fa fa-hand-o-right sr-icons"></i> Asociados</a></li>
            </ul>
        </div>
    </div>
</nav>