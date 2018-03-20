<?php
namespace app\home\controller;

use app\home\model\Book;
use app\home\model\Profile;
use app\home\model\User as UserModel;
use think\Controller;

class User extends Controller
{
    // 关联新增数据
    public function add()
    {
        /*$user = new UserModel;
        if ($user->allowField(true)->validate(true)->save(input('post.'))) {
        return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
        } else {
        return $user->getError();
        }*/

        //既可以赋值  也可使用数组
        //第一种  Relation对象形式
        /*$user           = new UserModel;
        $user->name     = 'thinkphp';
        $user->password = '123456';
        $user->nickname = '流年';
        if ($user->save()) {
        // 写入关联数据
        $profile           = new Profile;
        $profile->truename = '刘晨';
        $profile->birthday = '1977-03-05';
        $profile->address  = '中国上海';
        $profile->email    = 'thinkphp@qq.com';
        $user->profile()->save($profile);
        return '用户新增成功';
        } else {
        return $user->getError();
        }*/
        //
        //数组形式
        $user           = new UserModel;
        $user->name     = 'thinkphp';
        $user->password = '123456';
        $user->nickname = '流年';
        if ($user->save()) {
            // 写入关联数据
            $profile['truename'] = '刘晨';
            $profile['birthday'] = '1977-03-05';
            $profile['address']  = '中国上海';
            $profile['email']    = 'thinkphp@qq.com';
            $user->profile()->save($profile);
            return '用户[ ' . $user->name . ' ]新增成功';
        } else {
            return $user->getError();
        }
    }

    //关联查询
    public function read($id)
    {
        //一对一的关联查询
        /*$user = UserModel::get($id);
        echo $user->name . '<br/>';
        echo $user->nickname . '<br/>';
        echo $user->profile->truename . '<br/>';
        echo $user->profile->email . '<br/>';*/

        //预载入查询
        $user = UserModel::get($id, 'profile');
        echo $user->name . '<br/>';
        echo $user->nickname . '<br/>';
        echo $user->profile->truename . '<br/>';
        echo $user->profile->email . '<br/>';

    }

    //关联更新
    public function update($id)
    {
        $user       = UserModel::get($id);
        $user->name = 'framework';
        if ($user->save()) {
            // 更新关联数据
            $user->profile->email = 'liu21st@gmail.com';
            $user->profile->save();
            return '用户[ ' . $user->name . ' ]更新成功';
        } else {
            return $user->getError();
        }
    }

    //关联删除
    public function delete($id)
    {
        $user = UserModel::get($id);
        if ($user->delete()) {
            // 删除关联数据
            $user->profile->delete();
            return '用户[ ' . $user->name . ' ]删除成功';
        } else {
            return $user->getError();
        }
    }

    //一对多
    public function readBook()
    {
        $user  = UserModel::get(1,'books');
        $books = $user->books;
        dump($books);die;
    }

    public function addBook()
    {
    	//单个添加
        // $user               = UserModel::get(1);
        // $book               = new Book;
        // $book->title        = 'ThinkPHP5快速入门';
        // $book->publish_time = '2016-05-06';
        // $user->books()->save($book);
        // return '添加Book成功';

    	//批量添加
        // $user  = UserModel::get(1);
        // $books = [
        //     ['title' => 'ThinkPHP5快速入门', 'publish_time' => '2016-05-06'],
        //     ['title' => 'ThinkPHP5开发手册', 'publish_time' => '2016-03-06'],
        // ];
        // $user->books()->saveAll($books);
        // return '添加Book成功';
    }
}
