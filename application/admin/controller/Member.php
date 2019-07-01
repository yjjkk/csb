<?php
namespace app\admin\controller;
use think\Controller;
class Member extends Controller
{
    public function memberlist(){
        $a=input('post.');
        $data=[];
        $where=[];
        
        $sex=['m'=>'男','w'=>'女'];
        if (!empty($a['username'])) {
            $data['username']=$a['username'];
            $where['username']=['like','%'.$data['username'].'%'];
        }
        $arr=db('user')->where($where)->order('id desc')->paginate(2);
    	return view('memberlist',['array'=>$arr,'sex'=>$sex]);
    }

    public function update(){
    	$arr=input('get.');
    	$id=$arr['id'];
        
    	$result=db('user')->where('id',$id)->update($arr);
        return $result;
    }

    public function del($id){
        $result=db('user')->delete($id);
    }


}
 ?>
