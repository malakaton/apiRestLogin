<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{

    public function indexAction() {
//        $redis = $this->container->get('snc_redis.default');
//        $key = "count:calls";
//        $redis->set($key, 12);
//        $res = $redis->get($key);
//        var_dump($res);

    }

    public function loginCheckAction() {
        $login = $this->get("api.token");
        $login->execute(123);
        echo $login->returnToken();
    }
}
