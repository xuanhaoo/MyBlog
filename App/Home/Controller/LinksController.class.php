<?php 
namespace Home\Controller;
use Think\Controller;
/*
链接
 */
class LinksController extends Controller {
	public function index() {
		$Links = M('links');
		$list = $Links->order('id desc')->select();
		$this->assign('list', $list);
		$this->display();
	}
}

?>