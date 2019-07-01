<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"F:\phpStudy\PHPTutorial\WWW\Demo\public/../application/admin\view\index\admin_list.html";i:1561630571;}*/ ?>
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
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5">
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-header">
                    
<button class="layui-btn" onclick="xadmin.open('添加用户','/admin_add',600,400)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th>
                                    <input type="checkbox" name=""  lay-skin="primary">
                                  </th>
                                  <th>ID</th>
                                  <th>登录名</th>
                              
                                  <th>角色</th>
                                  <th>加入时间</th>
                                  <th>状态</th>
                                  <th>操作</th>
                              </thead>
                              <tbody>
                                <?php foreach($array as $v): ?>
                                <tr>
                                  <td>
                                    <input type="checkbox" name=""  lay-skin="primary">
                                  </td>
                                  <td><?php echo $v['id']; ?></td>
                                  <td><?php echo $v['adminname']; ?></td>
                                 
                                  <?php if($v['quanxian']==0): ?>
                                  <td>超级管理员</td>
                                  <?php else: ?>
                                  <td>普通管理员</td>
                                  <?php endif; ?>
                                  <td> <?php echo date("Y-m-d H:i:s",$v['logintime']); ?></td>
                                  <?php if($v['state']==1): ?>
                                  <td class="td-status">
                                    <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                    <?php else: ?>
                                    <td class="td-status">
                                    <span class="layui-btn layui-btn-danger layui-btn-mini">已停用</span></td>
                                    <?php endif; ?>

 <td class="td-manage">
  <?php if($v['state']==0): ?>
<a onclick="member_stop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="启用">
<i class="layui-icon">&#xe601;</i>
<?php else: ?>
<a onclick="member_stop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="停用">
<i class="layui-icon">&#xe62f;</i>
<?php endif; ?>
                                    </a>
 <a title="编辑"  onclick="xadmin.open('编辑','admin_edit?id=<?php echo $v['id']; ?>')" href="javascript:;">
 <i class="layui-icon">&#xe642;</i>
                                    </a>
<a title="删除" onclick="member_del(this,'<?php echo $v['id']; ?>')" href="javascript:;">
 <i class="layui-icon">&#xe640;</i>
                                    </a>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                  <a class="prev" href="">&lt;&lt;</a>
                                  <a class="num" href="">1</a>
                                  <span class="current">2</span>
                                  <a class="num" href="">3</a>
                                  <a class="num" href="">489</a>
                                  <a class="next" href="">&gt;&gt;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var form = layui.form;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要更改吗？',function(index){

              if($(obj).attr('title')=='启用'){
                $.get("<?php echo url('/admin/index/update'); ?>",{id:id,state:1})
                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-danger').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});

              }else{
                $.get("<?php echo url('/admin/index/update'); ?>",{id:id,state:0})
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-normal').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});
              }
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
            $.get("<?php echo url('/admin/index/del'); ?>",{id:id})
              //发异步删除数据
              $(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
</html>