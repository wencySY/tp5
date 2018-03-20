<?php
namespace app\news\model;

use think\Model;

/**
 *
 */
class News extends Model
{

    //开启时间戳
    protected $autoWriteTimestamp = true;
    //定义用户状态
    public function getStatusAttr($value)
    {
        $status = [
            0 => '游戏',
            1 => '体育',
            2 => '汽车',
            3 => '奇闻',
        ];
        return $status[$value];
    }
    protected $type = [
        // 设置birthday为时间戳类型（整型）
        'create_time' => 'timestamp:m-d H:i',
        'update_time' => 'timestamp:m-d H:i',
    ];
}
