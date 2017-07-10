<?php
namespace Admin\Model;
use Think\Model;
/*
权限模型
 */
class AccessModel extends CommonModel{
    protected $pk   = 'id';
    protected $tableName =  'access';
    protected $token = 'access';
    
    /*
    根据角色id来获取所有的节点id
     */
    public function getMenuIdsByRoleId($id)
    {
         return $this->where(array('role_id' => $id))->field('node_id')->select();
        
    }
    
    
}