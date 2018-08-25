<?php

/**
 * 后台登陆
 * 
 * @author: honglinzi
 * @version: 1.0
 */

namespace app\client\controller;

use think\Controller;

class Login extends Controller
{

    /**
     * 登陆页面
     * 
     * @return string
     */
    public function index()
    {
        return $this->fetch('Login/index');
    }


}
