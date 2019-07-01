<?php 
	namespace app\admin\controller;
	
	use think\Controller;
	use think\Request;
	use app\admin\model\Admin as A;

	class Index extends Controller
	{
		public function index() {
			return view('index');
		}
		public function admin_list(){
			$a=input('get.');
			$data=[];
			$where=[];
			if(!empty($a['adminname'])){
				$data['adminname']=$a['adminname'];
				$where['adminname']=['like',"%".$a['adminname']."%"];
			}
			$arr=db('admin')->where($where)->order('id desc')->paginate(1,false,['query'=>$data]);
			return view('admin_list',['array'=>$arr]);
		}

		public function update(){
			$arr=input('get.');
			$result=db('admin')->update($arr);
			return $result;
		}

		public function admin_edit(){
			$arr=input('get.');
			$result=db('admin')->find($arr['id']);
			return view('admin_edit',['array'=>$result]);
		}

		public function edit(){
			$arr=input('get.');
			$arr['adminpass']=md5($arr['adminpass']);
			$id=$arr['id'];
			$result=db('admin')->where('id',$id)->update($arr);
			
			// return $result;
		}

		public function del($id){
			$result=db('admin')->delete($id);
			return $result;
		}

		public function admin_add(){
			
			return view();
			
		}

		public function add(){
			$arr=input('get.');
			$arr['logintime']=time();
			$arr['adminpass']=md5($arr['adminpass']);
			$result=db('admin')->insert($arr);
			return $result;
		}
	}
 ?>