<?php 
namespace Admin\Model;
use Think\Model;

/**
 * 公共模型
 */
class CommonModel extends Model {
	protected $pk   = '';
    protected $tableName =  '';
    protected $token = '';
    protected $cacheTime = 86400; //缓存时间
    protected $orderby = array(); //针对全部查询出的数据的排序

    public function updateCount($id,$col,$num = 1){
        $id = (int)$id;
        
        return $this->execute(" update ".$this->getTableName()." set {$col} = ({$col} + '{$num}') where ".$this->pk." = '{$id}' ");
    }
    
    public  function  itemsByIds($ids = array()){
        if(empty($ids)) return array();
        $data = $this->where(array($this->pk=>array('IN',$ids)))->select();
        $return = array();
        foreach($data as $val){
            $return[$val[$this->pk]] = $val;
        }
        return $return;
    }
   /*
   查找所有数据并按数组顺序排列
    */
    public function fetchAll(){
		//设置缓存
        S(array('type'=>'File','expire'=>  $this->cacheTime));
		
        if(!$data = S($this->token)){
            $result = $this->order($this->orderby)->select();
            $data = array();
            foreach($result  as $row){
			
                $data[$row[$this->pk]] = $this->_format($row);
            }
			
            S($this->token,$data);
           
        }   
        return $data;
     }
     
     public function cleanCache(){
        
         S($this->token,null);
   
     }
    /*
    ？？？针对结果统一，方便输出
    */
    public  function _format($data){
        return $data;
    }
}
 ?>
