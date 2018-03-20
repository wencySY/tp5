<?php
namespace app\home\model;

use think\Model;

/**
 *
 */
class User extends Model
{

    //开启自动写入时间戳
    protected $autoWriteTimestamp = true;

    //开启自动完成的属性
    protected $insert = ['status' => 1];

    //定义关联方法
    public function profile()
    {
        // 用户HAS ONE档案关联
        return $this->hasOne('Profile');
    }

    // 定义关联
    public function books()
    {
        return $this->hasMany('Book');
    }
}
