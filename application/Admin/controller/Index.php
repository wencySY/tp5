<?php
namespace app\Admin\controller;
use think\Request;
use think\Db;
// use think\db\Query;

class Index
{
    public function index()
    {
        return phpinfo();
    }
    public function test($name=' world',$wency='aaa'){
    	return 'Hello '.$name.'!'.$wency;
    }	
    public function test1(Request $request){
    	/*
    	domain 获取当前的域名
		url 获取当前的完整URL地址
		baseUrl 获取当前的URL地址，不含QUERY_STRING
		baseFile 获取当前的SCRIPT_NAME
		root 获取当前URL的root地址
		*/
    	dump($request->domain());	// http://localhost:8080
    	echo '<hr>';
    	dump($request->url());		// /tp5/public/admin/index/test1.html
    	echo '<hr>';
    	dump($request->baseUrl());	// /tp5/public/admin/index/test1.html
    	echo '<hr>';
    	dump($request->baseFile());	// /tp5/public/index.php
    	echo '<hr>';
    	dump($request->root());		// /tp5/public
    	/*
    	pathinfo 获取当前URL的pathinfo地址
    	path 获取当前URL的pathinfo地址，不含后缀
		ext 获取当前URL的后缀
		type 获取当前请求的资源类型
		scheme 获取当前请求的scheme
		query 获取当前URL地址的QUERY_STRING
		host 获取当前URL的host地址
		port 获取当前URL的port号
		protocol 获取当前请求的SERVER_PROTOCOL
		remotePort 获取当前请求的REMOTE_PORT
		*/
		echo '<hr>';
    	dump($request->pathinfo());		// admin/index/test1.html
    	echo '<hr>';
    	dump($request->path());			// admin/index/test1
    	echo '<hr>';
    	dump($request->ext());			// html
    	echo '<hr>';
    	dump($request->type());			// xml
    	echo '<hr>';
    	dump($request->scheme());		// http
    	echo '<hr>';
    	dump($request->query());		// ''
    	echo '<hr>';
    	dump($request->host());			// localhost:8080
    	echo '<hr>';
    	dump($request->port());			// 8080
    	echo '<hr>';
    	dump($request->protocol());		// HTTP/1.1
    	echo '<hr>';
    	dump($request->remotePort());	// 1569

    }	

    public function test2(Request $request){
    	echo '模块:'.$request->module();
    	echo '<br>';
    	echo '控制器:'.$request->controller();
    	echo '<br>';
    	echo '方法:'.$request->action();
    }	

    public function test3(Request $request,$name='world'){
    	echo '路由信息：';
		dump($request->routeInfo());
		echo '调度信息：';
		dump($request->dispatch());
		return 'Hello,' . $name . '！';
    }	

    public function test4(){
    	$data=['name'=>'wency','sex'=>'男'];
    	return json($data);
    }	

    // 使用原生查询语句
    public function test5(){
    	// 增加
    	// $result = Db::execute('insert into think_data (id, name ,status) values (5, "thinkphp", 1)');
		// 查询 
		// $result = Db::query('select * from think_data');
		// 修改
		// $result = Db::execute("update think_data set id=4 where id=5"); 
		// 删除
		// $result  = Db::execute("delete from think_data where id=4");
		echo '<pre>';
		dump($result);
    }	

    // 使用查询构造器	可以链式操作
    public function test6(){
    	/*
    	name 不带表前缀
    	table 完整的数据表名
    	 */
    	// 插入
    	// $res=Db::name('data')->insert(['id' => 5,'name' => 'wency','status' => 1]);
    	// 更新
    	// $res=Db::table('think_data')->where('id',5)->update(['name' => 'wen']);
    	// 查询
    	// $res=Db::table('think_data')->where('id',5)->select();
    	// 删除
    	// $res=Db::table('think_data')->where('id',5)->delete();
    	dump($res);
    }	

    // 使用助手函数db	db助手函数默认会每次重新连接数据库，因此应当尽量避免多次调用。
    public function test7(){
    	$db=db('data');
    	$res=$db->select();
    	echo '<pre>';
    	dump($res);
    }	

    //事务操作  
    public function test8(){
    	Db::transaction(function(){
    		//连接不同的数据库
    		// $db=Db::connect('wency');
    		// $res=$db->query("UPDATE `member` SET `nickname` = 'aaab' WHERE `member`.`id` = 5");
    		// dump($res);
    		// 引入对象
    		$Query=new \think\db\Query();
    		// 连接相应的数据库
    		$Query->connect('wency');
    		$Query->table('member')->where('id',5)->update(['nickname'=>'wency']);
    		$Query->table('hello')->where('id',25)->update(['msg'=>'11111111']);
    	});
    }		
}

