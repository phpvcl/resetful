<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用公共文件

namespace common;

use \Firebase\JWT\JWT;

class Auth
{

    //签发者
    const LSSUR = 'test';
    //密钥
    const KEY = '1gHuiop975cdashyex9Ud23ldsvm2Xq';
    //过期时间
    const EXPIRES = 60;

    /**
     * 加密
     * 
     * @param $uid 用户ID
     * @return string
     */
    public static function encode($uid)
    {
        $nowtime = time();
        $token = [
            'iss' => self::LSSUR,
            'iat' => $nowtime,
            'exp' => $nowtime + self::EXPIRES,
            'uid' => $uid
        ];
        return JWT::encode($token, self::KEY);
    }

    /**
     * 解密
     * 
     * @param $token 
     * @return array
     */
    public static function decode($token)
    {
        $result = [];
        try
        {
            JWT::$leeway = 60;

            $result = (array)JWT::decode($token, self::KEY, ['HS256']);

        }
        catch (\Exception $e)
        {
            $result['exp'] = 0;
        }
        return $result;
    }

}
