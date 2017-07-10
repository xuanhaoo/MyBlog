<?php 
namespace Admin\Controller;
use Think\Controller;
/**
 * @Author: Liang
 * @Date:   2017-01-14 15:57:31
 * @Last Modified by:   Liang
 * @Last Modified time: 2017-03-06 22:30:11
 */

/**
 * 系统管理控制器
 */
class SystemController extends CommonController {
	//创建角色的字段
	//编辑角色的字段
	private $creatRole_field = array('name','pid','status','remark');
	private $editRole_field = array('name','status','remark');
	//创建用户的字段
	//编辑用户的字段
	private $creatUser_field = array('username','nickname','password','head_img','remark','role','add_time','last_logintime','last_loginip','status');
	private $editUser_field = array('username','nickname','head_img','remark','role','status');


	/*******添加节点列表用*******/

	//节点列表
	public function node() {
		$field = array('id','title','gt','ct','at','pid');
		$node = M('node')->field($field)->select();
		$this->node = node_merge($node);
		
		$this->display();
	}
	//添加节点，分配功能
	public function addNode() {
		$this->pid = I('pid',0,'intval');
		$this->level = I('level',1,'intval');
		$this->gt = I('gt');
		$this->ct = I('ct');
		
		switch($this->level) {
			case 1: $this->type = 'gt';
				break;
			case 2: $this->type = 'ct';
				break;
			case 3: $this->type = 'at';
				break;
 		}
		$this->display();
	}
	//添加节点的处理
	public function addNodeHandle() {
		
		if(M('node')->add($_POST)) {
			$this->success('添加成功',U('Admin/System/node'));
		} else {
			$this->error('添加失败');
		}
	}
	/*******----------------角色------------*******/
	/*
	角色处理
	 */
	public function role() {
		$role = D('role');
		$count = $role->count();
		$p = getpage($count, C('PAGE_SIZE'));
		$show = $p->show();
		$list = $role->page(I('get.p'))->order('id desc')->limit(C('PAGE_SIZE'))->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	/*
	添加角色
	 */
	public function addRole() {
		if(IS_POST) {
			//检查字段是否相同，检查名字是否已经存在
			$data = $this->addRoleCheck();
			$role = D('role');
			if($role->add($data)) {
				$this->success('添加成功', U('System/role'));
				return ;
			}else {
				$this->error('添加失败');
				return ;
			}
		}
		$this->display();
	}
	/*
	提交后的处理：检查是否重复
	 */
	public function addRoleCheck() {
		//接受传递过来的$_POST数组
		$prama = I('post.');
		$data = $this->checkFields($prama, $this -> creatRole_field);
		$data['name'] = trim(I('post.name', '', 'htmlspecialchars'));
		if(empty($data['name'])) {
			$this->error('角色名不能为空！');
		}
		if(D('role')->getRoleName($data['name'])) {
			$this-> error('该角色名已经存在！');
			exit;
		}
		$data['status'] = I('post.status');
		$data['remark'] = trim(I('post.remark','','htmlspecialchars'));
		$data['pid'] = 0;
		return $data;
	}
	/*
	编辑角色
	 */
	public function editRole($id = 0) {
		$id = I('id');
		$role = D('role');
		$role_info = $role->where(array('id' => $id))->find();
		if(IS_POST) {
			$data = $this->editRoleCheck();
			//接收editRole中的id
			$data['id'] = I('post.id');
			//p($data);die;
			if($role->save($data)) {
				$this->success('修改成功！',U('System/role'));
			}else {
				$this->error('修改失败！');
			}
		}else{
			$this->assign('detail', $role_info);
			$this->display();
		}
	}
	/*
	编辑角色检查
	*/
	public function editRoleCheck() {
		$prama = I('post.');
		$data = $this->checkFields($prama, $this -> editRole_field);
		$data['name'] = trim(I('post.name', '', 'htmlspecialchars'));
		if(empty($data['name'])) {
			$this->error('角色名不能为空！');
		}
		$data['status'] = I('post.status');
		$data['remark'] = trim(I('post.remark','','htmlspecialchars'));
		return $data;
	}
	/*
	删除角色
	 */
	public function delRole() {
		$role = D('role');
		$id = I('id');
		if($role->where(array('id' => $id))->delete()) {
			$this->success('删除成功！',U('System/role'));
		}else {
			$this->error('删除失败！');
		}
	}
	/*******----------------用户------------*******/
	/*
	用户列表
	 */
	public function user() {
		$user = D('user');
		$role = D('role');
		$count = $user->count();
		$p = getpage($count,C('PAGE_SIZE'));
		$show = $p->show();
		$user_list = $user->page(I('get.p'))->order('id desc')->limit(C('PAGE_SIZE'))->select();
		$role_list = $role->select();
		$this->assign('page',$show);
		//用户表中的角色id与与角色表中的id匹配
		$this->assign('user_list',$user_list);
		$this->assign('role_list',$role_list);
		$this->display();
	}
	/*
	添加用户
	 */
	public function addUser() {
		$role = D('role');
		$role_list = $role->where(array('status' => 1))->select();
		if(IS_POST) {
			$data = $this->addUserCheck();
			//实例化角色-用户表
			$user_role = M('role_user');
			//先将用户数据填入到用户表，返回该自增的id，然后将该用户对应的角色添加到角色用户表
			$result = D('user')->add($data);
			if($result) {
				$data1['role_id'] = $data['role'];
				$data1['user_id'] = $result;
				$user_role->add($data1);
				$this->success('添加成功！',U('System/user'));

			}else {
				$this->error('添加失败！');
			}
		}else {
			$this->assign('role_list', $role_list);
			$this->display();
		}

	}
	/*
	添加用户检查
	*/
	public function addUserCheck() {
		$prama = I('post.');
		$data = $this->checkFields($prama, $this->creatUser_field);
		$data['username'] = trim(I('post.username', '','htmlspecialchars'));
		if(empty($data['username'])) {
			$this->error('用户名不能为空');
		}
		if(D('User')->getUserName($data['username'])) {
			$this->error('用户名已存在！');
			exit ;
		}
		$data['password'] = trim(I('post.password','','htmlspecialchars'));
		if(empty($data['password'])) {
			$this->error('密码不能为空！');
		}
		$data['password'] = md5($data['password']);
		$data['nickname'] = trim(I('post.nickname'));
		$data['head_img'] = trim(I('post.head_img','','htmlspecialchars'));
		$data['role'] = I('post.role');
		$data['remark'] = trim(I('post.remark','','htmlspecialchars'));
		$data['status'] = I('post.status');
		$data['add_time'] = time();
		$data['last_logintime'] = time();
		$data['last_loginip'] = get_client_ip();
		return $data;

	}
	/*
	编辑用户
	 */
	public function editUser() {
		$id = I('id');
		$user = D('user');
		$role = M('role');
		$role_user = M('role_user');
		$role_list = $role->select();
		$user_info = $user->find($id);
		if(IS_POST) {
			$data = $this->editUserCheck();
			$idd = I('post.id');
			$result = $user->where(array('id' => $idd))->save($data);
			if($result) {
				$data1['role_id'] = $data['role'];
				$role_user->where(array('user_id' => $idd))->save($data1);
				$this->success('修改成功！',U('System/user'));
			}else {
				$this->error('修改失败！');
			}
		}else {
			$this->assign('role_list',$role_list);
			$this->assign('detail',$user_info);
			$this->display(); 
		}
		
	}
	/*
	检查编辑用户后的提交
	 */
	public function editUserCheck() {
		$prama = I('post.');
		$data = $this->checkFields($parma, $editUser_field);
		$data['username'] = trim(I('post.username','','htmlspecialchars'));
		if(empty($data['username'])) {
			$this->error('用户名不能为空！');
		}
		$data['role'] = I('post.role');
		$data['nickname'] = trim(I('post.nickname'));
		$data['head_img'] = trim(I('post.head_img','','htmlspecialchars'));
		$data['role'] = I('post.role');
		$data['remark'] = trim(I('post.remark','','htmlspecialchars'));
		$data['status'] = I('post.status');
		return $data;
		
	} 
	/*
	删除用户
	 */
	public function delUser() {
		$id = I('id');
		if(D('user')->where(array('id' => $id))->delete()) {
			$this->success('删除成功！',U('System/user'));
		}else {
			$this->error('删除失败！');
		}
	}
	/******************权限配置********************/
	public function setting_access() {
		$node = D('node');
		$access = D('access');
		if(IS_POST) {
			//获取角色ID
			$role = I('post.id');
			$rules = I('post.rule');//获取勾选的内容
			//p($rules);die;//$rules是一个对应节点id的数组
			//先删除原先数据库中的角色所对应的权限，避免重复写入
			$access->where(array('role_id' => $role))->delete();
			//统计所有勾选的个数
			for($i = 0; $i < count($rules); $i++) {
				$data['role_id'] = $role;
				$data['node_id'] = $rules[$i];
				$result = $access->add($data);
			}
			if($result) {
				$this->success('权限修改成功！',U('System/role'));
			}else{
				$this->error('权限修改失败~~！',U('System/role'));
			}

		}else {
			$role_id = I('get.id');
			//根据角色id来获取对应所有节点的id
			$node_ids = $access->where('role_id = '.$role_id.'')->field('node_id')->select();
			//将所有的node_id用#连接
			foreach($node_ids as $val) {
				$ids = '#' . $ids . $val['node_id'] .'#';
			}
			//获取节点表中的所有节点
			$data = $node->field('id, title, pid, menuflag')->select();
			$this->assign('list', $data);
			$this->assign('group',$ids);
			$this->assign('role',$role_id);
			$this->display();
		}
	}
}
 ?>
