<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<!--<head>

	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="/MyBlog/Public/Admin/css/add-public.css">
	<title>Document</title>
</head>-->
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

	<form action="<?php echo U('Admin/System/addNodeHandle');?>" method="post">
		<table>
			<tr>
				<td align="right"><?php if($type == 'ct'): ?>应用名：<input type="text" name="tg" value="<?php echo ($gt); ?>"></td><?php endif; ?>
			</tr>
					
					<tr><?php if($type == 'at'): ?><td align="right">应用名：<input type="text" name="gt" value="<?php echo ($gt); ?>"></td><?php endif; ?></tr>	
					<tr><?php if($type == 'at'): ?><td align="right">控制器名：<input type="text" name="ct" value="<?php echo ($ct); ?>"></td><?php endif; ?></tr>
				
			<tr>
				<td align="right"><?php echo ($type); ?>名称：</td>
				<td><input type="text" name="<?php echo ($type); ?>"></td>
			</tr>
			<tr>
				<td align="right"><?php echo ($type); ?>描述：</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td align="right">是否开启？</td>
				<td><input type="radio" name="status" value="1" checked="checked">&nbsp;开启
					<input type="radio" name="status" vaule="0">&nbsp;关闭</td>
			</tr>
			<tr>
				<td align="right">排序</td>
				<td><input type="text" name="sort" value="1"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
				<input type="hidden" name="level" value="<?php echo ($level); ?>">
				<input type="submit" value="确定添加"></td>
			</tr>
		</table>
	</form>
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