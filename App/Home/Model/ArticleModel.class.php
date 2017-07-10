<?php 
namespace Home\Model;
use Think\Model;

class ArticleModel extends Model {

	/**
	 * 对传入的文章种类id查询
	 * @Author:梁轩豪
	 * @DateTime:  2017-03-25 21:43:10
	 * @param      [type]                   $cate_id     [description]
	 * @param      [type]                   $requestPage [description]
	 * @param      [type]                   $rows        [description]
	 * @return     [type]                                [description]
	 */
	public function getTheArticle($cate_id, $rows) {
		
		//查询符合条件的条数
		$count = M('Article')->where(array('cate_id' => $cate_id))->count();
		$p = getpage($count, $rows);
		$show = $p->show();
		//获取信息
		$list = $this->where(array('myblog_article.cate_id' => $cate_id))->field(array('id','title','image','remark','content','author','author_ip','create_time','or_top','click','from','myblog_article_cate.cate_name as cate_name'))
		->join('LEFT join myblog_article_cate ON myblog_article_cate.cate_id=myblog_article.cate_id')
		->order('create_time desc')->page(I('get.p'))->limit($rows)->select();
		$data = array(
			'show' => $show,
			'list' => $list,
			);
		return $data;
	}
	/**
	 * @function: 获取文章的详细信息
	 * @Author:梁轩豪
	 * @DateTime:  2017-03-25T22:11:58+0800
	 * @return     [type]                   [description]
	 */
	public function getDetail($id) {
		$data = $this->where(array('myblog_article.id' => $id))->field(array('id','title','image','remark','content','author','author_ip','create_time','or_top','click','from','myblog_article_cate.cate_name as cate_name'))
		->join('LEFT join myblog_article_cate ON myblog_article_cate.cate_id=myblog_article.cate_id')->find();
		//文章点击次数加1
		$tmp = $this->field('click')->find($id);
		$tmp['click'] = $tmp['click'] + 1;
		$this->where(array('id' => $id))->save($tmp);
		return $data;
	}
}
?>