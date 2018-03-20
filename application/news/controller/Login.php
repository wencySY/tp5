<?php
namespace app\news\controller;

use app\news\model\Member;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Validate;

class Login extends Controller
{
    //登录
    public function login(Request $request)
    {
        if ($request->isPost()) {
            //接收数据
            $data = Request::instance()->param();
            $aaa  = $data['yzm'];
            // dump($data['yzm']);die;
            //验证验证码
            $h = $this->validate($aaa, [
                'captcha|验证码' => 'require|captcha',
            ]);
            // dump($h);die;
            if ($h === '验证码不能为空') {
                $db  = Db::connect('news');
                $res = $db->name('member')->where('username', $data['username'])->
                    where('password', $data['password'])->find();
                // dump($res);die;
                if ($res) {
                    //存在用户,用户信息持久保持到session中,跳转到后台首页
                    
                    Session::set('id', $res['id']);
                    Session::set('username', $res['username']);
                    $this->success('登录成功@~@', url('Index/index'), 2);
                } else {
                    //用户不存在
                    $this->error('您输入的用户名或密码不正确');exit;
                }

            } else {
                //验证码错误
                $this->error('您输入的验证码有误');exit;
            }
        } else {
            return $this->fetch();
        }

    }
    //注册
    public function register()
    {
        return $this->fetch();
    }
    public function checkRegister()
    {
        //接收数据
        $data     = Request::instance()->param();
        $username = $data['username'];
        $password = $data['password'];
        // dump($username);die;
        $db  = Db::connect('news');
        $res = $db->name('member')->where('username', $username)->find();
        if ($res == null) {
            $user = new Member();
            $user->data([
                'username' => $username,
                'password' => $password,
            ]);
            $info = $user->save();
            if ($info) {
                //注册成功
                return '用户注册成功';
            } else {
                //注册失败
                return '用户注册失败';
            }
        } else {
            return "用户名已被注册";
        }

    }
    
}
