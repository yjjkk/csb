<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
// use thik\Request;

class Login extends Controller
{
            //账号密码验证
        public function account(Request $request){
                if (!session("?admin_name")) {
                //获取上次登录时间
                // $time=time();
                // //获取本次登录时间
                // $time1=time();
                //获取登录ip
                // $ip=$request->ip();
                //获取用户名
                $name=input("post.adminname");
                //获取密码
                $pass=input("post.adminpass");
                //获取验证码
                $code=input("post.code");
                $captcha = new \think\captcha\Captcha();
                //检测验证码是否正确
            if (!$captcha->check($code)) {
                 $this->error('验证码错误');
                } else {
                    //是否存在该用户
                    $list=Db::table("admin")->where("adminname",$name)->find();
                    //如果存在
                    if ($list) {
                        if ($list['state']==1) {
                             if (md5($pass)==$list['adminpass']) {
                                $sum=0;
                                if ($list['n']==0) {
                                    $sum=1;
                                }else{
                                    $sum=$list['n'];
                                    $sum+=1;
                                }
                                session('admin_n',$sum);
                                session('admin_name',$list['adminname']);
                                $time=session('admin_time',$list['logintime']);
                                session('admin_state',$list['state']);
                                // session('admin_ip',$list['laterip']);
                                session('admin_id',$list['id']);
                                session('admin_pass',$list['adminpass']);
                                $res=Db::table('admin')->where('id',$list["id"])->update(['logintime' => $time,'n'=>$sum]);
                                if ($res) {
                                    //$this->assign('list',$list);
                                    return view('index1/index');
                                }
                            }else{
                                $this->success('账号或密码错误!','admin/login/index');
                            }
                        }else{
                            $this->success('该用户已被停用！','admin/login/index');
                        }
                    }else{
                        $this->success('账号或密码错误!','admin/login/index');
                    }
                        }
                //$this->success('验证码正确');
                // return 2;
                }
                return view('index1/index');

                }
    public function index(){
        return view();
    }
    public function out(){
        session('admin_name',null);
        return view('index');
    }
}
