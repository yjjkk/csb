<?php 
	namespace app\admin\controller;
	
	use think\Controller;
	use think\Request;
	use app\admin\model\Admin as A;

	class Index extends Controller
	{
		public function index(){
			return view();
		}
	}
 ?>