<?php
    require_once "utils/utils.php";

    $claseActivaHome = "active";
    $claseActivaAbout = "";
    $claseActivaBlog = "";
    $claseActivaContact = "";
    $claseActivaGaleria = "";
    $claseActivaAsociados = "";

    if (isset($_SERVER["REQUEST_URI"])) {
        if (strpos($_SERVER["REQUEST_URI"], "about") !== false) {
            $claseActivaHome = "";
            $claseActivaAbout = "active";
        } elseif (existeOpcionMenuActivaEnArray(["blog", "post"])) {
            $claseActivaHome = "";
            $claseActivaBlog = "active";
        } elseif (strpos($_SERVER["REQUEST_URI"], "contact") !== false) {
            $claseActivaHome = "";
            $claseActivaContact = "active";
        } elseif (strpos($_SERVER["REQUEST_URI"], "galeria") !== false) {
            $claseActivaHome = "";
            $claseActivaGaleria = "active";
        } elseif (strpos($_SERVER["REQUEST_URI"], "asociados") !== false) {
            $claseActivaHome = "";
            $claseActivaAsociados = "active";
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
                <li class="<?php echo $claseActivaHome; ?> lien"><a href="/"><i class="fa fa-home sr-icons"></i> Home</a></li>
                <li class="<?php echo $claseActivaAbout; ?> lien"><a href="/about"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
                <li class="<?php echo $claseActivaBlog; ?> lien"><a href="/blog"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
                <li class="<?php echo $claseActivaContact; ?> lien"><a href="/contact"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
                <li class="<?php echo $claseActivaGaleria; ?> lien"><a href="/galeria"><i class="fa fa-image sr-icons"></i> Galeria</a></li>
                <li class="<?php echo $claseActivaAsociados; ?> lien"><a href="/asociados"><i class="fa fa-hand-o-right sr-icons"></i> Asociados</a></li>
            </ul>
        </div>
    </div>
</nav>