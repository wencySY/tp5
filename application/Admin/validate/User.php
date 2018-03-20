<?php
namespace app\Admin\validate;

use think\Validate;

class User extends Validate
{
// 验证规则
    // 自定义错误提示
    // protected $rule = [
    //     'nickname' => ['require', 'min' => 5, 'token'],
    //     'email'    => ['require', 'email'],
    //     'birthday' => ['dateFormat' => 'Y-m-d'],
    // ];

    //半自定义错误提示
    // protected $rule = [
    //     'nickname|昵称' => ['require', 'min' => 5, 'token'],
    //     'email|邮箱'    => ['require', 'email'],
    //     'birthday|生日' => ['dateFormat' => 'Y-m-d'],
    // ];

    //自定义错误提示
    // 验证规则
    protected $rule = [
        ['nickname', 'require|min:5', '昵称不能为空|昵称不能短于5个字符'],
        ['email', 'checkMail:thinkphp.cn', '邮箱格式错误'],
        ['birthday', 'dateFormat:Y-m-d', '生日格式错误'],
    ];
	// 验证邮箱格式 是否符合指定的域名
    protected function checkMail($value, $rule)
    {
        return 1 === preg_match('/^\w+([-+.]\w+)*@' . $rule . '$/', $value);
    }
}
