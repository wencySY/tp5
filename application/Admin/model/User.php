<?php
namespace app\Admin\model;

use think\Model;

class User extends Model
{
    

    // 定义类型转换
    /*protected $type = [
    'birthday'    => 'timestamp:Y/m/d',
    'create_time' => 'timestamp:Y/m/d/H/i/s',
    'update_time' => 'timestamp:Y/m/d/H/i/s',
    ];
    // 定义自动完成的属性
    //protected $insert = ['status' => 1];
    // 定义时间戳字段名
    protected $createTime = 'create_1';
    protected $updateTime = 'update_1';

    // 定义自动完成的属性
    protected $insert = ['status'];
    // status属性修改器
    protected function setStatusAttr($value, $data)
    {
    return '看云' == $data['nickname'] ? 1 : 2;
    }
    // status属性读取器
    protected function getStatusAttr($value)
    {
    $status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
    return $status[$value];
    }

    // 关闭自动写入时间戳
    // protected $autoWriteTimestamp = true;

    // //读取器    在读取时进行转化
    // protected function getBirthdayAttr($birthday)
    // {
    //     return date('Y-m-d', $birthday);
    // }

    // // user_birthday读取器  读取表中不存在的属性
    // protected function getUserBirthdayAttr($value, $data)
    // {
    //     return date('Y-m-d', $data['birthday']);
    // }

    // //修改器    在写入时进行转换
    // protected function setBirthdayAttr($value)
    // {
    //     return strtotime($value);
    // }

    // 定义关联方法
    public function books()
    {
    return $this->hasMany('Book');
    }*/
    
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
}
