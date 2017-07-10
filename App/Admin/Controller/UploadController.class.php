<?php 
namespace Admin\Controller;
use Think\Controller;
/**
 * 上传文件控制器
 */
class UploadController extends Controller {
	/*
	上传用户头像
	 */
	public function uploaduserimg() {
		$upload = new \Think\Upload();  //实例化上传类
		$upload->maxsize = 3145728;		//上传大小
		$upload->exts = array('jpg','png','gif','jpeg');//上传文件类型
		$upload->savePath = '/user-head-img/';		//上传文件子目录
		$info = $upload->upload();			//上传文件
		if($info) {
			foreach($info as $file){               
					$fileUrl = $file['savepath'].$file['savename'];;
			           }	
		}else {
			$this->error($upload->getError());
		}
		echo $fileUrl;//获取上传文件的信息,返回到上传js onUploadSuccess中的data参数中

	}
	/*
	上传文章中的图片，修改Ueditor的默认上传路径
	 */
	public function upload_article() {
		$upload = new Think\Upload();
		$upload->maxsize = 3145728;
		$upload->exts = array('jpg','png','gif','jpeg');
		$upload->savePath = '/article-image/';
		$info = $upload->upload();
		if($info) {
			foreach($info as $file){               
					$fileUrl = $file['savepath'].$file['savename'];;
			           }	
		}else {
			$this->error($upload->getError());
		}
		echo $fileUrl; //获取上传文件的信息,返回到上传js onUploadSuccess中的data参数中
	}
	
	//上传心情中的图片，修改Ueditor的默认上传路径
	 
	public function upload_mood() {
		$upload = new \Think\Upload();
		$upload->maxsize = 3145728;
		$upload->exts = array('jpg','png','gif','jpeg');
		
		$upload->savePath = '/mood-image/';
		$info = $upload->upload();
		if($info) {
			foreach($info as $file){               
					$fileUrl = $file['savepath'].$file['savename'];;
			           }	
		}else {
			$this->error($upload->getError());
		}
		echo $fileUrl; //获取上传文件的信息,返回到上传js onUploadSuccess中的data参数中
	}

}
?>