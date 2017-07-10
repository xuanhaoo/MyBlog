<?php 
namespace Admin\Controller;
use Think\Controller;
/**
 * 登录控制器
 */
class LoginController extends Controller {

	public function index() {
		$this->display();
	}

	/*
	登录的表单处理
	 */
	public function login() {
		if(!IS_POST) {
			$this->error('错误请求!');
		}
		$username = I('post.user');
		$password = md5(I('post.password'));
		//如果账号或密码为空返回data信息
		if(empty($username)||empty($password)) {
			$data['error'] = 1;
			$data['msg'] = "请输入用户名或密码";
			$this->ajaxReturn($data);
		}
		//定义map数组
		$map = array();
		$map['username'] = $username;
		$map['status'] = 1;

		$User = D('user');
		$userInfo = $User->where($map)->find();
		if($userInfo) {
			if($userInfo['password'] != $password) {
				$data['error'] = 1;
				$data['msg'] = "密码错误";
				$this->ajaxReturn($data);
			}
			
			//到这里，表明验证通过
			//将上一次信息写入session
			session('last_logintime',date('Y-m-d H:i:s',$userInfo['last_logintime']));
			session('last_loginip',$userInfo['last_loginip']);
			session('userInfo',$userInfo);
			
			//更新本次数据
			$data = array(
				'id' => $userInfo['id'],
				'last_loginip' => get_client_ip(),
				'last_logintime' => time(),	
				);
			$User->save($data);

			//返回跳转的url路径
			$datas = array(
				'error' => 0,
				'url' => U('Index/index'),
				);
			$this->ajaxReturn($datas);	
		} else {
			$data['error'] = 1;
			$data['msg'] = "账号不存在或已经被禁用";
			$this->ajaxReturn($data);
		}
	}

	/**
	 * 退出登录
	 */
	public function loginOut() {
		
		session_unset();
		session_destroy();
		$this->redirect('Login/index');
		 
	}
}
 ?>
