<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>hao o6博客</title>
		<link rel="stylesheet" type="text/css" href="/MyBlog/Public/Home/layui/css/layui.css">
		<link rel="stylesheet" type="text/css" href="/MyBlog/Public/Home/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="http://cdn.bootcss.com/highlight.js/9.0.0/styles/vs.min.css">
	    <link rel="stylesheet" type="text/css" href="/MyBlog/Public/Home/css/public.css">
	    <link rel="stylesheet" type="text/css" href="/MyBlog/Public/Home/css/style.css">
	    <style type="text/css">
	    	.btn-add{
				float:right;
				padding:8px 20px;
				border:0;
				border-radius:5px;
				background:#34495e;/*main-color*/
				box-shadow: 0 3px 10px rgba(0,0,0,0.06), 0 3px 10px rgba(0,0,0,0.13);
				transition:all .1s;
			}
			.btn-add:hover{
				background:#34495e;/*main-color*/
				opacity:.8;
				box-shadow: 0 4px 10px rgba(0,0,0,0.09), 0 4px 10px rgba(0,0,0,0.17);
			}
			.youke-img {
				left:1px;
				margin-top: 8px;
				border-radius: 50%;
				float: left;
			}
			.liuyan_name {
				width: 60px;
			}
			.my-img {
				margin-right:3px;
				margin-top: 8px;
				border-radius: 50%;
				float: right;
			}
			.liuyan {
				margin-top: 6px;
				border: 1px solid;
				border-color: #E0E0E0;
				border-radius: 3px;
				min-height: 200px;
			}
			.content{
			    width: 50%;
			    min-height: 50px;
			    position: relative;
			    left: 80px;
			    background-color: #e2eff9;
			    border-radius: 20px;
			    padding: 10px;
			    margin-top: 10px;
			    word-wrap: break-word;
			}
			 .content1 {
			    width: 50%;
			    min-height: 50px;
			    position: relative;
			    left: 40%;
			    background-color: #CCCCFF;
			    border-radius: 20px;
			    padding: 10px;
			    margin-top: 10px;
			    word-wrap: break-word;
			}
			.content:hover{
			    text-shadow: 0.1px 0.1px 0.1px;
			    /*background-color: #00CCCC;*/
			}
			 
			.content:after{
			    content: "\00a0";
			    display: block;
			    position:absolute;
			    top:15px;
			    left: -20px;
			    width: 0;
			    height: 0;
			    border-style: solid;
			    border-width: 10px 20px 10px 0px;
			    border-color: transparent #e2eff9 transparent transparent;
			}
			.content1:after{
			    content: "\00a0";
			    display: block;
			    position:absolute;
			    top:15px;
			    right: -20px;
			    width: 0;
			    height: 0;
			    border-style: solid;
			    border-width: 10px 20px 10px 0px;
			    border-color:   transparent transparent #CCCCFF transparent ;
			}
			.liuyan_time {
				margin-top: 20px;
				text-align: center;
			}
			.time_style {
				background: #E8E8E8;
				border-radius: 5px;
			}
			@media only screen and (max-width: 481px) {
				/*.content {
					width:;
				}*/
			}
	    </style>
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
								<li class=""><a href="<?php echo U('Article/mood');?>">心情</a></li>	
								<li role="presentation" class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">撸码<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo U('Article/qian_duan');?>">HTML</a></li>
									<li><a href="<?php echo U('Article/phpa');?>">PHP</a></li>
									<li class=""><a href="<?php echo U('Article/mysql');?>">MYSQL</a></li>
								</ul>
								</li>
								<li><a href="<?php echo U('Article/game');?>">电子竞技</a></li>
								<li class="nav-current"><a href="<?php echo U('Liuyan/index');?>">留言</a></li>
								<li><a href="<?php echo U('About/index');?>">关于我</a></li> 	
							</ul>   
	                    </div>
	                </div>
	            </div>
	        </div>
	    </nav>
	    <!--nav-end-->
		<!--留言-->
		<div class="container liuyanList">
			<div class="row">
				<div class="col-md-12">
					<div class="liuyan-title">
						<p>说些什么呢？</p>
						<p>What do you want to say?</p>
					</div>
					<div class="liuyan-count">
						<h4>共有<?php echo ($count); ?>条: “留言”</h4>
						<div class="" style="float: right;margin-right: 20px;margin-top: -35px;"><a class="btn btn-add btn-info btn-md">留言</a></div>
					</div>
					<div class="lists">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="liuyan"> 
							<div class="liuyanFeed">
							<div class="youke-img">
								<img src="/MyBlog/Public/Home/images/liuyan.jpg" style="height: 50px;width: 50px;border-radius: 50%;">
								<div class="liuyan_name">
									<span><?php echo ($vo["ly_name"]); ?></span>
								</div>
							</div>
							<div class="float">
					            <div class="content">
		           					<?php echo ($vo["ly_content"]); ?>
					            </div>
					        </div>
					        <?php if($vo["status"] == 1): ?><div class="" style="margin-bottom: 13px;">
									<div class="my-img">
										<img src="/MyBlog/Public/Home/images/head.jpg" style="height: 50px;width: 50px;border-radius: 50%">
										<div class="liuyan_name">博主xh</div>
									</div>
									<div class="float">
							            <div class="content1">
							                <?php echo (htmlspecialchars_decode($vo["reply"])); ?>
							            </div>
							        </div>
								</div><?php endif; ?>
					       <div class="liuyan_time">
					       	<span class="time_style">
					       		<?php echo (date("Y-m-d h:i:s", $vo["ly_time"])); ?>
					       	</span>
					       </div>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="pages" style=" text-align: center;">
					<?php echo ($page); ?>
				</div>
					</div>					
				</div>
			</div>
		</div>
		<!--发表新的留言-->
		<div class="liuyan-layer" style="display: none;">
			<div class="container liuyan-form" style="width: 550px;margin-left: 10px;">
			<div class="row">
				<div class="col-md-12">
					<form role="form" class="layui-form">
						<div class="layui-form-item layui-form-text">
						    <label class="layui-form-label">留言内容</label>
						    <div class="layui-input-block">
						      <textarea name="content" placeholder="请输入内容" class="layui-textarea"></textarea>
						    </div>
						 </div>
						 <div class="layui-form-item">
						    <label class="layui-form-label">昵称</label>
						    <div class="layui-input-block">
						      <input type="text" name="ly_name" required  lay-verify="required" placeholder="请输入昵称" autocomplete="off" class="layui-input">
						    </div>
						 </div>
						 <div class="layui-form-item">
						    <label class="layui-form-label">站点名</label>
						    <div class="layui-input-block">
						      <input type="text" name="web_site"  placeholder="请输入站点名（可不填）" autocomplete="off" class="layui-input">
						    </div>
						 </div>
						  <div class="layui-form-item">
						    <div class="layui-input-block">
						      <button class="layui-btn" lay-submit lay-filter="addliuyan">立即提交</button>
						      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
						    </div>
						 </div>
					</form>
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
		<script type="text/javascript" src="/MyBlog/Public/Home/js/top.js"></script>
		<script type="text/javascript" src="/MyBlog/Public/Home/layui/layui.js"></script>
		<script type="text/javascript">
			var addhandleurl = "<?php echo U('Home/Liuyan/new_liuyan');?>";
		</script>
		<script type="text/javascript">
			layui.use(['layer','form'], function() {
				var $ = layui.jquery,
				form = layui.form(),
				layer = layui.layer;

				$('.btn-add').click(function() {
					layer.open({
						title: '留言',
						type: 1,
						area: ['580px', '450px'],
						content: $('.liuyan-layer'),
					});
					
				});
				form.on('submit(addliuyan)', function(rec) {
					$.ajax({
					url: addhandleurl,
					type: 'POST',
					data: rec.field,
					error: function(request){
						layer.msg("请求服务器超时", {time: 1000, icon: 5});
					},
					success: function(data){
						if (data.success){
							layer.msg('提交成功', {
								time: 1000
							}, function(){
								layer.close();
								location.reload();
							});
						}else{
							layer.msg(data.msg, {
								time: 1000
							});
						}
					}
				});
					return false;
				});

			});
		</script>
	</body>
</html>