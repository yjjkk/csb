<?php
namespace app\admin\controller;
use think\Controller;
class Order extends Controller
{
    public function orderlist(){
    	$a=input('get.');
    	$data=[];
    	$where=[];
    	if (!empty($a)) {
    		$data['state']=$a['state'];
            $data['hao']=$a['hao'];
    		$data['uid']=$a['uid'];
    		$where['state']=['like','%'.$data['state'].'%'];
            $where['hao']=['like','%'.$data['hao'].'%'];
    		$where['uid']=['like','%'.$data['uid'].'%'];
    		$arr=db('orders')->where($where)->paginate(1,false,['query'=>$data]);
    	}else{

    		$arr=db('orders')->paginate(2);
    	}
    	return view('orderlist',['array'=>$arr]);

    }

    public function update(){
    	$arr=input('get.');
    	db('orders')->update($arr);
    }

    public function del($id){
    	db('orders')->delete($id);

    }
}
 ?>
