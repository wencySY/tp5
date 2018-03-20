<?php
namespace app\net\controller;

use think\Controller;
use think\Db;
use think\db\Query;

class Exercise extends Controller
{
	public function test(){
		return $this->fetch('navxiangying');
	}	
	public function test1(){
		return $this->fetch('yuancheng');
	}	
}