<?php
namespace Admin\Model;
use Think\Model;
/**
 * 节点模型
 */
class NodeModel extends CommonModel{
    protected $pk   = 'id';
    protected $tableName =  'node';
    protected $token = 'node';   
}