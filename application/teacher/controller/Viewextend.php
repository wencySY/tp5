<?php
namespace app\teacher\controller;

use think\Controller;

/**
 *
 */
class Viewextend extends Controller
{
    public function test1()
    {
    	$title='修改标题';
        $name = '张三';
        $this->assign('title', $title);
        $this->assign('name', $name);
        return $this->fetch();
    }
    public function test2(){
    	$name = '张三';
        // $this->assign('title', $title);
        $this->assign('name', $name);
        return $this->fetch();
    }	

    

}
