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
	<style>
.pages a,.pages span {
    display:inline-block;
    padding:6px 9px;
    margin:0 4px;
    border:1px solid #D5D4D4;
    -webkit-border-radius:6px;
    -moz-border-radius:6px;
    border-radius: 2.5px;
}
.pages a,.pages li {
    display:inline-block;
    list-style: none;
    text-decoration:none; 
    color:black;
}

.pages a:hover{
    border-color:#48c9b0;
}
.pages span.current{
    background:#48c9b0;
    color:#FFF;
    font-weight:700;
    border-color:#48c9b0;
}

.long-tr th{
	text-align: center
}
.long-td td{
	text-align: center
}

</style>

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
								<li class="nav-current"><a href="<?php echo U('Article/mood');?>">心情</a></li>	
								<li role="presentation" class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">撸码<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo U('Article/qian_duan');?>">HTML</a></li>
									<li><a href="<?php echo U('Article/phpa');?>">PHP</a></li>
									<li class=""><a href="<?php echo U('Article/mysql');?>">MYSQL</a></li>
								</ul>
								</li>
								<li><a href="<?php echo U('Article/game');?>">电子竞技</a></li>
								<li><a href="<?php echo U('Liuyan/index');?>">留言</a></li>
								<li><a href="<?php echo U('Abouot/index');?>">关于我</a></li> 	
							</ul>   
	                    </div>
	                </div>
	            </div>
	        </div>
	    </nav>
	    <!--nav-end-->
		<!--心情列表-->
	    <div class="container moodList">
	    	<div class="row">
	    		<!-- <div class="col-md-6">
	    		单个心情
	    			<div class="mood">
	    				<div class="moodBody clearfix">
	    					图片
	    					<div class="moodThumb">
	    						<img src="http://vince.qiniudn.com/wp-content/uploads/2016/10/4564.jpg_wh1200.jpg?imageView2/2/w/400/h/200">
	    					</div>
	    					<div class="moodFeed">
	    						这里是心情记录。。。。
	    						这里是心情记录。。。。
	    						
	    					</div>	    					
	    				</div>
	    				<div class="moodFooter clearfix">
	    		    						<ul class="moodStatu">
	    		    							<li><i class="fa fa-calendar"></i>2017 | </li>
	    		    							<li><i class="fa fa-eye"></i>2次浏览 | </li>
	    		    							<li><i class="fa fa-user"></i>评论</li>
	    		    						</ul>
	    		    					</div>
	    			</div>	    			
	    		</div> -->
	    		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-md-6">
	    			<!--单个心情-->
	    			<div class="mood">
	    				<div class="moodBody clearfix">
	    					<!--图片-->
	    					<div class="moodThumb">
	    						<img src="/MyBlog/Uploads/<?php echo ((isset($vo['image']) && ($vo['image'] !== ""))?($vo['image']):'userImg.jpg'); ?>">
	    					</div>
	    					<div class="moodFeed">
	    						<?php echo (htmlspecialchars_decode($vo["content"])); ?>
	    					</div>	    					
	    				</div>
	    				<div class="moodFooter clearfix">
    						<ul class="moodStatu">
    							<li><i class="fa fa-calendar"></i><?php echo (date("Y-m-d",$vo["create_time"])); ?></li>
    							<li><i class="fa fa-eye"></i><?php echo ($vo["click"]); ?>次浏览 | </li>
    							<li><i class="fa fa-user"></i>评论</li>
    						</ul>
    					</div>
	    			</div>	    			
	    		</div><?php endforeach; endif; else: echo "" ;endif; ?>
				
	    	</div>
	    	<div class="pages" style=" text-align: center;">
					<?php echo ($page); ?>
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
		<script type="text/javascript" src="/MyBlog/Public/Home/js/top.js"></script>
	</body>
</html>