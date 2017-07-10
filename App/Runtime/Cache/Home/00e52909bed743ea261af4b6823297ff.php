<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>hao o6个人博客首页</title>
	<link rel="stylesheet" type="text/css" href="/MyBlog/Public/Home/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/MyBlog/Public/Home/css/index.css">
	<link rel="stylesheet" href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://cdn.bootcss.com/highlight.js/9.0.0/styles/vs.min.css">
	<style type="text/css">
		body {
			background-image: url("/MyBlog/Public/Home/images/iindex.jpg");
		}
	</style>
</head>
<body>
	<div class="mid-content">
		<div class="head-img">
			<img src="/MyBlog/Public/Home/images/head.jpg" class="avatar" width="128" height="128">
		</div>
		<h1>hao o6</h1>
		<p>立足于一个互联网工作者，总想靠着自己的努力搞一些事情，毕竟，未来还在手中。目前就读于CUIT。MORE...</p>
		<p style="height: 24px; line-height: 24px; margin: 20px 0;">
		<img style="vertical-align: bottom; margin-right: 10px;" src="/MyBlog/Public/Home/images/address.png">Chengdu · China
		</p>
		<nav class="navbar navbar-default">
		<div class="container">
   			 <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		     <ul class="nav nav-pills">
			  	<li class=""><a href="<?php echo U('Article/suibi');?>">随笔文</a></li>
			  	<li><a href="<?php echo U('Article/mood');?>">心情</a></li>	
			  	<li role="presentation" class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			      撸码<span class="caret"></span>
			    </a>
			    <ul class="dropdown-menu">
			      <li><a href="<?php echo U('Article/qian_duan');?>">HTML</a></li>
			      <li><a href="<?php echo U('Article/phpa');?>">PHP</a></li>
			      <li class=""><a href="<?php echo U('Article/mysql');?>">MYSQL</a></li>
			    </ul>
			  	</li>
			  	<li><a href="<?php echo U('Article/game');?>">电子竞技</a></li>
			  	<li><a href="<?php echo U('Liuyan/index');?>">留言</a></li>	
			  	<li><a href="<?php echo U('About/index');?>">关于我</a></li> 	
			</ul>
		    </div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
  		</nav>
	</div>
	<script type="text/javascript" src="/MyBlog/Public/Home/bootstrap/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="/MyBlog/Public/Home/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>