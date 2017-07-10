<?php 
namespace Admin\Model;
use Think\Model;
/**
 * 角色逻辑模型
 */
class RoleModel extends CommonModel {
	protected $pk = 'id';//主键
	protected $tableName = 'role';//定义表名
	protected $token = 'role';
	/*
	验证角色名是否唯一
	 */
	public function getRoleName($name) {
		//true即表示存在，false表示不存在
		$data = $this->where(array('name' => $name))->find();
		return $this->_format($data);
	} 
}
?>