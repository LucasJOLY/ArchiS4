<?php
require_once 'model/model.php';

if( isUser( $_POST['login'], $_POST['pwd'] ) ) {
    $login = $_POST['login'];
    $annonces = getAllAnnonces();
}

// inclut le code de la présentation HTML
require 'view/annonces.php';
?>
