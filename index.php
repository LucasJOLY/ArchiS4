<?php

// charge et initialise les bibliothèques globales
require_once 'model/model.php';
require_once 'controller/controller.php';

// chemin de l'URL demandée au navigateur
// (p.ex. /annonces/index.php)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// route la requête en interne
// i.e. lance le bon contrôleur en focntion de la requête effectuée
if ( '/' == $uri || '/index.php' == $uri) {
    loginAction();
}
elseif ( '/index.php/annonces' == $uri
    && isset($_POST['login']) && isset($_POST['password']) ){

    annoncesAction($_POST['login'], $_POST['password']);
}
elseif ( '/index.php/post' == $uri
    && isset($_GET['id'])) {

    postAction($_GET['id']);
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>My Page NotFound</h1></body></html>';
}

?>