<?php
namespace proyecto\utils;

    $router->get("", "controllers/index.php",);
    $router->get("about", "controllers/about.php",);
    $router->get("asociados", "controllers/asociados.php",);
    $router->get("blog", "controllers/blog.php",);
    $router->get("contact", "controllers/contact.php",);
    $router->get("galeria", "controllers/galeria.php",);
    $router->get("post", "controllers/post.php",);
    $router->post("galeria/nueva", "controllers/galeria_nueva.php",);
    $router->post("asociados/nueva", "controllers/asociados_nueva.php",);
?>