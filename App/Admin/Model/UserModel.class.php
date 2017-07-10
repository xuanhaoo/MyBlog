<?php 
namespace Admin\Model;
use Think\Model;

/*
用户模型
 */
class UserModel extends CommonModel {
	protected $pk = 'id';//定义主键
	protected $tableName = 'user';//定义表名tableName

	/*
	查询是否存在相同的用户名
	 */
	public function getUserName($username) {
		$data = $this->where(array('username' => $username))->find();
		return $this->_format($data);
	}
}
 ?>
