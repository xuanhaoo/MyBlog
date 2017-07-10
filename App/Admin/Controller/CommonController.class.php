<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 公共控制器模块
 */
class CommonController extends Controller {

    protected $_user = array();
    /*
    构造方法，判断是否经过登录而进入后台，
    以及对权限的控制
     */
    function _initialize() {
        $this->_user = session('userInfo');

       		// if(!isset($_SESSION['userInfo'])) {
       		// 	$this->redirect('Admin/Login/index');
       		// }
            $this->assign('user',$this->_user);
            
            $nownav['ct'] = CONTROLLER_NAME;
            $nownav['at'] = ACTION_NAME;
                
           
            $this->assign('nownav',$nownav);
            
            /*
            权限处理
             */
            //p($this->_user['role']);die;
            //不是超级管理员进行以下操作
            if ($this->_user['username'] != C('RBAC_SUPERADMIN')) {
               
                //获得所有的可操作的菜单       
                $this->_user['menu_list'] = D('Access') -> getMenuIdsByRoleId($this->_user['role']);	
                $menu_action = CONTROLLER_NAME . '/' . ACTION_NAME;
 				//p($menu_action);die;
                $menu = D('Node')->fetchAll();
                $menu_id = 0;
				/*
				对查找出的节点ID数组进行遍历
				 */
				//p($this->_user['menu_list']);p($menu);die;
				foreach($this->_user['menu_list'] as $val)
				{
					/*
					如果该角色的access表中包含节点ID并且当前控制器与操作名和数据表中的匹配
					 */
					foreach ($menu as $k => $v) {
						if($v['id'] == $val['node_id'])
						{
							//p($v['ct'].$val['at']);die;

							if (($v['ct'].'/'.$v['at']) == $menu_action) {	
								$menu_id = (int) $k;
								break;
							}
						}
					
						
					}
                }
                //p($menu_id.$menu_action);die;
                //头像下边显示用户所属角色
                $head_role = M('role')->select();
                $this->assign('head_role',$head_role);

                if (empty($menu_id) || $menu_id == 0) {
                	
                    $this->error('很抱歉您没有权限操作模块:' . $menu_action);
                }
            }
            $this->loadMenu();
        }
    /*
    加载左侧菜单栏
    */
	private function loadMenu() {
	       
	       foreach ($this->_user['menu_list'] as  $v) {
	       	$node_id[]=$v['node_id'];
	       }
	        //超级管理员
	        if($this->_user['username'] == C('RBAC_SUPERADMIN')){
	            $menu=D('Node')->where(array("menuflag" => 1))->select();
	            $this->assign('menu',$menu);
	        }else{

	            $menu=D('Node')->where(array("id"=>array('IN',$node_id),"menuflag"=>1))->select();
	            $this->assign('menu',$menu);

	        }

	    }
	/*
	检查字段是否匹配
	 */   
	protected function checkFields($data = array(), $fields = array()) {
	    foreach ($data as $k => $val) {
	        if (!in_array($k, $fields)) {
	                unset($data[$k]);
	            }
	        }
	        return $data;
	    }
 }
 