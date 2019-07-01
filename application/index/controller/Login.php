<?php
namespace app\index\Controller;
use think\Controller;
use think\Session;
use think\Request;
use think\Db;
use app\index\model\Login as LoginModel;
class Login extends Controller{
    public function login(){
        Session('phone',null);
        return view("login/login");
    }
    public function register(){
        return view("login/register");
    }
    //注册
    public function add(Request $request){
        $data = $request->post('formdata');
        parse_str($data,$arr);
        $phone=$arr['phone'];
        $pass=$arr['adminpass'];
        $smscode=$arr['smscode'];
        $addtime = date('Y-m-d H:i:s');
        $code=Session::get('code');
        if($code==$smscode){
            $list = Db::name('admin')
            ->where('phone',$arr['phone'])
            ->find();
            if ($list==null) {
                $add = Db::name('admin')
                ->insert(["phone"=>$phone,"adminpass"=>$pass,"logintime"=>$addtime]);
                if ($add==1) {
                    echo 1;
                }else{
                    echo 0;
                }
            }else{
                echo 2;
            }
          }else{
             echo 3;
         }

    }
    //查询登陆和数据库匹配
    public function select(Request $request){
        $data=$request->post('formdata');
        parse_str($data,$arr);
        $phone=$arr["phone"];
        dump($phone);
        $pass=$arr['pass'];

        $list=Db::name("admin")
        ->where("phone",$phone)
        ->find();
        if($list){
            Session::set("phone",$phone);
            if($list['adminpass']==$pass){
                if($list['state']==0){
                    return 1;
                }else{
                    return 3;
                }
            }else{
                return 2;
            }
        }else{
            return 0;
        }

    }
        //验证码
    public function code(Request $request){
        $phone=$request->post("phone");
        $list = Db::name('admin')
        ->where('phone',$phone)
        ->find();
        if ($list) {
            return 6;
        }else{
                $host = "https://cxkjsms.market.alicloudapi.com";
                $path = "/chuangxinsms/dxjk";
                $method = "POST";
                $appcode = "0fa02554af8243be8634e1c7a94433ef";
                $headers = array();
                $code=mt_rand(0000,9999);
                array_push($headers, "Authorization:APPCODE " . $appcode);
                $querys = "content=【创信】你的验证码是：{$code}，3分钟内有效！&mobile={$phone}";
                $bodys = "";
                $url = $host . $path . "?" . $querys;

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_FAILONERROR, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HEADER, true);
                if (1 == strpos("$".$host, "https://"))
                {
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                }
                $out_put = curl_exec($curl);
                $arr = json_decode($out_put,true);
                if ($arr['Message'] == "ok") {
                    return 4;
                }else{
                    Session::set("code",$code);
                    Session::set("phone",$phone);
                    return 5;
                }
        }
    }
        public function login1(){
        Session("log",null);
        return $this->fetch("index/Login/login");
    }
  }
 ?>
