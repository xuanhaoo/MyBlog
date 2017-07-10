<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0024)http://www.wpke.net/note -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>list-article</title>
<link rel="stylesheet" href="/MyBlog/Public/Home/css/style.css" media="screen" type="text/css">
<link href="http://www.wpke.net/wp-content/themes/cu/images/favicon.ico" rel="icon">
<link rel="dns-prefetch" href="http://s.w.org/">
<script type="text/javascript" src="/MyBlog/Public/Home/js/jquery.js"></script>
</head>
<body>
<header class="mod-head">
	<h1 class="mod-head__title"><a href="http://www.wpke.net/">Crazy uncle</a></h1>
	<div class="mod-head__logo">
		<a href="<?php echo U('Home/Index/index');?>">
			<img class="avatar" src="/MyBlog/Public/Home/image/head.jpg" alt="" width="26" height="26">
		</a>
			</div>
	<nav class="mod-head__nav">
	<ul id="menu-%e8%8f%9c%e5%8d%951" class="mod-head__ul"><li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14"><a href="<?php echo U('Article/suibi');?>">随笔文</a><span>·</span></li>
	<li id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15"><a href="<?php echo U('Article/mood');?>">心情</a><span>·</span></li>
	<li id="menu-item-19" class="menu-item menu-item-type-taxonomy menu-item-object-category current-post-ancestor current-menu-parent current-post-parent menu-item-19"><a href="<?php echo U('Article/ja_ph');?>">JAVA / PHP</a><span>·</span></li>
	<li id="menu-item-32" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-32"><a href="<?php echo U('Article/sql_');?>">MYSQL/SQL</a><span>·</span></li>
	<li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a href="<?php echo U('Article/qian_duan');?>">HTML/CSS/JS</a><span>·</span></li>
	<li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18"><a href="<?php echo U('Links/index');?>">链接</a><span>·</span></li>
	<li id="menu-item-104" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-104"><a href="<?php echo U('Liuyan/index');?>">留言</a><span>·</span></li>
	<li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23"><a href="<?php echo U('About/index');?>">关于我</a></li>
	</ul>	</nav>
	</div>
	<script src="/MyBlog/Public/Home/js/slider.js"></script>
	<script>$('#right-panel-link').panelslider({side: 'right', duration: 200 });$('#close-panel-bt').click(function() {$.panelslider.close();});</script>
</header><article class="mod-archive">
	<div class="mod-archive__item"><div class="mod-archive__year"><?php echo ($type); ?></div>
		<ul class="mod-archive__list">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li ><time class="mod-archive__time" datetime=""><?php echo (date("Y-m-d",$vo["create_time"])); ?></time> <span>—</span> <a href="<?php echo U('Article/show_content',array('id' => $vo['id'],'cate_id' => $vo['cate_id']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<div class="posts-nav">
		<?php echo ($page); ?>
		<!--<span class="page-numbers current">1</span>
		<a class="page-numbers" href="http://www.wpke.net/note/page/2">2</a>-->	
		</div>
	</div>
</article>
<footer class="mod-footer" role="contentinfo" id="footer_in">
    <p class="f_bq">Copyright ©2017 lxh Powered by <a class="banquan" target="_blank" href="http://www.2zzt.com/">WordPress</a></p>
</footer>
<div id="topcontrol" title="返回顶部" style="position: fixed; bottom: 80px; right: 30px; opacity: 0; cursor: pointer;"><div class="up"></div></div></body></html>