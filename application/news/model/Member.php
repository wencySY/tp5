<?php
namespace app\news\model;

use think\Model;

/**
 *
 */
class Member extends Model
{
    //开启时间戳
    protected $autoWriteTimestamp = true;
    // 关闭自动写入update_time字段
    protected $updateTime = false;
    //定义用户状态
    public function getStatusAttr($value)
    {
        $status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
        return $status[$value];
    }
	//只读字段
    protected $readonly = ['name'];

}
