<?php

/**
 * 权限验证公共类
 * 
 * @author: honglinzi
 * @version: 1.0
 */

namespace app\api\controller;

use think\Controller;
use common\Auth;

class Api extends Controller
{

    public function __construct()
    {
       
        $tokenkey = request()->server('HTTP_X_TOKEN');
        if (!$this->checkLogin($tokenkey))
        {
            die(json_encode(['code' => 401, 'msg' => '未登陆']));
        }
         
    }

    /**
     * 登陆验证
     * 
     * @param  $tokenKey
     * @return bool
     */
    public function checkLogin($tokenKey)
    {
        $result = Auth::decode($tokenKey);
       
        if ($result['exp'] > time())
        {
            return true;
        }
        return false;
    }

}
