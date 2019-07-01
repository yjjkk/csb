<?php
namespace app\admin\controller;
use app\admin\model\Banner as BannerModel;
use think\Controller;
use think\Db;
use think\Request;
class Banner extends Controller{
    public function bannerlist(){
        $a=input('get.');
        $data=[];
        $where=[];
        if (!empty($a['name'])) {
            $data['name']=$a['name'];
            $where['name']=['like','%'.$a['name'].'%'];
        }
        $arr=db('banner')->where($where)->order('id desc')->paginate(2,false,['query'=>$data]);

        return view('bannerlist',['array'=>$arr]);
    }
    //添加
    public function banneradd(){
        
        return view();
    }

    public function fileadd(){
        // dump(input('file.'));
        $file=request()->file('file');
       $info = $file->rule('uniqid')->move(ROOT_PATH . 'public' . DS . 'static/admin/banner');
       if($info){
            //返回json格式
            return json(['code'=>0,'msg'=>'','data'=>['src'=>'/static/admin/banner/'.$info->getFilename(),'title'=>$info->getFilename()]]);
        }else{
            // 上传失败获取错误信息
            return json(['code'=>1,'msg'=>$file->getError(),'data'=>[]]);
        }
    }

    public function add(){
        $arr=input('post.');
        $arr['addtime']=time();
        db('banner')->insert($arr);

    }


    public function update(){
        $arr=input('get.');
        db('banner')->update($arr);
    }
    

    public function del($id){
        db('banner')->delete($id);
        return view('banner/bannerlist');
    }
    //修改
    public function edit(){
        return view();
    }
}
 ?>

