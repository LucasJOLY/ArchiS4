<?php

namespace control;
include_once "./service/AnnoncesChecking.php";

class Controllers
{
    public function annoncesAction($login, $password, $data, $annoncesCheck)
    {
        if ($annoncesCheck->authenticate($login, $password, $data))
            $annoncesCheck->getAllAnnonces($data);
    }

    public function postAction($id, $data, $annoncesCheck)
    {
        $annoncesCheck->getPost($id, $data);
    }
}