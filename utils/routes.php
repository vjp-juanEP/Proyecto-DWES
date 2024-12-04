<?php
$router->get('','controllers/index.php');
$router->get('about','controllers/about.php');
$router->get('partners','controllers/partners.php');
$router->get('blog','controllers/blog.php');
$router->get('contact','controllers/contact.php');
$router->get('galery','controllers/galery.php');
$router->get('post','controllers/single_post.php');

$router->post('imagenes-galeria/nueva','controllers/nueva-imagen-galeria.php');
$router->post('imagenes-partner/nueva','controllers/nuevo-asociado.php');

?>