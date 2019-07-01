<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"F:\phpStudy\PHPTutorial\WWW\bqq\public/../application/admin\view\banner\banneradd.html";i:1561968195;}*/ ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
            X-admin v1.0
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/static/admin/css/x-admin.css" media="all">
        <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css"  media="all">
    </head>
    
    <body>
        <div class="x-body">
            <form class="layui-form" enctype="multipart/form-data" action="<?php echo url('admin/banner/add'); ?>" method="post">
              
              


<div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>图片上传
                    </label>
                    <div class="layui-upload">
                      <button type="file" name='image' class="layui-btn" id="test1">上传图片</button>
                      <div class="layui-upload-list">
<img class="layui-upload-img" id="demo1" width='150' style='margin-left:50px'>
                        <p id="demoText"></p>
                      </div>
                    </div>   
                </div>


<span style="margin-left:36px">图片路径</span>
<input type="text" id="image" readonly="" value="" name="picname"><br><br>

<input type="hidden" name="state" value="0">


                
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red"></span>Banner名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        增加
                    </button>

                </div>
            </form>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8">
        </script>
        <script>
            layui.use(['form','layer','upload'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;


              //图片上传接口
              layui.upload({
                url: './upload.json' //上传接口
                ,success: function(res){ //上传成功后的回调
                    console.log(res);
                  $('#LAY_demo_upload').attr('src',res.url);
                }
              });
            

              //监听提交
              // form.on('submit(add)', function(data){
              //   console.log(data);
              //   //发异步，把数据提交给php
              //   layer.alert("增加成功", {icon: 6},function () {
              //       // 获得frame索引
              //       var index = parent.layer.getFrameIndex(window.name);
              //       //关闭当前frame
              //       parent.layer.close(index);
              //   });
              //   return false;
              // });
              
              
            });
        </script>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
    <script type="text/javascript">
            layui.use('upload', function(){
              var $ = layui.jquery
              ,upload = layui.upload;
              
              //普通图片上传
              var uploadInst = upload.render({
                elem: '#test1'
                ,url: "<?php echo url('admin/banner/fileadd'); ?>"
                ,before: function(obj){
                  //预读本地文件示例，不支持ie8
                  obj.preview(function(index, file, result){
                    $('#demo1').attr('src', result); //图片链接（base64）
                  });
                }
                ,done: function(res){
                  //如果上传失败
                  if(res.code > 0){
                    return layer.msg('上传失败');
                  }else{
                    
                  }
                  //上传成功
                  
                     $('#image').val(res.data.src);
                     // 可以对父窗口进行刷新 
                        xadmin.father_reload();
                     // console.log(res.data.title);
                //获得frame索引
                    // var index = parent.layer.getFrameIndex(window.name);
                    // //关闭当前frame
                    // parent.layer.close(index);   
                
                  
                }
                ,error: function(){
                  //演示失败状态，并实现重传
                  var demoText = $('#demoText');
                  demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                  demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                  });
                }
              });
            });
        </script>
</html>