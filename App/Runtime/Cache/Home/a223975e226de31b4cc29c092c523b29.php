<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>hao o6博客</title>
		<link rel="stylesheet" type="text/css" href="/MyBlog/Public/Home/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="http://cdn.bootcss.com/highlight.js/9.0.0/styles/vs.min.css">
	    <link rel="stylesheet" type="text/css" href="/MyBlog/Public/Home/css/public.css">
	    <link rel="stylesheet" type="text/css" href="/MyBlog/Public/Home/css/style.css">
	</head>
	<body>
	<!--header-->
		<header class="main-header">
			<div class="container-fluid">
			<div class="row" style="margin-top: 39px;margin-bottom: 15px;">
				<div class="col-sm-12">
				<img src="/MyBlog/Public/Home/images/head.jpg" class="avatar" width="128" height="128">
				<h1 style="color:#ffffff;">hao o6</h1>
				<span class="sign-title">年华美丽，盛开如诗</span>
				</div>
			</div>			
			</div>
		</header>
<!--header-end-->	
		<!--nav-->
		  <nav class="main-navigation">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12">
	                    <div class="navbar-header">
	                        <span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu">
	                        <span class="sr-only">Toggle navigation</span>
	                        <i class="fa fa-bars"></i>
	                        </span>
	                    </div>
	                    <div class="collapse navbar-collapse" id="main-menu">
	                         <ul class="menu">
						    	<li><a href="<?php echo U('Index/index');?>">首页</a></li>
						    	<li class=""><a href="<?php echo U('Article/suibi');?>">随笔文</a></li>
								<li><a href="<?php echo U('Article/mood');?>">心情</a></li>	
								<li role="presentation" class="dropdown nav-current">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">撸码<span class="caret"></span></a>
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
	                    </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </nav>
	    <!--nav-end-->
		<!--文章详细内容-->
	   	<div class="articleDetail container">
      		<div class="row">
			<div class="col-md-12">
				<div class="articleContent">
					<!-- 标题 -->
					<div class="title"><?php echo ($article["title"]); ?></div>
					<!-- 访问量 ...-->
					<div class="secTitleBar">
						<ul>
							<li>分类：<a href="http://vinceok.com/category/javascript" rel="category tag"><?php echo ($article["cate_name"]); ?></a></li>
							<li>发表：<?php echo (date("Y-m-d", $article["create_time"])); ?></li>
							<li>围观(<?php echo ($article["click"]); ?>)</li>
							<!-- 获得评论数函数默认是wordpress自带的 -->
							<li><a href="#comments">评论(10)(暂时功能还未开放)</a></li>
						</ul>
					</div>
					<!-- 内容 -->
					<div class="articleCon post_content">
						<?php echo ($article["content"]); ?>
					</div>
						<!-- 标签 -->
					<div class="articleTagsBox">
						<ul><span>标签：</span> 
						<?php if(is_array($article['remark'])): foreach($article['remark'] as $key=>$re): ?><a href="" rel="tag" style="margin-left: 9px;"><?php echo ($re); ?></a><?php endforeach; endif; ?>
						</ul>
					</div>
				</div>
				</div>
			</div>
		</div>
		<!--footer-->
	    <footer>
	    	<div class="main-footer">
	    		<div class="container">
	    			<div class="row">
	    				<div class="col-md-4">
	    					<div class="widget tagbox">
	    						<div class="widget linkbox">
                				<h4 class="title">友情链接</h4>
	                				<div class="box friend-links clearfix">
					  					<li><a href="http://www.imooc.com" target="_blank">慕课网</a></li>
					  					<li><a href="http://www.bootcss.com/" target="_blank">bootstrap中文网</a></li>
					  					<li><a href="http://fontawesome.io" target="_blank">font-awesome</a></li>
					  					<li><a href="http://loobo.me" target="_blank">主题笔记</a></li>
					  				 </div>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-md-4">
	    					<div class="widget contactbox">
	    						<h4 class="title">联系我们</h4>
	    						<div class="contact-us clearfix">
									<li><a href="">
									<i class="fa fa-qq"></i>1335637386</a></li>
									<li><a href=""><i class="fa fa-weibo"></i>West_meath</a></li>
									<li>
								    <a href="" title=""><i class="fa fa-weixin"></i>West_meath</a>
									</li>
								</div>
	    					</div>
	    				</div>
	    				<div class="col-md-4">
	    					<div class="widget contactbox">
	    						<h4 class="title">地址</h4>
	    						<div class="contact-us clearfix">
	    							<li><a href=""><i class="fa fa-bank"></i>四川省成都市双流县成都信息工程大学</a></li>
	    							<li><a href=""><i class="fa fa-bank"></i>四川省南充市南部县双佛镇</a></li>
	    						</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="copyright">
	    			<div class="container">
	    				<div class="row">
				    		<div class="col-md-12">				    			
			    				<span>Copyright &copy;<a href="#">Mr.L博客</a></span> | 
			    				<span>蜀ICP备000000号</span> | 
			    				<span>000</span>
				    		</div>
				    			
				    		</div>
	    			</div>
	    		</div>
	    		
	    	</div>

	    </footer>	
		<a href="#0" class="cd-top">Top</a>
		<script type="text/javascript" src="/MyBlog/Public/Home/bootstrap/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="/MyBlog/Public/Home/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/MyBlog/Public/Home/js/top/js"></script>
	</body>
</html>