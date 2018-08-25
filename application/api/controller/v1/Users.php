<?php

/**
 * 用户管理
 * 
 * @author: honglinzi
 * @version: 1.0
 */

namespace app\api\controller\v1;

use app\api\controller\Api;
use app\api\model\Users as UserModel;

class Users extends Api
{

    /**
     * 列表页面
     * 
     * @return string
     */
    public function index()
    {
        $result = ['code' => 200, 'msg' => '', 'data' => []];
        $data = UserModel::paginate(3);
        if ($data)
        {
            $result = [ 'data' => $data];
        }
        return json($result);
    }

    /**
     * 获取用户信息
     * 
     * @return string
     */
    public function read($id = 0)
    {

        $result = ['code' => 404, 'msg' => '', 'data' => []];
        $user = UserModel::get($id);
        if ($user)
        {
            $result = ['code' => 200, 'data' => $user];
        }
        return json($result);
    }
    /**
     * 新增
     * 
     * @return string
     */
    public function create()
    {
        $result = ['code' => 400, 'msg' => '', 'data' => []];
        $data = $this->request->post('users');
        if ($data)
        {
            $model = new UserModel();
            if ($model->save($data))
            {
                $result['code'] = 200;
            }
        }
        return json($result);
    }    
    /**
     * 更新数据
     * 
     * @return string
     */
    public function update($id = 0)
    {
        $result = ['code' => 404, 'msg' => '', 'data' => []];
        $data = $this->request->post('users');
        if ($data)
        {
            $model = new UserModel();
            $user = $model->get($id);
            if ($user && $user->where('id', $id)->update($data))
            {
                $result['code'] = 200;
            }
        }else{
            $result['code'] = 400;
        }
        return json($result);
    }
    /**
     * 删除用户
     * 
     * @return string
     */
    public function delete($id = 0)
    {

        $result = ['code' => 404, 'msg' => '', 'data' => []];
        $model = new UserModel();
        $user = $model->get($id);
        if ($user && $user->delete())
        {
            $result['code'] = 200;
        }
        return json($result);
    }


}
