<?php
namespace app\news\model;

use think\Model;
/**
* 
*/
class Img extends Model
{
	
	//开启时间戳
    protected $autoWriteTimestamp = true;
    // 关闭自动写入update_time字段
    protected $updateTime = false;
    protected $type = [
        // 设置birthday为时间戳类型（整型）
        'create_time' => 'timestamp:m-d H:i',
    ];
}