<?php
namespace app\Admin\controller;

use app\Admin\model\User as UserModel;
use think\Controller;
use think\View;

/**
 *
 */
class User extends Controller
{

    // 新增用户数据
    public function add()
    {
        //第一种    逐条添加
        // $user           = new UserModel;
        // $user->nickname = '流年';
        // $user->email    = 'thinkphp@qq.com';
        // $user->birthday = strtotime('1977-03-05');
        // if ($user->save()) {
        //     return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
        // } else {
        //     return $user->getError();
        // }

        //第二种  创建数据对象
        // $user['nickname'] = '看云';
        // $user['email']    = 'kancloud@qq.com';
        // $user['birthday'] = '2015-04-02'; //使用修改器
        // if ($result = UserModel::create($user)) {
        //     return '用户[ ' . $result->nickname . ':' . $result->id . ' ]新增成功';
        // } else {
        //     return '新增出错';
        // }

        
    }

    //批量添加
    public function addList()
    {
        $user = new UserModel;
        $list = [
            ['nickname' => '张三', 'email' => 'zhanghsan@qq.com', 'birthday' => strtotime('1
988-01-15')],
            ['nickname' => '李四', 'email' => 'lisi@qq.com', 'birthday' => strtotime('1990-0
9-19')],
        ];
        if ($user->saveAll($list)) {
            return '用户批量新增成功';
        } else {
            return $user->getError();
        }
    }

    //查询数据
    public function read($name = '')
    {
        //这是模型对象实例
        $user = UserModel::get($name);
        echo $user->nickname . '<br/>';
        echo $user->email . '<br/>';
        echo $user->birthday . '<br/>';
        echo $user->status . '<br/>';
        echo $user->create_time . '<br>';
        echo $user->update_time . '<br>';

        //这是查询的数组方式
        // $user = UserModel::get($id);
        // echo $user['nickname'] . '<br/>';
        // echo $user['email'] . '<br/>';
        // echo date('Y/m/d', $user['birthday']) . '<br/>';

        //根据email读取用户
        // $user = UserModel::getByEmail('thinkphp@qq.com');
        // echo $user->nickname . '<br/>';
        // echo $user->email . '<br/>';
        // echo date('Y/m/d', $user->birthday) . '<br/>';

        //根据nicename读取用户
        // $user = UserModel::get(['nickname' => $name]);
        // echo $user->nickname . '<br/>';
        // echo $user->email . '<br/>';
        // echo date('Y/m/d', $user->birthday) . '<br/>';

        //更复杂的请使用构造器
        // $user = UserModel::where('nickname', $name)->find();
        // echo $user->nickname . '<br/>';
        // echo $user->email . '<br/>';
        // echo date('Y/m/d', $user->birthday) . '<br/>';
    }

    //获取用户数据列表
    public function index()
    {
        $list = UserModel::all();
        foreach ($list as $user) {
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo $user->birthday . '<br/>';
            echo $user->status . '<br/>';
            echo $user->create_time . '<br>';
            echo $user->update_time . '<br>';
            echo '----------------------------------<br/>';
        }
    }

    //更新操作
    // public function update($id)
    // {
    //     $user           = UserModel::get($id);
    //     $user->nickname = '刘晨';
    //     $user->email    = 'liu21st@gmail.com';
    //     if (false !== $user->save()) {
    //         return '更新用户成功';
    //     } else {
    //         return $user->getError();
    //     }
    // }

    //更新用户数据    AR模式(ActiveRecord)
    public function update($id)
    {
        $user['id']       = (int) $id;
        $user['nickname'] = '刘晨';
        $user['email']    = 'liu21st@gmail.com';
        $result           = UserModel::update($user);
        return '更新用户成功';
    }

    // 删除用户数据
    public function delete($id)
    {
        // $user = UserModel::get($id);
        // if ($user) {
        //     $user->delete();
        //     return '删除用户成功';
        // } else {
        //     return '删除的用户不存在';
        // }
        $result = UserModel::destroy($id);
        if ($result) {
            return '删除用户成功';
        } else {
            return '删除的用户不存在';
        }
    }

    public function create()
    {
        return view();
    }

    //视图   模板  渲染..
    //有三种方法 助手函数  controller  和view类
    //
    public function view1()
    {
        $data = array('name' => 'wency_sy', 'sex' => '男');
        return view('index/test', $data);
    }
    public function view2()
    {
        return $this->fetch('index/test', ['name' => 'wency_sy']);
    }
    public function view3()
    {
        $obj = View::instance();
        return $obj->fetch('index/test', ['name' => 'wency_sy']);
    }

}
