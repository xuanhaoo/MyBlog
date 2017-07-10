<?php 
	/*
	做测试用
	*/
	function p($content){
		dump($content);
	}
	/**
	 * 显示分页信息
	 */
	function getpage($count, $pagesize = 8) {
		$p = new Think\Page($count,$pagesize);
		$p->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
		$p->setConfig('prev', '上一页');
		$p->setConfig('next', '下一页');
		$p->setConfig('first', '首页');
		$p->setConfig('last', '末页');
		$p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
		return $p;
	}

	/**
	 * 递归重组节点信息为多维数组
	 * @param  [type]  $node [要处理的节点数组]
	 * @param  integer $pid  [父级ID]
	 * @return [type]        [description]
	 */
	function node_merge($node, $access = null, $pid = 0) {
		$arr = array();
		foreach($node as $v) {
			if(is_array($access)) {
				//如果节点中的id在access中，就压入1否则压入0，有权限为1，无为0
				$v['access'] = in_array($v['id'], $access) ? 1 : 0;
				// if(is_array($v, $access)) {
				// 	$v['access'] = 1;
				// } else {
				// 	$v['access'] = 0;
				// }
			}
			if($v['pid'] == $pid) {
				//压到数组里形成多维数组
				$v['child'] = node_merge($node, $access, $v['id']);
				$arr[] = $v;
 			}
		}
		return $arr;
	}
	/**
	 * 删除缓存方法
	 */
	function delFileByDir($dir) {
		$dh = opendir($dir);
		while($file = readdir($dh)) {
			if($file != '.' && $file != '..') {
				$fullPath = $dir."/".$file;
				//判断给定的文件名是否是一个目录
				if(is_dir($fullPath)) {
					//递归找到文件
					delFileByDir($fullPath);
				}else {
					//删除文件
					unlink($fullPath);
				}
			}
		}
		closedir($dh);
	}
	/*
	控制文章显示的字数
	 */
	function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
        if(function_exists("mb_substr"))
            $slice = mb_substr($str, $start, $length, $charset);
        elseif(function_exists('iconv_substr')) {
            $slice = iconv_substr($str,$start,$length,$charset);
            if(false === $slice) {
                $slice = '';
            }
        }else{
            $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            $slice = join("",array_slice($match[0], $start, $length));
        }
        $fix='';
        if(strlen($slice) < strlen($str)){
            $fix='......';
        }
        return $suffix ? $slice.$fix : $slice;
    }
 ?>
