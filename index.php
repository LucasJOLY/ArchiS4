<?php

// charge et initialise les bibliothèques globales
include_once 'data/DataAccess.php';
include_once 'control/Controllers.php';
include_once 'control/Presenter.php';
include_once 'service/AnnoncesChecking.php';
include_once 'gui/ViewLogin.php';
include_once 'gui/ViewAnnonces.php';
include_once 'gui/ViewPost.php';

use control\Controllers;
use control\Presenter;
use data\DataAccess;
use gui\{Layout, ViewAnnonces, ViewLogin, ViewPost};
use service\AnnoncesChecking;

$data = null;
try {
    // construction du modèle
    $data = new DataAccess( new PDO('mysql:host=mysql-lucas-joly.alwaysdata.net;dbname=lucas-joly_bd','289245_lucas','lucas_joly_db83') );

} catch (PDOException $e) {
    print "Erreur de connexion !: " . $e->getMessage() . "<br/>";
    die();
}

// initialisation du controller
$controller = new Controllers();

// intialisation du cas d'utilisation AnnoncesChecking
$annoncesCheck = new AnnoncesChecking() ;

// intialisation du presenter avec accès aux données de AnnoncesCheking
$presenter = new Presenter($annoncesCheck);

// chemin de l'URL demandée au navigateur
// (p.ex. /annonces/index.php)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// route la requête en interne
// i.e. lance le bon contrôleur en focntion de la requête effectuée
if ( '/' == $uri || '/index.php' == $uri) {

    $layout = new Layout("gui/layout.html" );
    $vueLogin = new ViewLogin( $layout );

    $vueLogin->display();
}
elseif ( '/index.php/annonces' == $uri
    && isset($_POST['login']) && isset($_POST['password']) ){

    $controller->annoncesAction($_POST['login'], $_POST['password'], $data, $annoncesCheck);

    $layout = new Layout("gui/layout.html" );
    $vueAnnonces= new ViewAnnonces( $layout, $_POST['login'], $presenter);

    $vueAnnonces->display();
}
elseif ( '/index.php/post' == $uri
    && isset($_GET['id'])) {

    $controller->postAction($_GET['id'], $data, $annoncesCheck);

    $layout = new Layout("gui/layout.html" );
    $vuePost= new ViewPost( $layout, $presenter );

    $vuePost->display();
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>My Page NotFound</h1></body></html>';
}

?>
