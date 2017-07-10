<?php 
namespace Home\Controller;
use Think\Controller;
/*
留言内容
 */
class LiuyanController extends CommonController {
	/*
	留言页面显示
	 */
	public function index() {
		$Ly = M('liuyan');
		$count = $Ly->count();
		$p = getpage($count, 8);
		$show = $p->show();
		$list = $Ly->page(I('get.p'))->limit(8)->order('id desc')->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('count', $count);	
		$this->display();
	}
	/*
	发表新的留言
	 */
	public function new_liuyan() {
		if(IS_POST) {
			$data = array(
				'ly_name' => trim(I('post.ly_name')),
				'ly_content' => trim(I('post.content')),
				'web_site' => trim(I('post.web_site')),
				'ly_time' => time(),
				'ly_ip' => get_client_ip(),
				);
			if(empty($data['ly_name']||$data['ly_content'])) {
				$this->error('名字或内容不能为空！！！');
				return ;
			}
			if(M('liuyan')->add($data)) {
				$data = array(
					'success' => true,
					'msg' => '留言成功！'
					);
			}else {
				$data = array(
					'success' => false,
					'msg' => '留言失败！'
					);
			}
			$this->ajaxReturn($data,'json');

		}
	}
}
?>