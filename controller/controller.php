<?php
function loginAction()
{
require 'view/login.php';
}

function annoncesAction( $login, $password)
{
if( isUser( $login, $password ) )
$annonces = getAllAnnonces();
else
$login='';

require 'view/annonces.php';
}

function postAction($id)
{
$post = getPost($id);
require 'view/post.php';
}

?>