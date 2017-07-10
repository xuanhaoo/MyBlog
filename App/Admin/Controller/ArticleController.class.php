<?php 
namespace Admin\Controller;
use Think\Controller;
/**
 * 文章管理控制器
 */

class ArticleController extends CommonController {
	/*
	文章列表
	 */
	public function index() {
		$Article = M('article');
		$Article_cate = M('article_cate');
		//计算总个数
		$count = $Article->count();
		$p = getpage($count, C('PAGE_SIZE'));
		$show = $p->show();
		//查找文章
		$art_list = $Article->order('create_time desc')->page(I('get.p'))->limit(C('PAGE_SIZE'))->select();
		//查找文章类别  对文章内别进行匹配
		$cate_list = $Article_cate->select();
		$this->assign('page', $show);
		$this->assign('art_list', $art_list);
		$this->assign('cate_list', $cate_list);
		$this->display();
	}
	/*
	添加文章
	 */
	public function add() {
		$Article_cate = M('article_cate');
		$cate_list = $Article_cate->select();
		$this->assign('cate_list', $cate_list);
		$this->display();
	}
	/*
	心情列表
	 */
	public function mood() {
		//获得请求的页码
		// $requestPage = I('requestPage', '1');
		// $rows = 5;//一页显示的条数
		// $limit = ($requestPage-1)*$rows.','.$rows;
		//查询符合条件的条数
		$count = M('mood')->count();
		$p = getpage($count, C('PAGE_SIZE'));
		$show = $p->show();
		//获取信息
		$list = M('mood')->order('create_time desc')->page(I('get.p'))->limit(C('PAGE_SIZE'))->select();
		$data = array(
			'pages' => $total/$rows+1,
			'list' => $list,
			);
		$this->assign('page',$show);
		$this->assign('list',$data['list']);
		$this->display();
	}
	/*
	添加心情
	 */
	public function addMood() {
		if(!IS_AJAX) {
			$this->display();
		}else{
			$data = array(
				'image' => $_POST['photo'],
				'content' => $_POST['a_content'],
				'create_time' => time(),
				'click' => trim(I('post.a_views', '', 'htmlspecialchars')),
				'author' => I('post.a_writer', '', 'htmlspecialchars'), 
				);
			if(M('mood')->add($data)) {
				$this->success('发布成功！', U('Article/mood'), 1);
			}else {
				$this->error('发布失败！', U('Article/mood'));
			}
		}
	}
	/*
	编辑心情
	 */
	public function editMood() {
		$theArt = M('mood')->where(array('id' => I('id')))->find();
		$this->assign('detail',$theArt);
		$this->display();
	}
	public function editMoodHandle() {
		$id = I('id');
		$data = array(
				'image' => $_POST['photo'],
				'content' => $_POST['a_content'],
				'create_time' => time(),
				'click' => trim(I('post.a_views', '', 'htmlspecialchars')),
				'author' => I('post.a_writer', '', 'htmlspecialchars'), 
				);
			if(M('mood')->where(array('id' => $id))->save($data)) {
				$this->success('操作成功！', U('Article/mood'), 1);
			}else {
				$this->error('操作失败！', U('Article/mood'));
			}
	}
	/*
	删除心情
	 */
	public function delMood() {
		$p = I('p');
		if(M('mood')->where(array('id' => I('id')))->delete()) {
			$this->success('删除成功！');
		}else{
			$this->error('出错啦~~~');
		}
		//p的作用：页码,删除之后恢复当前页码为1
		$this->redirect('Article/mood',array('p' => $p));
	}
	/**
	 * 添加文章后的提交处理
	 */
	public function addHandle() {
		if(IS_AJAX) {
			$data = array(
				'title' => trim(I('post.a_title', '', 'htmlspecialchars')),
				'cate_id' => trim(I('post.cate_id', '', 'htmlspecialchars')),
				'remark' => trim(I('post.a_remark', '', 'htmlspecialchars')),
				'content' => $_POST['a_content'],
				'or_top' => I('post.a_top', '', 'htmlspecialchars'),
				'author' => I('post.a_writer', '', 'htmlspecialchars'), 
				'create_time' => time(),
				'modify_time' => time(),
				'click' => trim(I('post.a_views', '', 'htmlspecialchars')),
				'from' => I('post.a_from', '', 'htmlspecialchars'),
				'author_ip' => get_client_ip(),
				);
			if(empty($data['title'])) {
				$this->error('文章标题不能为空!');
			}
			if(empty($data['remark'])) {
				$this->error('文章描述不能为空!');
			}
			if(empty($data['content'])) {
				$this->error('文章内容不能为空!');
			}
			if(M('article')->add($data)) {
				$this->success('发布成功！', U('Article/index'), 1);
			}else {
				$this->error('文章发布失败！', U('Article/index'));
			}
		}else {
			$this->error('您的提交方式不对~~~',U('Article/add'));
		}
	}
	/*
	编辑文章
	 */
	public function edit() {
		$Article = M('article');
		$cate_list = M('article_cate')->select();
		//查找当前文章的消息
		$theArt = $Article->where(array('id' => I('id')))->find();
		$this->assign('detail',$theArt);
		$this->assign('cate_list',$cate_list);
		$this->display();
	}
	/*
	编辑文章后的更新提交
	 */
	public function editHandle() {
		//获取文章的逻辑id
		$art_id = I('id','','htmlspecialchars');
		if(!IS_AJAX) {
			$this->error('提交方式错误！',U('Article/edit'));
		}else{
			$data = array(
				'title' => trim(I('post.a_title', '', 'htmlspecialchars')),
				'cate_id' => trim(I('post.cate_id', '', 'htmlspecialchars')),
				'remark' => trim(I('post.a_remark', '', 'htmlspecialchars')),
				'content' => stripcslashes($_POST['a_content']),
				'or_top' => I('post.a_top', '', 'htmlspecialchars'),
				'author' => I('post.a_writer', '', 'htmlspecialchars'), 
				'modify_time' => time(),
				'click' => trim(I('post.a_views', '', 'htmlspecialchars')),
				'from' => I('post.a_from', '', 'htmlspecialchars'),
				'author_ip' => get_client_ip(),
				);
			//根据文章的id进行修改
			if(M('article')->where(array('id' => $art_id))->save($data)) {
				$this->success('保存成功！',U('Article/index'));
			}else {
				$this->error('出错啦~~~',U('Article/edit'));
			}
		}

	}
	/*
	文章删除
	 */
	public function del() {
		$p = I('p');
		if(M('article')->where(array('id' => I('id')))->delete()) {
			$this->success('删除成功！');
		}else{
			$this->error('出错啦~~~');
		}
		//p的作用：页码,删除之后恢复当前页码为1
		$this->redirect('Article/index',array('p' => $p));
	}

	/*******************************/
	/**
	 * 文章类别
	 */
	public function indextype() {
		$Article_cate = M('article_cate');
		$count = $Article_cate->count();
		$p = getpage($count,C('PAGE_SIZE'));
		$show = $p->show();
		//读取栏目
		//page自动获取当前页码数
		$cate = $Article_cate->page(I('get.p'))->limit(C('PAGE_SIZE'))->select();
		$this->assign('cate_list',$cate);
		$this->assign('page',$show);
		$this->display();
	}
	/**
	 * 添加文章分类
	 */
	public function addtype() {
		$this->display();
	}
	/*
	添加分类的提交
	 */
	public function addtypeHandle() {
		if(!IS_AJAX) {
			$this->error('提交方式错误！', U('Article/addtype'), 0);
		}else {
			$data = array(
				'cate_name' => trim(I('post.cate_name', '', 'htmlspecialchars')),
				'order' => trim(I('post.order','','htmlspecialchars')),
				);
			if(empty($data['cate_name'])) {
				$this->error('文章类名不能为空！',U('Article/addtype'));
			}
			if(empty($data['order'])) {
				$this->error('排序不能为空！',U('Article/addtype'));
			}
			if(M('article_cate')->add($data)) {
				$this->success('添加成功',U('Article/indextype'),1);
			}else {
				$this->error('添加出错啦~~~',U('Article/indextype'));
			}
		}
	}
	/*
	编辑分类
	 */
	public function edittype() {
		$cate_id = I('cate_id');
		$Article_cate = M('article_cate');
		$cate = $Article_cate->where(array('cate_id' => $cate_id))->find();
		$this->assign('detail',$cate);
		$this->display();
	}
	/*
	编辑分类的提交
	 */
	public function edittypeHandle() {
		$cate_id = I('cate_id');
		if(!IS_AJAX) {
			$this->error('提交方式错误！', U('Article/addtype'), 0);
		}else {
			$data = array(
				'cate_name' => trim(I('post.cate_name', '', 'htmlspecialchars')),
				'order' => trim(I('post.order','','htmlspecialchars')),
				);
			if(empty($data['cate_name'])) {
				$this->error('文章类名不能为空！',U('Article/addtype'));
			}
			if(empty($data['order'])) {
				$this->error('排序不能为空！',U('Article/addtype'));
			}
			if(M('article_cate')->where(array('cate_id' => $cate_id))->save($data)) {
				$this->success('添加成功',U('Article/indextype'),1);
			}else {
				$this->error('添加出错啦~~~',U('Article/indextype'));
			}
		}

	}
	/*
	删除类别
	 */
	public function deltype() {
		$p = I('p');
		if(M('article_cate')->where(array('cate_id' => I('cate_id')))->delete()) {
			$this->success('删除成功！');
		}else{
			$this->error('出错啦~~~');
		}
		//p的作用：页码,删除之后恢复当前页码为1
		$this->redirect('Article/indextype',array('p' => $p));
	}
	
}
?>