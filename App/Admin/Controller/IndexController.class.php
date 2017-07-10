<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台首页控制器
 */
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }
    /*
    修改密码
     */
    public function cpwd() {
    	$User = M('user');			//原数据实例
    	$User_now = session('userInfo');
    	$this->assign('user_now',$User_now);
    	$this->display();
    	if($_POST) {
    		$data['username'] = I('post.username');
    		$data['password'] = md5(I('post.oldpassword'));
    		$newpassword = md5(I('post.newpassword'));
    		$repassword = md5(I('post.repassword'));
    		//查找原本的数据是否正确
    		$result = $User->where($data)->find();
    		if($result) {
    			if($newpassword == $repassword) {
    				$result2 = $User->where($data)->setField('password',$newpassword);
    				if($result2) {
    					//修改成功后进行重新登录
    					$this->success('修改成功',U('Admin/Login/index'));
    				}else {
    					$this->error('修改失败');
    				}
    			}else {
    				$this->error('两次输入的密码不一致');
    			}

    		}else {
    			$this->error('原密码错误！');
    		}

    	}
    }

    /*
    清除缓存
     */
    public function delCache() {
    	//删除缓存文件夹的所有文件

    	delFileByDir(APP_PATH.'Runtime/');
    	$this->success('删除缓存成功！',U('Admin/Index/index'));
    }
    // public function home() {
    //     header('Location: http://www.example.com/');
    // } 
}