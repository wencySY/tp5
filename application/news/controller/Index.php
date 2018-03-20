<?php
namespace app\news\controller;

use app\news\model\Img;
use app\news\model\News as NewsModel;
use think\Controller;
use think\Db;
use think\Request;

/**
 *
 *
 */
class Index extends Controller
{
    public function test1(){
        return $this->fetch('login/register1');
    }    
    //新闻首页
    public function index()
    {
        // $db=Db::connect('news');
        $data0 = NewsModel::where('status', '0')->paginate(3, 7);
        $page0 = $data0->render();
        $data1 = NewsModel::where('status', '1')->select();
        $data2 = NewsModel::where('status', '2')->select();
        $data3 = NewsModel::where('status', '3')->select();
        $this->assign('page0', $page0);
        $this->assign('data0', $data0);
        $this->assign('data1', $data1);
        $this->assign('data2', $data2);
        $this->assign('data3', $data3);
        return $this->fetch();
    }
    //添加新闻
    public function add(Request $request)
    {
        if ($request->isPost()) {
            //添加新闻
            $info = $request->param();
            // dump($info);die;
            $news = new NewsModel();
            $news->data([
                'title'   => $info['title'],
                'author'  => $info['author'],
                'status'  => $info['status'],
                'content' => $info['content'],
            ]);
            $res = $news->save();
            if ($res) {
                //添加成功
                $this->success('新闻添加成功', url('index'), 3);
            } else {
                //添加失败
                $this->error('新闻添加失败');
            }
        } else {
            return $this->fetch();
        }
    }
    //展示新闻
    public function show(Request $request)
    {
        $info = $request->param();
        // dump($info);die;
        $id     = $info['id'];
        $db     = Db::connect('news');
        $data   = NewsModel::get($id);
        $imgarr = $db->name('img')->where('new_id', $id)->column('pic_add');
        if ($data) {
            $this->assign('data', $data);
            $this->assign('imgarr', $imgarr);
            return $this->fetch();
        } else {
            $this->error('新闻丢失了哦,┭┮﹏┭┮');
        }
    }

    public function edit(Request $request)
    {

        if ($request->isPost()) {
            $info = $request->param();
            // dump($info);die;
            $id   = $info['ida'];
            $data = NewsModel::get($id);
            if ($data) {
                $user = new NewsModel();

                $res = $user->save([
                    'title'   => $info['title'],
                    'author'  => $info['author'],
                    'status'  => $info['status'],
                    'content' => $info['content'],
                ],
                    ['id' => $id]
                );
                // dump($res);die;
                if ($res) {
                    $this->success('更新新闻成功', url('Index/index'), 3);
                } else {
                    $this->error('更新新闻失败');
                }

            } else {
                $this->error('您编辑的新闻不存在');
            }
        } else {
            $info = $request->param();
            $id   = $info['id'];
            $data = NewsModel::get($id);
            $this->assign('id', $id);
            $this->assign('data', $data);
            return $this->fetch();
        }

    }

    //添加图片
    public function addimg(Request $request)
    {
        if ($request->file()) {
            // 获取表单上传文件
            $data = $request->param();
            // dump($data);die;
            $files = $request->file('image');
            // dump($files);die;
            foreach ($files as $file) {
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads');
                if ($info) {
                    // 成功上传后 获取上传信息
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    $addimg = new Img();
                    $addimg->data(
                        [
                            'pic_add' => $info->getSaveName(),
                            'author'  => $data['author'],
                            'new_id'  => $data['new_id'],
                        ]
                    );
                    $res = $addimg->save();
                    if ($res) {
                        $this->success('图片添加成功', url('index'), 3);
                    } else {
                        $this->error('图片添加失败');
                    }

                } else {
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }
        } else {
            return $this->fetch();
        }

    }

}
