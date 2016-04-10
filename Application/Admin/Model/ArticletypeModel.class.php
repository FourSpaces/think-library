<?php

namespace Admin\Model;
use Think\Model;

/**
 * 文章分类模型
 */
class ArticletypeModel extends Model{

/* 用户模型自动验证 */
	protected $_validate = array(
		/* 验证名字 */
		array('name', '2,12', -1, self::EXISTS_VALIDATE, 'length'), //类型名长度不合法
		array('name', 'require', -3, self::MUST_VALIDATE, 'regex'), //不能为空

		/* 验证上级id*/
		array('parentid', 'require', -3, self::MUST_VALIDATE, 'regex'), //不能为空

	);

	/**
	 * [addtype 添加类型]
	 * @param  [type]  $typename [description]
	 * @param  integer $sort     [description]
	 * @return [type]            [description]
	 */
	public function addtype($parentid,$name){
		$data = array(
			'parentid' => $parentid ,
			'name' => $name , 
			'type' => intval($parentid)?1:0,
			'status' => 1,
			);

		/*添加分类*/
		if($this->create($data)){
			$uid = $this->add();
			return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
	}

	/**
	 * [updatetype 更新类型]
	 * @param  [type] $id       [description]
	 * @param  [type] $parentid [description]
	 * @param  [type] $name     [description]
	 * @return [type]           [description]
	 */
	public function updatetype($id,$parentid,$name){
		//$data = array('id' => intval($id)? intval($id):0,);
		$save = array(
			'id' => intval($id)? intval($id):0,
			'parentid' => $parentid ,
			'name' => $name , 
			'type' => intval($parentid)?1:0,
			);
		//$val = $this->where($data)->save($save);
		$val = $this->save($save);

		return $val;
	}
    
    /**
     * [getlists 获得列表]
     * @param  array  $data  [description]
     * @param  string $order [description]
     * @return [type]        [description]
     */
    public function getlists($data = array(), $order = 'id'){
    	$data['status'] = 1;
    	
    	$return = $this->where($data)->order($order)->select();

    	return $return;
    }

}