<?php
function openConnection()
{
    $link = mysqli_connect('mysql-lucas-joly.alwaysdata.net', '289245', '@Aykopanama83', 'lucas-joly_bd');
    return $link;
}

function closeConnection($link)
{
    mysqli_close($link);
}

function isUser( $login, $password )
{
    $isuser = False ;
    $link = openConnection();

    $query= 'SELECT login FROM Users WHERE login="'.$login.'" and pwd="'.$password.'"';
    $result = mysqli_query($link, $query );

    if( mysqli_num_rows( $result) )
        $isuser = True;

    mysqli_free_result( $result );
    closeConnection($link);

    return $isuser;
}

function getAllAnnonces()
{
    $link = openConnection();

    $result = mysqli_query($link,'SELECT id, title FROM Post');
    $annonces = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $annonces[] = $row;
    }

    mysqli_free_result( $result);
    closeConnection($link);

    return $annonces;
}

function getPost( $id )
{
    $link = openConnection();

    $id = intval($id);
    $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$id );
    $post = mysqli_fetch_assoc($result);

    mysqli_free_result( $result);
    closeConnection($link);
    return $post;
}