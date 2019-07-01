<?php
namespace app\admin\controller;
use think\Controller;
class Cate extends Controller
{
    public function cate(){
    	$search=input('get.name');

    	$data=[];
    	$where=[];
    	// $data['name']=$search;
    	$where['name']=['like','%'.$search.'%'];
    	$arr=db('type')->where($where)->field(['state','id','name','pid','path','concat(path,id)'=>'p'])->order('p')->select();
    	$arrpid=db('type')->field('pid')->select();
    	foreach ($arrpid as $v) {
    		$newarr[]=$v['pid'];
    	}
        return view('cate',['array'=>$arr,'newarr'=>$newarr]);
    }

    public function update(){
    	$arr=input('get.');
    	db('type')->update($arr);

    }

    public function cateadd(){
    	return view();
    }

    public function add(){
    	$arr=input('get.');
    	db('type')->insert($arr);
    }

    public function del($id){
    	db('type')->delete($id);
    }

    public function addson(){
    	$arr=input('get.');
    	return view('addson',['arr'=>$arr]);
    }

    public function adds(){
    	$arr=input('get.');
    	db('type')->insert($arr);
    }

    public function cateupdate(){
    	$get=input('get.');
    	$arr=db('type')->find($get['id']);
    	return view ('cateupdate',['arr'=>$arr]);

    }

    public function edit(){
    	$arr=input('get.');
    	db('type')->where('id',$arr['id'])->update($arr);

    }


}
 ?>
