<?php
namespace app\teacher\controller;

use app\teacher\model\Index as IndexModel;
use think\Controller;
use think\Db;
use think\Request;


class Index extends Controller
{
    public function index()
    {
        return 'thinkphp5---teacher';
    }

    //循环遍历二维数组
    public function test1()
    {
        $data = Db::name('book')->select();
        $this->assign('data', $data);
        // return $this->fetch('test1', ['data' => $data]);
        return $this->fetch('test1');
    }

    //查询范围
    public function test2()
    {
        $data = IndexModel::scope('age')
            ->scope(function ($query) {
                $query->where('reg_time', '>', '0');
            })
            ->select();
    }
    //全局查询
    public function test3()
    {
        $data = IndexModel::scope('age')->select();
    }

    public function add()
    {
        if (Request::instance()->isPost()) {
            $data   = request()->param();
            $name   = $data['name'];
            $result = Db::name('people')->insert($data);
            // $userId = Db::name('user')->getLastInsID();
            if ($result) {
                $this->success("用户{$name}新增成功", url('showlist'), 3);

            } else {
                $this->error('用户{$name}新增失败');
            }
        } else {
            return $this->fetch('add');
        }

    }
    public function showlist()
    {
        // $data = Db::name('people')->order('id', 'dec')->select();
        $data = IndexModel::order('age', 'dec')->select(); //实用模型才可以使用读取器与修改器
        $this->assign('data', $data);
        return $this->fetch();
    }
    public function edit()
    {
        if (Request::instance()->isGet()) {
            $id   = input('id');
            $data = Db::name('people')->find($id);
            $this->assign('data', $data);
            return $this->fetch();

        } else {
            $data   = request()->param();
            $result = Db::name('people')->update($data);
            if ($result) {
                $this->success("用户{$data['name']}修改成功", url('showlist'), 3);
            } else {
                $this->error("用户{$data['name']}修改失败");
            }
        }

    }

    public function del()
    {
        $id     = input('id');
        $result = Db::name('people')->delete($id);
        if ($result) {
            $this->success('删除成功', 'showlist', 3);
        } else {
            $this->error('删除失败');
        }

    }

}
