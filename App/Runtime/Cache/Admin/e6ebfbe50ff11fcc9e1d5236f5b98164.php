<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
<title><?php echo C('SITENAME');?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/MyBlog/Public/Admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="/MyBlog/Public/Admin/css/animate.min.css" rel="stylesheet">  
    <link href="/MyBlog/Public/Admin/css/style.min.css?v=4.0.0" rel="stylesheet">	
    <link href="/MyBlog/Public/Admin/css/uploadfile.css" rel="stylesheet">
   	<script src="/MyBlog/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
   
</head>

	<style>
.pages a,.pages span {
    display:inline-block;
    padding:4px 7px;
    margin:0 2px;
    border:1px solid #D5D4D4;
    -webkit-border-radius:1px;
    -moz-border-radius:1px;
    border-radius:1px;
}
.pages a,.pages li {
    display:inline-block;
    list-style: none;
    text-decoration:none; color:#077ee3;
}

.pages a:hover{
    border-color:#077ee3;
}
.pages span.current{
    background:#077ee3;
    color:#FFF;
    font-weight:700;
    border-color:#077ee3;
}

.long-tr th{
	text-align: center
}
.long-td td{
	text-align: center
}

</style>


	<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">

		     <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/MyBlog/Uploads/<?php echo ($user['head_img']); ?>" width="70px" height="70px"/></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong><?php echo ($user['nickname']); ?></strong></span>
                                <span class="text-muted text-xs block">
                                	<?php if($user["username"] == C('RBAC_SUPERADMIN') ): ?>超级管理员
                                		<?php else: ?>
	                                	<?php if(is_array($head_role)): $i = 0; $__LIST__ = $head_role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($user["role"] == $vo2["id"] ): echo ($vo2["name"]); endif; ?>
											<?php if($user["username"] == C('RBAC_SUPERADMIN')): ?>超级管理员<?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                                	<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo U('Index/cpwd');?>">修改密码</a>
                                </li>
                                <li><a href="<?php echo U('Index/delCache');?>">清除缓存</a>
                                </li>
                                <li><a href="<?php echo U('Site/index');?>">设置</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="javascript:;"  id="logout">退出系统</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                               
													
					  <li> 
					    <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['pid'] == 1): if($vo['single'] == 1): ?><li            
					                <?php if((strtolower($nownav['ct']) == strtolower($vo['ct']))): ?>class="active"<?php endif; ?>
					                ><a href="<?php echo U($vo['ct'].'/'.$vo['at']);?>"><i class="icon <?php echo ($vo["icon"]); ?>"></i> <span><?php echo ($vo["title"]); ?></span>
					                	<span class="label label-danger pull-right"></span></a></li>
					        <?php else: ?>
					            <li class="submenu 
					                <?php if((strtolower($nownav['ct']) == strtolower($vo['ct']))): ?>active<?php endif; ?>
					                "
					             > <a href="#"><i class="icon <?php echo ($vo["icon"]); ?>"></i> <span><?php echo ($vo["title"]); ?></span><span class="fa arrow"></a>
					              <ul class="nav nav-second-level">
					                  <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subnode): $mod = ($i % 2 );++$i; if($subnode['pid'] == $vo['id']): ?><li  
			                                   <?php if((strtolower($nownav['ct']) == strtolower($subnode['ct']) ) && (strtolower($nownav['at']) == strtolower($subnode['at']) )): ?>class="active"<?php endif; ?>
			                                ><a href="<?php echo U($subnode['ct'].'/'.$subnode['at']);?>"><?php echo ($subnode['title']); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					              </ul><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
					  </li>									
					
                </ul>
            </div>
        </nav>


	<script type="text/javascript">
	$(document).ready(function(){
		$("#logout").click(function(){
			layer.confirm('你确定要退出吗？', {icon: 3}, function(index){
		    layer.close(index);
		    window.location.href="<?php echo U('Login/loginOut');?>";
		});
		});
	});
	</script>
    <div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row border-bottom">
	<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
			<form role="search" class="navbar-form-custom" method="post" action="search_results.html">
				<div class="form-group">
					<input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
				</div>
			</form>
		</div>
		<ul class="nav navbar-top-links navbar-right">

			<li>
				<span class="m-r-sm text-muted welcome-message">
					<a href="<?php echo U('Index/index');?>" title="返回首页"><i class="fa fa-home"></i></a>欢迎使用<?php echo C('SITENAME');?>
					<span class="label label-danger pull-right"><?php echo ($Os); ?></span>
				</span>
			</li>
			<li class="hidden-xs">
				<a href="https://www.baidu.com/" target="_blank" class="J_menuItem" data-index="0"><i class="fa fa-cart-arrow-down"></i> 前台首页 </a>
			</li>
			<li>
				<a href="javascript:;"  id="loginout">
					<i class="fa fa-sign-out"></i> 退出
				</a>
			</li>
		</ul>
	</nav>
</div>

<script src="/MyBlog/Public/Admin/layer/layer.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#loginout").click(function(){
		layer.confirm('你确定要退出吗？', {icon: 3}, function(index){
	    layer.close(index);
	    window.location.href="<?php echo U('Login/loginOut');?>";
	});
	});
});
</script>


		<div class="row">
			<div class="col-sm-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content no-padding">
						<ul class="list-group">
							<li class="list-group-item">
								<p class="text-success"><a href="<?php echo U('Index/index');?>" title="返回首页" class="tip-bottom"><i class="fa fa-home"></i> 首页</a> /
									<a href="#" class="tip-bottom"> 系统管理</a> / <a href="<?php echo U('System/userlist');?>" class="tip-bottom">用户管理</a></p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<a href="<?php echo U('System/addUser');?>" class="btn btn-primary">添加用户</a>
		<br />
		<br />
		<div class="row">
			<div class="col-sm-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5><i class="fa fa-tasks"></i> 用户列表</h5>
					</div>
					<div class="ibox-content">
						<table class="table table-bordered">
							<thead>
								<tr class="long-tr">
									<th>编号</th>
									<th>登陆账号</th>
									<th>显示名称</th>
									<th>头像</th>
									<th>所属角色</th>
									<th>状态</th>
									<th>添加时间</th>
									<th>最后登陆时间</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($user_list)): $val = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($val % 2 );++$val;?><tr class="long-td">
										<td><?php echo ($val); ?></td>
										<td><?php echo ($vo["username"]); ?></td>
										<td><?php echo ($vo["nickname"]); ?></td>
										<td><img class="img-circle" src="/MyBlog/Uploads/<?php echo ((isset($vo["head_img"]) && ($vo["head_img"] !== ""))?($vo["head_img"]):'userImg.jpg'); ?>" style="width: 70px;height: 70px" /></td>
										<td>
											<?php if(is_array($role_list)): $i = 0; $__LIST__ = $role_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($vo["role"] == $vo2["id"] ): echo ($vo2["name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
										</td>
										<td>
											<?php if($vo["status"] == 1 ): ?>正常<?php endif; ?>
											<?php if($vo["status"] == 0 ): ?>停用<?php endif; ?>
										</td>
										<td><?php echo (date('Y-m-d',$vo["add_time"])); ?></td>
										<td><?php echo (date('Y-m-d H:i:s',$vo["last_logintime"])); ?></td>
										<td>
											<a href="<?php echo U('editUser',array('id'=>$vo['id']));?>" class="btn btn-primary btn-mini">
												<i class="fa fa-pencil"></i> 编辑</a>&nbsp;&nbsp;
											<a onClick="return confirm('是否删除此条记录')" href="<?php echo U('Admin/System/delUser',array('id'=>$vo['id']));?>" class="btn btn-danger">
												<i class="fa fa-trash-o"></i> 删除</a>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						<div class="pages" style=" text-align: right;">
							<?php echo ($page); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer" style="position: fixed;z-index: 999;bottom: 0;width: 89%;">
	<div class="pull-right"><?php echo C('address');?></div>
</div>
</div>
</div>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/bootstrap.min.js?v=3.3.5"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/plugins/layer/layer.min.js"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/hplus.min.js?v=4.0.0"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/contabs.min.js"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/plugins/pace/pace.min.js"></script>    
<script type="text/javascript" src="/MyBlog/Public/Admin/js/plugins/chosen/chosen.jquery.js"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="/MyBlog/Public/Admin/js/jquery.form.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
	</body>

</html>