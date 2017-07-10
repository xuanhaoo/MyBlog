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
								<li class="nav-current"><a href="<?php echo U('About/index');?>">关于我</a></li> 	
							</ul>   
	                    </div>
	                </div>
	            </div>
	        </div>
	    </nav>
	    <!--nav-end-->
	    <!--about-->
	    <section id="cd-timeline" class="cd-container">
	    	<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<img src="/MyBlog/Public/Home/images/cd-icon-movie.svg" alt="Movie">
				</div>

				<div class="cd-timeline-content">
					<h2>上到云中</h2>
					<p>一直就想学习一下云服务器，刚好腾讯活动，买了个学生价，开始捣鼓，东搞搞，西搞搞。功夫不负有心人，V1.0上线了，哈哈！
					</p>
					<span class="cd-date">2017-07-10</span>
				</div>
			</div>
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="/MyBlog/Public/Home/images/cd-icon-picture.svg" alt="Picture">
				</div>

				<div class="cd-timeline-content">
					<h2>再次点燃</h2>
					<p>终于.....，期末考试考得差不多了，好像也没有太多的事情，重新打开文件夹，发现。。。这里竟然还有这个东西，但打开，感觉以前的代码风格不能容忍，但是，推翻重写，好像有点费时且费事，所以，将就啦</p>
					<span class="cd-date">2017-07-06</span>
				</div>
			</div>
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<img src="/MyBlog/Public/Home/images/cd-icon-movie.svg" alt="Movie">
				</div>

				<div class="cd-timeline-content">
					<h2>中途掉线，等待连接</h2>
					<p>因为新的学期开始了，学校里有许多的事，新的课程又在匆匆进行着，又在实验室写着其他的项目，感觉把博客给抛在一边了，想着等有时间再继续完成，这一拖又是3个月。
					</p>
					<span class="cd-date">2017-04-01</span>
				</div>
			</div>
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="/MyBlog/Public/Home/images/cd-icon-picture.svg" alt="Picture">
				</div>

				<div class="cd-timeline-content">
					<h2>初创完成</h2>
					<p>第一版本的博客基本算是写完啦，虽然很多的问题，但毕竟刚开始学习呢</p>	
					<span class="cd-date">2017-03-20</span>
				</div>
			</div>
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<img src="/MyBlog/Public/Home/images/cd-icon-movie.svg" alt="Movie">
				</div>

				<div class="cd-timeline-content">
					<h2>开始行动</h2>
					<p>先试着着手博客页面的风格，后台规划，前端展示，数据库的设计，功能分析等等</p>
					<span class="cd-date">2017-02-26</span>
				</div>
			</div>
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<img src="/MyBlog/Public/Home/images/cd-icon-location.svg" alt="Location">
				</div>

				<div class="cd-timeline-content">
					<h2>萌生想法</h2>
					<p>过年在家里闲着无聊，想动手写点东西，又不知从何下手，于是乎，思索了一番，那就写个个人博客吧！</p>
					<span class="cd-date">2017-02-21</span>
				</div>
			</div>
		</section>
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
		<script type="text/javascript" src="/MyBlog/Public/Home/layui/layui.js"></script>
		<script type="text/javascript" src="/MyBlog/Public/Home/js/top.js"></script>>
		</script>
	</body>
</html>