<?php

namespace Home\Model;
use Think\Model;

/**
 * 图书分类 模型
 */
class BooktypeModel extends Model{

/* 用户模型自动验证 */
	protected $_validate = array(
		/* 验证类型名 */
		array('typename', '2,12', -1, self::EXISTS_VALIDATE, 'length'), //类型名长度不合法
		array('typename', '', -3, self::EXISTS_VALIDATE, 'unique'), //类型名被占用

	);

	/* 用户模型自动完成 */
	protected $_auto = array(
		array('updatetime', NOW_TIME,3),
	);

	public function addtype($typename,$sort=0){
		$data = array(
			'typename' => $typename , 
			'sort' => intval($sort)? intval($sort):0,
			);

		/*添加分类*/
		if($this->create($data)){
			$uid = $this->add();
			return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
	}

	public function updatetype($id,$typename,$sort){
		//$data = array('id' => intval($id)? intval($id):0,);
		$save = array(
			'id' => intval($id)? intval($id):0,
			'typename' => $typename , 
			'sort' => intval($sort)? intval($sort):0,
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
    public function getlists($data = array(), $order = 'sort,id'){
    	$data['status'] = 1;

    	$return = $this->where($data)->order($order)->select();

    	return $return;
    }

    public function getlistarray($data = array(), $order = 'sort,id'){
    	$data['status'] = 1;

    	$return = $this->where($data)->order($order)->getField('id,typename');

    	return $return;
    }

}