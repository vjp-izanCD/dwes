<?php 
    require_once "entities/app.class.php";
    require_once "entities/request.class.php";
    require_once "entities/router.class.php";
    require_once "entities/repository/myLog.class.php";
    require_once "vendor/autoload.php";

    $config = require_once "app/config.php";

    App::bind("config", $config);

    $router = Router::load("utils/routes.php");
    App::bind("router", $router);


   App::bind("logger", new MyLog("logs/proyecto.log"));
?>