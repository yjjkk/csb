<?php 
namespace  app\admin\controller;
use think\Controller;
class Index1 extends Controller{
	public function index(){
		$this->assign('adminname',session('admin_name'));
		return $this->fetch();
	}
	public function welcome(){
    $this->assign('adminname',session('admin_id'));
		return $this->fetch();
	}

	public function member_list(){
		return view();
	}

	public function order_list(){
		return view();
	}

	public function cate(){
		return view();
	}

	public function city(){
		return view();
	}
}
 ?>
