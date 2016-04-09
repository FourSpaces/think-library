<?php

namespace Home\Model;
use Think\Model;


class PublisherModel extends Model{

	/* 模型自动验证 */
	protected $_validate = array(
		/* 验证用户名 */
		array('pressname', '2,12', -1, self::EXISTS_VALIDATE, 'length'), //用户名长度不合法
		array('pressname', '', -3, self::EXISTS_VALIDATE, 'unique'), //用户名被占用

	);

	/* 模型自动完成 */
	protected $_auto = array(
		array('updatetime', NOW_TIME,3),
	);

	public function addtype($pressname,$sort=0){
		$data = array(
			'pressname' => $pressname , 
			'sort' => intval($sort)? intval($sort):0,
			);

		/*添加分类*/
		if($this->create($data)){
			$uid = $this->add();
			return $uid ? $uid : 0; //0-未知错误，大于0-成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
	}

	/**
	 * [updatetype 更新]
	 * @param  [type] $id        [description]
	 * @param  [type] $pressname [description]
	 * @param  [type] $sort      [description]
	 * @return [type]            [description]
	 */
	public function updatetype($id,$pressname,$sort){
		//$data = array('id' => intval($id)? intval($id):0,);
		$save = array(
			'id' => intval($id)? intval($id):0,
			'pressname' => $pressname , 
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

    /**
     * [getlistarray 获得列表数组]
     * @param  array  $data  [description]
     * @param  string $order [description]
     * @return [type]        [description]
     */
    public function getlistarray($data = array(), $order = 'sort,id'){
    	$data['status'] = 1;

    	$return = $this->where($data)->order($order)->getField('id,pressname');

    	return $return;
    }
}