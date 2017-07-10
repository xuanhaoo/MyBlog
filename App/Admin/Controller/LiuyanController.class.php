<?php 
namespace Admin\Controller;
use Think\Controller;
/**
 * 留言管理
 */
class LiuyanController extends CommonController {

	public function index() {
		$Liuyan = M('liuyan');
		$count = $Liuyan->count();
		$p = getpage($count, C('PAGE_SIZE'));
		$show = $p->show();
		$list = $Liuyan->page(I('get.p'))->order('ly_time desc')->limit(C('PAGE_SIZE'))->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
		$this->display();
	}
	/*
	回复留言
	 */
	public function edit() {
		$id = I('id');
		$Liuyan = M('liuyan');
		$list = $Liuyan->where(array('id' => $id))->find();
		$this->assign('detail', $list);
		$this->display();
	}
	/*
	回复留言的提交
	 */
	public function editHandle() {
		$id = I('id');
		if(!IS_AJAX) {
			$this->error('提交方式不正确',U('Liuyan/edit'));
		}else{
			$data['reply'] = $_POST['c_content'];
			if(empty($data['reply'])) {
				$this->error('回复内容不能为空！');
				return ;
			}
			$data['re_time'] = time();
			$data['re_name'] = $_POST['c_name'];
			$data['status'] = 1;
			if(M('liuyan')->where('id = ' . $id)->save($data)) {
				$this->success('回复成功！',U('Liuyan/index'));
			}

		}
	}
	public function del() {
		$p = I('p');
		if(M('liuyan')->where(array('id' => I('id')))->delete()) {
			$this->success('删除成功！');
		}else{
			$this->error('出错啦~~~');
		}
		//p的作用：页码,删除之后恢复当前页码为1
		$this->redirect('Liuyan/index',array('p' => $p));
	}
} 
?>