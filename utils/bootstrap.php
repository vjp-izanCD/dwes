<?php 
    require_once "vendor/autoload.php";

    use proyecto\entities\App;
  
    use proyecto\entities\Router;

    use proyecto\entities\repository\MyLog;

    $config = require_once "app/config.php";

    App::bind("config", $config);

    $router = Router::load("utils/routes.php");
    App::bind("router", $router);


   App::bind("logger", new MyLog("logs/proyecto.log"));
?>