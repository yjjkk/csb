<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\phpStudy\WWW\bqq\public/../application/admin\view\login\index.html";i:1561692069;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link href="/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="<?php echo url('admin/login/account'); ?>" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input name="adminname" type="text" placeholder="账户" class="input-text size-L" required>
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input name="adminpass" type="password" placeholder="密码" class="input-text size-L"  pattern="^\w{6,16}$" required>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
            <ul>
                <li style="float:left;">
                  <div style="width:240px;height:40px;background:white;">
                    <INPUT type="text" class="text" name="code" placeholder="输入验证码" style="height:40px;border:none;margin-left:10px;font-size:16px;" required>
                  </div>
                </li>
                <li class="symbol" style="float:left;width:20px;">
                  <div style="width:20px;height:40px;text-align:center;line-height:40px;"></div>
                </li>
                <li style="float:left;">
                  <div style="width:100px;height:40px;"><img style="width:100px;height:40px;" src="<?php echo captcha_src(4); ?>" alt="" onclick="this.src='/captcha'"></div>
                </li>
            </ul>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <!-- <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label> -->
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" class="btn btn-success radius size-L" style="width:200px;height:41px;margin-left:75px;" type="submit"  value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 你的公司名称 by Mall.admin v3.1</div>
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
<script>
     // $(function(){
    //     $(".btn btn-success radius size-L").click(function(event) {
    //         // alert(111);
    //         var val=$(".text").val();

    //         /* Act on the event */

    //         $.post("<?php echo url('admin/login/check'); ?>", {val: val}, function(data) {
    //             /*optional stuff to do after success */
    //             if (data==2) {
    //                 $(".symbol>div").append("<span style='color:green'>✔</span>");
    //             }else{
    //                 $(".symbol>div").append("<span style='color:red'>✘</span>");
    //             }
    //         },'text');
    //        });
    //     $(".text").focus(function(event) {
    //           //Act on the event
    //          $(".symbol>div>span").remove();
    //      });

         // $("button").click(function(data){
         //   var name=$("input[name=username]").val();
         //   var pass=$("input[name=pass]").val();
         //   $.post("<?php echo url('admin/login/account'); ?>", {name:name,pass:pass}, function(data) {
         //    if (data==1) {
         //      alert("成功!");
         //    }else{
         //      alert("失败!");
         //    }
         //   });
         // });
    // });
</script>
</body>
</html>