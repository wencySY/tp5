<?php
namespace app\teacher\model;

use think\Model;

/**
 *
 */
class Index extends Model
{
    protected $table = 'think_people';
    // protected function getSexAttr($value)
    // {
    //     $sex = ['1' => '男', '2' => '女'];
    //     return $sex[$value];
    // }


    // 类型自动转换
    protected $type = array(
        'reg_time' => 'timestamp:Y-m-d',

    );

    //查询范围
    protected function scopeAge($query){
    	$query->where('age','23');
    }

    //全局查询
    protected function base($query){
    	$query->where('id','>','1');
    }

    //
    // public function getRegTimeAttr($value)
    // {
    //     $reg_time = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
    //     return $reg_time[$value];
    // }
}
