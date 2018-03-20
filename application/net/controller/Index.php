<?php
namespace app\net\controller;

use think\Controller;
use think\Db;
use think\db\Query;

class Index extends Controller
{
    public function index()
    {
        return '这里是teacher/index/index';
    }

    //响应不同数据
    public function test1()
    {
        $data = ['name' => 'thinkphp', 'status' => 1];
        // return json($data);
        // echo '<hr>';
        return xml($data);
    }

    //切换不同数据库
    public function test2()
    {
        $result = Db::connect('db1')->query('select * from sp_user');
        dump($result);
        $result = Db::connect('db2')->query('select * from think_people');
        dump($result);
    }

    //事务操作
    public function test3()
    {
        Db::transaction(function () {
            $db1 = Db::connect('db3'); //必须在里面给$db1赋值,在外面无效
            $db1->name('hello')->where('id', '1')->update(['msg' => 'abc']);
            // $db1->query('update hello set msg="aa" where id=1');
            $db1->name('member')->where('id', '4')->update(['nickname' => 'wency111']);
            // $db1->query('update member set nickname="aa" where id=4');
        });
    }

    //分块查询
    //第一种
    public function test4()
    {
        //在这里必须使用table 使用name会出错
        Db::table('think_people')->where('sex','2')->chunk(100, function ($users) {
            foreach ($users as $user) {
                //处理数据
               $user['name'].='-wency';
               $result = Db::name('people')->update($user);
               dump($result);
            }
        });
    }
    //第二种 分块查询
    public function test5()
    {
        $p = 0;
        do {
            $result = Db::name('people')->limit($p, 2)->order('id', 'dec')->select();
            $p += 2;
            dump($result);
        } while (count($result) > 0);

    }
}
