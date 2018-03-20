<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// use think\Route;
// Route::get('aaa','Admin/Index/test');

return [
    //'test/[:name]' => 'Admin/Index/test/',
    '__pattern__'     => [
        'name' => '\w+',
    ],
    '[hello]'         => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    // 'test3/:name' =>['admin/index/test3',[],['name'=>'\w+']],

    // 全局变量规则定义
    // '__pattern__'     => [
    //     'id' => '\d+',
    // ],

    // user的路由   平台在admin之下
    // 'user/index'      => 'admin/user/index',
    // 'user/create'     => 'admin/user/create',
    // 'user/add'        => 'admin/user/add',
    // 'user/add_list'   => 'admin/user/addList',
    // 'user/update/:id' => 'admin/user/update',
    // 'user/delete/:id' => 'admin/user/delete',
    // 'user/:id'        => 'admin/user/read',
    'user/read/:id'   => 'home/user/read',
    'user/update/:id' => 'home/user/update',
    'user/delete/:id' => 'home/user/delete',
    'user/addbook'    => 'home/user/addbook',
    'user/readbook' =>'home/user/readBook'
];
