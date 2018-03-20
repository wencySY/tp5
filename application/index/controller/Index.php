<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class Index extends Controller

{
    public function index()
    {
        return '<b>wency</b>';
    }
    public function hello($name = 'World')
    {
        $request = Request::instance();
        // 获取当前URL地址 不含域名
        echo 'url: ' . $request->url() . '<br/>';
        return 'Hello,' . $name . '！';
    }
    public function hello1($name = 'World')
    {
        // 获取当前URL地址 不含域名
        echo 'url: ' . $this->request->url() . '<br/>';
        return 'Hello,' . $name . '！';
    }
    public function hello3(Request $request)
    {
    	echo '请求参数：';
        dump(input());
        echo 'name:'.$request->param('name');
    }
     public function hello4(Request $request)
    {
        echo 'name:'.$request->param('name','World','strtolower');
        echo '<br/>test:'.$request->param('test','thinkphp','strtoupper');
    }
}
