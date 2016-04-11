<?php

namespace Admin\Model;
use Think\Model;

/**
 * 图书 模型
 */
class ArticleModel extends Model{

/* 用户模型自动验证 */
	protected $_validate = array(

		array('title', '2,40', -1, self::EXISTS_VALIDATE, 'length'), //标题长度不合法
		array('title', 'require', -2, self::MUST_VALIDATE, 'regex'), //不能为空

		array('summary', '2,200', -3, self::EXISTS_VALIDATE, 'length'), //简介长度不合法
		array('summary', 'require', -4, self::MUST_VALIDATE, 'regex'), //不能为空

		array('type', 'require', -5, self::MUST_VALIDATE, 'regex'), //分类不能为空
		array('content', 'require', -6, self::MUST_VALIDATE, 'regex'), //内容不能为空
	);

	/* 用户模型自动完成 */
	protected $_auto = array(
		array('status', 1),
		array('createtime', NOW_TIME),
	);

	public function addData($data = array()){
		
		/*添加*/
		if($this->create($data)){
			$uid = $this->add();
			return $uid ? $uid : 0; //0-未知错误，成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
	}

	public function update($data = array()){

		/*更新*/
		if($this->create($data)){
			$uid = $this->save();
			return $uid ? $uid : 0; //0-未知错误，成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
		return $val;
	}
    
    /**
     * [getlists 获得列表]
     * @param  array  $data  [description]
     * @param  string $order [description]
     * @return [type]        [description]
     */
    public function getlists($data = array(), $order = 'createtime'){
    	$data['status'] = 1;

    	$return = $this->where($data)->order($order)->select();

    	return $return;
    }

}