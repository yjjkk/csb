<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"F:\phpStudy\PHPTutorial\WWW\bqq\public/../application/admin\view\cate\cate.html";i:1561982954;}*/ ?>
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
        <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
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
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
<form class="layui-form layui-col-space5" action="<?php echo url('admin/cate/cate'); ?>" method="get">
                                <div class="layui-input-inline layui-show-xs-block">
 <input class="layui-input" placeholder="分类名" name="name"></div>
                                <div class="layui-input-inline layui-show-xs-block">
<button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon"></i>搜索</button>
                                </div>
                            </form>
                            <hr>
                            
                        </div>
                        <div class="layui-card-header">
<button class="layui-btn" onclick="xadmin.open('添加顶级分类','/admin/cate/cateadd',600,400)"><i class="layui-icon"></i>添加顶级分类</button>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                
                                  <th width="70">ID</th>
                                  <th>顶级类名</th>
                                
                                  <th width="80">状态</th>
                                  <th width="250">操作</th>
                              </thead>
                              <tbody class="x-cate">


<?php foreach($array as $v): ?>
<tr cate-id='<?php echo $v['id']; ?>' fid='<?php echo $v['pid']; ?>' >
                                 
                                  <td><?php echo $v['id']; ?></td>

<td>
<?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',substr_count($v['path'],',')); if(in_array($v['id'],$newarr)): ?>
  <i class="layui-icon x-show" status='true'>&#xe623;</i>
<?php else: ?>
|--
<?php endif; ?>
<?php echo $v['name']; ?>
</td>
                                  
<td>
<?php if($v['state']==1): ?>
<input type="checkbox" name="switch"  lay-text="开启|停用" id="<?php echo $v['id']; ?>"  checked="" lay-skin="switch" lay-filter="switchTest">
<?php else: ?>
<input type="checkbox" name="switch"  lay-text="开启|停用" id="<?php echo $v['id']; ?>" lay-skin="switch" lay-filter="switchTest">
<?php endif; ?>
                                  </td>
                                  <td class="td-manage">
<button class="layui-btn layui-btn layui-btn-xs"  onclick="xadmin.open('编辑','<?php echo url('admin/cate/cateupdate'); ?>?id=<?php echo $v['id']; ?>')" ><i class="layui-icon">&#xe642;</i>编辑</button>
<button class="layui-btn layui-btn-warm layui-btn-xs"  onclick="xadmin.open('添加子栏目','<?php echo url('admin/cate/addson'); ?>?id=<?php echo $v['id']; ?>&path=<?php echo $v['path']; ?>')" ><i class="layui-icon">&#xe642;</i>添加子栏目</button>
<button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del(this,'<?php echo $v['id']; ?>')" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
                                  </td>
</tr>
<?php endforeach; ?>
                               
                              </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                  
                                  
                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
          layui.use(['form'], function(){


            form = layui.form;
            form.on('switch(switchTest)', function(data){
                 id=data.elem.id
                 state=this.checked ? '1' : '0'
                 $.get("<?php echo url('admin/cate/update'); ?>",{id:id,state:state})
                layer.msg('开关checked：'+ (this.checked ? '1' : '0'), {
                  offset: '6px'
                });
               
              });
          });

           /*用户-删除*/
          function member_del(obj,id){
              layer.confirm('确认要删除吗？',function(index){
                  //发异步删除数据
                  $.get("<?php echo url('admin/cate/del'); ?>",{id:id})
                  $(obj).parents("tr").remove();
                  layer.msg('已删除!',{icon:1,time:1000});
              });
          }

          // 分类展开收起的分类的逻辑
          //
          $(function(){
            $("tbody.x-cate tr[fid!='0']").hide();
            // 栏目多级显示效果
            $('.x-show').click(function () {
                if($(this).attr('status')=='true'){
                    $(this).html('&#xe625;');
                    $(this).attr('status','false');
                    cateId = $(this).parents('tr').attr('cate-id');
                    $("tbody tr[fid="+cateId+"]").show();
               }else{
                    cateIds = [];
                    $(this).html('&#xe623;');
                    $(this).attr('status','true');
                    cateId = $(this).parents('tr').attr('cate-id');
                    getCateId(cateId);
                    for (var i in cateIds) {
                        $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
                    }
               }
            })
          })

          var cateIds = [];
          function getCateId(cateId) {
              $("tbody tr[fid="+cateId+"]").each(function(index, el) {
                  id = $(el).attr('cate-id');
                  cateIds.push(id);
                  getCateId(id);
              });
          }

        </script>
    </body>
</html>
