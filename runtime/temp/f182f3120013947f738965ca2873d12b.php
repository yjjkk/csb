<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"F:\phpStudy\PHPTutorial\WWW\bqq\public/../application/admin\view\banner\bannerlist.html";i:1561965583;}*/ ?>
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
<form class="layui-form layui-col-space5" method='get' action='/admin/banner/bannerlist'>
                                
                                
                                <div class="layui-inline layui-show-xs-block">
<input type="text" name="name"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
<button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
 <div class="layui-card-header">
   

<!-- 仅超级管理添加          -->
<button class="layui-btn" onclick="xadmin.open('添加用户','/admin/banner/banneradd',600,400)"><i class="layui-icon"></i>添加</button>




                        </div>                   
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    
                                    <th>ID</th>
                                    <th>Banner名</th>
                                    <th>缩略图</th>
                                    <th>路径</th>
                                    <th>上传时间</th>

                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($array as $v): ?>
                                  <tr>
                                   
                                    
                                    <td><?php echo $v['id']; ?></td>
                                    <td><?php echo $v['name']; ?></td>
                                    <td><img src="<?php echo $v['picname']; ?>"></td>
                                    <td><?php echo $v['picname']; ?></td>
                                    <td><?php echo date("Y-m-d H:i:s",$v['addtime']); ?></td>

 <?php if($v['state']==1): ?>                                   
<td class="td-status">

<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
<?php else: ?>
<td class="td-status">
<span class="layui-btn layui-btn-danger layui-btn-mini">已停用</span></td>
<?php endif; ?>


<td class="td-manage">
<?php if($v['state']==0): ?>
<a onclick="bannerstop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="启用"><i class="layui-icon">&#xe601;</i> </a>
<?php else: ?>
<a onclick="bannerstop(this,'<?php echo $v['id']; ?>')" href="javascript:;"  title="停用"><i class="layui-icon">&#xe62f;</i> </a>
<?php endif; ?>
<a title="删除" onclick="banner_del(this,'<?php echo $v['id']; ?>')" href="javascript:;">
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
                                 <?php echo $array->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script type="text/javascript">
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;


        // 监听全选
        form.on('checkbox(checkall)', function(data){

          if(data.elem.checked){
            $('tbody input').prop('checked',true);
          }else{
            $('tbody input').prop('checked',false);
          }
          form.render('checkbox');
        }); 
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });


      });

       
     
      /*用户-删除*/
      function banner_del(obj,id){
          layer.confirm('确认要删除吗',function(index){
              //发异步删除数据
              $.get("<?php echo url('/admin/banner/del'); ?>",{id:id})
              $(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
      }

    </script>
    <script type="text/javascript">
      /*用户-停用*/
      function bannerstop(obj,id){
        layer.confirm('确认要更改吗？',function(index){

              if($(obj).attr('title')=='启用'){
                $.get("<?php echo url('/admin/banner/update'); ?>",{id:id,state:1})
                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-danger').addClass('layui-btn-normal').html('已启用');
                layer.msg('已启用!',{icon: 6,time:1000});

              }else{
                $.get("<?php echo url('/admin/banner/update'); ?>",{id:id,state:0})
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-normal').addClass('layui-btn-danger').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});
              }
              
          });
      }
    </script>
</html>