<?php

namespace Admin\Model;
use Think\Model;

/**
 * 借书模型
 */
class BorrowinfoModel extends Model{

	/* 用户模型自动验证 */
	protected $_validate = array(
		/* 验证类型名 */
		array('readerid', 'require', -1, self::MUST_VALIDATE, 'regex'), //读者id不能为空

		array('bookid', 'require', -2, self::MUST_VALIDATE, 'regex'), //不能为空

		array('managerid', 'require', -3, self::MUST_VALIDATE, 'regex'), //不能为空

	);

	public function addData($uid,$utype,$bookid,$managerid=1){
		$data = array();
		$data['readerid'] = $uid;
		$data['bookid'] = $bookid;
		$data['managerid'] = $managerid;
		$data['borrowtime'] = NOW_TIME;
		$data['status'] = 1;
		
		
		if($utype == 1){
			$data['endttime'] = NOW_TIME+C('STUDENT_TERM');
		}else{
			$data['endttime'] = NOW_TIME+C('TEACHER_TERM');
		}

		/*添加*/
		if($this->create($data)){
			$uid = $this->add();
			return $uid ? $uid : 0; //0-未知错误，大于0-成功
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
    
    public function alsoBook($map = array()){
    	$data = array();
    	$data['returntime'] = NOW_TIME;
    	$data['status'] = 2;

		$uid = $this->where($map)->save($data);
		return $uid ? $uid : 0; //0-未知错误，大于0-成功
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

    public function updatestatus(){
        $data['status'] = '0';
        $this->where('returntime = 0 AND endttime<'.NOW_TIME)->save($data); // 根据条件更新记录
    }
}