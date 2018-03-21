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
	public function index(){
		return $this->fetch('exercise/demo/index');
	}	
	public function information(){
		return $this->fetch('exercise/demo/information');
	}		
	public function example(){
		return $this->fetch('exercise/demo/example');
	}	
	public function about(){
		return $this->fetch('exercise/demo/about');
	}	
}