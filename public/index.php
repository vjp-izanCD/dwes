<?php
    use proyecto\entities\App;
    use proyecto\entities\Request;

    require "../utils/bootstrap.php";

    try{
        require App::get("router")->direct(Request::uri(), $_SERVER["REQUEST_METHOD"]);
    } catch(Exception $e) {
        die($e->getMessage());
    }
?>