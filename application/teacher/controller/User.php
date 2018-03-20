<?php
namespace app\teacher\controller;

use think\Controller;
use think\Db;
use think\Request;

/**
 *
 */
class User extends Controller
{
    public function index()
    {
        echo "ok";
    }
    //第一种:
    //继承了控制器,写了验证类,可以直接调用
    public function test1()
    {
        if (Request::instance()->isPost()) {
            $data   = Request::instance()->param();
            $result = $this->validate($data, 'User');
            if (true !== $result) {
                // 验证失败 输出错误信息
                dump($result);
            } else {
                echo "验证通过";
            }
        } else {
            return $this->fetch();
        }

    }
    //第二种
    //独立验证操作
    public function test2()
    {
        $validate = new \think\Validate([
            'name'  => 'require|max:25',
            'email' => 'email',
        ]);
        $data = [
            'name'  => 'thinkphp',
            'email' => 'thinkphp@qq.com',
        ];
        if (!$validate->check($data)) {
            dump($validate->getError());
        } else {
            echo "验证通过";
        }
    }

    //验证码
    public function test3(Request $request)
    {
        if ($request->isGet()) {
            $captcha           = new \think\captcha\Captcha();
            $captcha->fontSize = 30;
            $captcha->length   = 3;
            $captcha->useNoise = false;
            $captcha->entry();
            $this->assign("captcha", $captcha);
            return $this->fetch();
        } else {
            $checkData = $request->param();
            // var_dump($checkData);
            $h = $this->validate($checkData, [
                'captcha|验证码' => 'require|captcha',
            ]);
            // dump($h);die;
            if ($h === true) {
                $this->success('验证成功');
            } else {
                $this->error('验证失败');
            }

        }

    }

    //ajax
    public function test4(Request $request)
    {
        if ($request->isPost()) {
            dump($request->param());
        } else {
            return $this->fetch('test3');
        }
    }

    //json
    public function test5(Request $request)
    {
        sleep(3);
        $arr = $request->param();
        return json_encode($arr);
    }

    //分页
    public function test6()
    {
        $data = Db::name('people')->paginate(2);
        $page = $data->render();
        $this->assign('page', $page);
        $this->assign('data', $data);
        return $this->fetch();
    }

}
