<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        $login = $this->get("api.token");
        $login->execute(123);
        echo $login->returnToken();
    }
}
