<?php 
namespace Admin\Controller;
use Think\Controller;
/**
 * 网站站点控制器
 */
class SiteController extends CommonController {

	public function index() {
		$this->display();
	}
	/*
	提交修改
	 */
	public function setting() {
		if(IS_POST) {
			$this->savesite('site_config.php');
		}else {
			$this->error('发生错误啦~~');
		}
	}

	public function savesite($filename) {
		if($this->update_site($_POST,$filename)) {
			$this->success('保存成功！',U('Site/index'));
		}else {
			$this->error('操作失败！',U('Site/index'));
		}
	}
	public function update_site($new_config,$filename) {
		$config_file = CONF_PATH.$filename;
		if(is_file($config_file) && is_writable($config_file)) {
			$config = require $config_file;	//读取原配置内容
			//将新配置内容与原来的合并，新的覆盖旧的
			$config = array_merge($config,$new_config);	
			//将合并后的字符串写入文件	
			file_put_contents($config_file, "<?php return ".stripslashes(var_export($config, true)).';',LOCK_EX);

			@unlink(RUNTIME_PATH);
			return ture;
		}else {
			return false;
		}
	}
}

 ?>