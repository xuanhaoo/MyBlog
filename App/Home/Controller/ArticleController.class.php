<?php 
namespace Home\Controller;
use Think\Controller;
/**
 * 文章控制器
 */
class ArticleController extends CommonController {

	/*
	查找随笔文章列表
	 */
	public function suibi() {
		$article = D('article');
		//按栏目id来查找
		$cate_id = 1;
		$rows = 5;//一页显示的条数
		$data = $article->getTheArticle($cate_id, $rows);
		foreach($data['list'] as &$temp) {
			$remarks = explode(',', $temp['remark']);  //当有多个标签时，按逗号分隔成数组
			$temp['remark'] = $remarks;
		}
		$this->assign('list', $data['list']);
		$this->assign('page', $data['show']);
		$this->display('suibi_articleList');

	}
	/*
	心情
	 */
	public function mood() {
	
		$rows = 5;//一页显示的条数
		//查询符合条件的条数
		$count = M('mood')->count();
		$p = getpage($count, $rows);
		$show = $p->show();
		//获取信息
		$list = M('mood')->order('create_time desc')->page(I('get.p'))->limit($rows)->select();
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();

	}
	public function qian_duan() {
		$article = D('article');
		//按栏目id来查找
		$cate_id = 2;
		$rows = 5;//一页显示的条数
		$data = $article->getTheArticle($cate_id, $rows);
		foreach($data['list'] as &$temp) {
			$remarks = explode(',', $temp['remark']);  //当有多个标签时，按逗号分隔成数组
			$temp['remark'] = $remarks;
		}
		$this->assign('page',$data['show']);
		$this->assign('list',$data['list']);
		$this->display('code_articleList');
	}
	/*
	php
	 */
	public function phpa() {
		$article = D('article');
		//按栏目id来查找
		$cate_id = 3;
		$rows = 5;//一页显示的条数
		$data = $article->getTheArticle($cate_id, $rows);
		foreach($data['list'] as &$temp) {
			$remarks = explode(',', $temp['remark']);  //当有多个标签时，按逗号分隔成数组
			$temp['remark'] = $remarks;
		}
		$this->assign('page',$data['show']);
		$this->assign('list',$data['list']);
		$this->display('code_articleList');

	}
	/*
	MYSQL
	 */
	public function mysql() {
		$article = D('article');
		//按栏目id来查找
		$cate_id = 4;
		$rows = 5;//一页显示的条数
		$data = $article->getTheArticle($cate_id, $rows);
		foreach($data['list'] as &$temp) {
			$remarks = explode(',', $temp['remark']);  //当有多个标签时，按逗号分隔成数组
			$temp['remark'] = $remarks;
		}
		$this->assign('page',$data['show']);
		$this->assign('list',$data['list']);
		$this->display('code_articleList');

	}
	/*
	电子竞技
	 */
	public function game() {
		$article = D('article');
		//按栏目id来查找
		$cate_id = 5;
		$rows = 5;//一页显示的条数
		$data = $article->getTheArticle($cate_id, $rows);
		foreach($data['list'] as &$temp) {
			$remarks = explode(',', $temp['remark']);  //当有多个标签时，按逗号分隔成数组
			$temp['remark'] = $remarks;
		}
		$this->assign('page',$data['show']);
		$this->assign('list',$data['list']);
		$this->display('game_articleList');
	}

	/*
	显示文本
	 */
	// public function show_content() {
	// 	$id = I('get.id');
	// 	$cate_id = I('get.cate_id');
	// 	$Article = M('article');
	// 	$this->article = $Article->where(array('id' => $id))->find();
	// 	//文章点击次数加1
	// 	$clicks = $Article->field('click')->find($id);
	// 	$data['click'] = $clicks['click'] + 1;
	// 	$Article->where(array('id' => $id))->save($data);
	// 	//下一篇同类文章
	// 	$this->next_art = $Article->where(array('cate_id' => $cate_id, 'id > ' .$id))->order('id desc')->limit(1)->find();
	// 	//上一篇同类的文章
	// 	$this->pre_art = $Article->where(array('cate_id' => $cate_id))->where('id < '.$id)->order('id desc')->limit(1)->find();
	// 	$this->display('suibi_detail');
	// }
	public function suibi_detail() {
		$id = I('id');
		$data = D('Article')->getDetail($id);
		$remarks = explode(',', $data['remark']);  //当有多个标签时，按逗号分隔成数组
		$data['remark'] = $remarks;
		$this->assign('article', $data);
		$this->display();
	}
	public function code_detail() {
		$id = I('id');
		$data = D('Article')->getDetail($id);
		$remarks = explode(',', $data['remark']);  //当有多个标签时，按逗号分隔成数组
		$data['remark'] = $remarks;
		$this->assign('article', $data);
		$this->display();

	}
	public function game_detail() {
		$id = I('id');
		$data = D('Article')->getDetail($id);
		$remarks = explode(',', $data['remark']);  //当有多个标签时，按逗号分隔成数组
		$data['remark'] = $remarks;
		$this->assign('article', $data);
		$this->display();

	}
}
?>