<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"F:\phpStudy\PHPTutorial\WWW\bqq\public/../application/admin\view\index\admin_edit.html";i:1561638032;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/static/admin/css/font.css">
        <link rel="stylesheet" href="/static/admin/css/xadmin.css">
        <script type="text/javascript" src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
      
<form class="layui-form">
                  <div class="layui-form-item">
<label for="username" class="layui-form-label">
<span class="x-red">*</span>登录名
 </label>
                      <div class="layui-input-inline">
<input type="text" id="username" name="adminname" required="" lay-verify="required"
                          autocomplete="off" class="layui-input" value='<?php echo $array['adminname']; ?>'>
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                          <span class="x-red">*</span>将会成为您唯一的登入名
                      </div>
                  </div>
                 
                  
                  <div class="layui-form-item">
                      <label class="layui-form-label"><span class="x-red">*</span>角色</label>
<div class="layui-input-block">
  <?php if($array['quanxian']==0): ?>
<input type="radio" name="quanxian" value='0' lay-skin="primary" title="超级管理员" checked>
<input type="radio" name="quanxian" value='1' lay-skin="primary" title="普通管理员">
<?php else: ?>
<input type="radio" name="quanxian" value='0' lay-skin="primary" title="超级管理员">
<input type="radio" name="quanxian" value='1' lay-skin="primary" title="普通管理员" checked>
<?php endif; ?>
</div>
                  </div>
                  <div class="layui-form-item">
                      <label for="L_pass" class="layui-form-label">
                          <span class="x-red">*</span>密码
                      </label>
                      <div class="layui-input-inline">
<input type="password" id="L_pass" name="adminpass" required="" lay-verify="adminpass"
                          autocomplete="off" class="layui-input">
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                          6到16个字符
                      </div>
                  </div>
                  
                  <div class="layui-form-item">
                      <label for="L_repass" class="layui-form-label">
                      </label>
                      <button  class="layui-btn" lay-filter="edit" lay-submit="">
                          增加
                      </button>
                  </div>
</form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                form.verify({
                    // nikename: function(value) {
                    //     if (value.length < 5) {
                    //         return '昵称至少得5个字符啊';
                    //     }
                    // },
                    
                    adminpass: [/(.+){6,12}$/, '密码必须6到12位'],
                    
                });

                //监听提交
                 form.on('submit(edit)',
                function(data) {
                    console.log(data.field);
                    $.get("<?php echo url('admin/index/edit'); ?>"+"?id=<?php echo $array['id']; ?>",data.field)
                    //发异步，把数据提交给php
                    layer.alert("修改成功", {
                        icon: 6
                    },
                    function() {
                        // 关闭当前frame
                        xadmin.close();

                        // 可以对父窗口进行刷新 
                        xadmin.father_reload();
                    });
                    return false;
                });


            });</script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>
