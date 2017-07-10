<?php 
namespace Admin\Controller;
use Think\Controller;
/**
 * 链接管理
 */
class LinksController extends CommonController {
	/*
	链接首页
	 */
	public function index() {
		$Links = D('links');
		$count = $Links->count();
		$p = getpage($count, C('PAGE_SIZE'));
		$show = $p->show();
		$list = $Links->page(I('get.p'))->limit(C('PAGE_SIZE'))->order('id desc')->select();
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
	}
	/*
	添加链接
	 */
	public function add() {
		if(IS_POST) {
			$data = array(
				'name' => trim(I('post.name')),
				'remark' => trim(I('post.remark')),
				'url' => trim(I('post.url')),
				'status' => trim(I('post.status')),
				'add_time' => time(),
				'update_time' => time(),
				);
			if(empty($data['name'])) {
				$this->error('名字不能为空！');
				return ;
			}
			if(empty($data['url'])) {
				$this->error('域名不能为空！');
				return ;
			}
			if(M('links')->add($data)) {
				$this->success('链接保存成功！', U('Links/index'));
			}else{
				$this->error('保存失败！');
			}
		}else {
			//$this->error('提交方式错误~~~');
			$this->display();
		}
	}
	/*
	编辑链接
	 */
	public function edit() {
		$id = I('id');
		$Links = D('links');
		$list = $Links->where(array('id' => $id))->find();
		if(IS_POST) {
			$idd = I('post.id');
			$data = array(
				'name' => trim(I('post.name')),
				'remark' => trim(I('post.remark')),
				'url' => trim(I('post.url')),
				'status' => trim(I('post.status')),
				'update_time' => time(),
				);
			if(empty($data['name'])) {
				$this->error('名字不能为空！');
				return ;
			}
			if(empty($data['url'])) {
				$this->error('域名不能为空！');
				return ;
			}
			if(M('links')->where(array('id' => $idd))->save($data)) {
				$this->success('链接保存成功！', U('Links/index'));
			}
		}else {
			$this->assign('detail', $list);
			$this->display();
		}
	}
	/*
	删除链接
	 */
	public function del() {
		$id = I('id');
		if(M('links')->where(array('id' => I('id')))->delete()) {
			$this->success('删除成功！');
		}else{
			$this->error('出错啦~~~');
		}
		//p的作用：页码,删除之后恢复当前页码为1
		$this->redirect('Links/index',array('p' => $p));
	}
}
?>