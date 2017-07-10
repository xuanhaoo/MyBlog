<?php
return array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST'  => array('Admin','Home'),
    'URL_MODEL'                 =>2,    //2为去掉url中的index.php
       
    'DEFAULT_MODULE'     =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER' =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'     =>  'index', // 默认操作名称
    //加载配置文件
    'LOAD_EXT_CONFIG' => 'site_config',

    //模版设置相关
    'TMPL_ACTION_SUCCESS'   => 'Public/dispatch_jump',
    'TMPL_ACTION_ERROR'     => 'Public/dispatch_jump',

    //数据库配置项
    'DEFAULT_CHARSET' => 'utf-8',
    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'tp_blog', // 数据库名
    'DB_USER'   => 'root', // 用户名
   	'DB_PWD'    => '201607',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'myblog_', // 数据库表前缀

    //权限控制
    'RBAC_SUPERADMIN' => "admin",   //超级管理员
    'ADMIN_AUTH_KEY' => 'superadmin', //识别超级管理员
    'USER_AUTH_ON' => true,         //是否开启验证
    'USER_AUTH_TYPE' => 2,          //1.登录验证 2.实时验证
    'NOT_AUTH_MODULE' => '',       //无需认证的控制器

    'PAGE_SIZE' => 8,             //每页显示数量
    
    'NOT_AUTH_ACTION' => '',       //无需认证的方法
    // 'RBAC_ROLE_TABLE' => 'myblog_role',         //角色表
    // 'RBAC_USER_TABLE' => 'myblog_role_user',    //中间表
    // 'RBAC_ACCESS_TABLE' => 'myblog_access',     //权限表
    // 'RBAC_NODE_TABLE' => 'myblog_node'          //节点表

);