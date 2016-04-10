<?php

namespace Admin\Model;
use Think\Model;

/**
 * 图书 模型
 */
class ArticleModel extends Model{

/* 用户模型自动验证 */
	protected $_validate = array(
		/* 验证类型名 */
		array('isbn', '9,20', -1, self::EXISTS_VALIDATE, 'length'), //ISBN长度不合法
		array('isbn', 'require', -9, self::MUST_VALIDATE, 'regex'), //不能为空
		array('isbn', '', -5, self::EXISTS_VALIDATE, 'unique'), 	//ISBN码已经存在

		array('bookname', '2,12', -2, self::EXISTS_VALIDATE, 'length'), //图书名长度不合法
		array('bookname', 'require', -9, self::MUST_VALIDATE, 'regex'), //不能为空

		array('author', '2,12', -3, self::EXISTS_VALIDATE, 'length'), //作者名长度不合法
		array('author', 'require', -4, self::MUST_VALIDATE, 'regex'), //不能为空

		array('typeid', 'require', -4, self::MUST_VALIDATE, 'regex'), //分类不能为空
		array('publisherid', 'require', -4, self::MUST_VALIDATE, 'regex'), //分类不能为空
		array('frontcover', 'require', -4, self::MUST_VALIDATE, 'regex'), //分类不能为空

		array('page', 'require', -4, self::MUST_VALIDATE, 'regex'), //页数不能为空

		array('sumnum', 'require', -4, self::MUST_VALIDATE, 'regex'), //页数不能为空
	);

	/* 用户模型自动完成 */
	protected $_auto = array(
		array('status', 1),
		array('createtime', NOW_TIME),
		array('updatetime', NOW_TIME,3),
	);

	public function addData($data = array()){
		
		/*添加*/
		if($this->create($data)){
			$uid = $this->add();
			return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
	}

	public function update($data = array()){

		/*更新*/
		if($this->create($data)){
			$uid = $this->save();
			return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
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
    public function getlists($data = array(), $order = 'sort,id'){
    	$data['status'] = 1;

    	$return = $this->where($data)->order($order)->select();

    	return $return;
    }

}