<?php

/**
 * 用户登陆
 * 
 * @author: honglinzi
 * @version: 1.0
 */

namespace app\api\controller\v1;

use think\Controller;
use app\api\model\Users;
use common\Auth;

class Login extends Controller
{

    /**
     * 登陆
     * 
     * @return string
     */
    public function create()
    {
        $data = $this->request->post();
        $result = ['code' => 404, 'msg' => '该用户找不到', 'data' => []];
        if ($data)
        {

            $model = new Users();

            $user = $model->where(['username' => $data['username'], 'password' => md5($data['password'])])->find();

            if ($user)
            {
                $result['code'] = 200;
                $result['tokenKey'] = Auth::encode($user->id);
                $result['msg'] = '登陆成功';
                $result['uid'] = $user->id;
            }
        }
        return json($result);
    }

    /**
     * 客户端主动刷新tokenKey
     * 
     * @param $id string
     * @return string
     */
    public function update($id)
    {
        $result = ['code' => 401,'msg'=>'令牌过期了', 'tokenKey' => ''];
        $key = $this->request->server('HTTP_X_TOKEN');
        //判断该用户是否存在或者是否被禁用等
        if ($key && Users::get($id))
        {
            $auth = Auth::decode($key);
            //判断该用户提交tokenkey与id是否一致
            if (isset($auth['uid']) && $auth['uid'] == $id)
            {
                $result['code'] = 200;
                $result['tokenKey'] = Auth::encode($auth['uid']);
            }
        }else{
            $result['code'] = 404;
            $result['msg'] = '用户不存在';
        }


        return json($result);
    }

}
