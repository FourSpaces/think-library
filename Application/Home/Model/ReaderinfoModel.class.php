<?php

namespace Home\Model;
use Think\Model;

/**
 * 读者模型
 */
class ReaderinfoModel extends Model{

/* 用户模型自动验证 */
	protected $_validate = array(
		/* 验证用户名 */
		array('loginname', '1,20', -1, self::EXISTS_VALIDATE, 'length',self::MODEL_BOTH), //用户名长度不合法
		array('loginname', '', -3, self::EXISTS_VALIDATE, 'unique',self::MODEL_INSERT), //用户名被占用

		/* 验证密码 */
		array('loginpwd', '6,30', -4, self::EXISTS_VALIDATE, 'length',self::MODEL_BOTH), //密码长度不合法

		/* 验证邮箱 */
		array('email', 'email', -5, self::EXISTS_VALIDATE,'',self::MODEL_BOTH), //邮箱格式不正确
		array('email', '1,32', -6, self::EXISTS_VALIDATE, 'length',self::MODEL_BOTH), //邮箱长度不合法
		array('email', '', -8, self::EXISTS_VALIDATE, 'unique',self::MODEL_INSERT), //邮箱被占用
	);

	/* 用户模型自动完成 */
	protected $_auto = array(
		//array('loginpwd', 'think_ucenter_md5', self::MODEL_BOTH, 'function', UC_AUTH_KEY),
		array('loginpwd', 'think_ucenter_md5', self::MODEL_BOTH, 'function_ignore', UC_AUTH_KEY),
		array('updatetime', NOW_TIME,self::MODEL_BOTH),
	);

	/**
	 * 注册一个新用户
	 * @param  string $loginname 用户名
	 * @param  string $loginpwd 用户密码
	 * @param  string $email    用户邮箱
	 * @return integer          注册成功-用户信息，注册失败-错误编号
	 */
	public function register($loginname, $loginpwd, $email, $username,$typeid,$status){
		$data = array(
			'username'   => $username,
			'loginname'  => $loginname,
			'loginpwd'   => $loginpwd,
			'email'      => $email,
			'createtime' => NOW_TIME,
			'status'	 => $status,
			'typeid'     => $typeid,
		);

		/* 添加用户 */
		if($this->create($data)){
			$uid = $this->add();
			return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
	}

	/**
	 * 用户登录认证
	 * @param  string  $loginname 用户名
	 * @param  string  $loginpwd 用户密码
	 * @return integer           登录成功-用户ID，登录失败-错误编号
	 */
	public function login($loginname, $loginpwd){
		$data = array(
			'loginname'  => $loginname,
			'status'	 => 1
		);

		/* 获取用户数据 */

		$user = $this->where($data)->find();
		if(is_array($user) && $user['status']){
			if(think_ucenter_md5($loginpwd, UC_AUTH_KEY) == $user['loginpwd']){
				$this->updateLogin($user['userid']); //更新用户登录信息
				return $user['userid']; //登录成功，返回用户ID
			} else {
				return -2; //密码错误
			}
		} else {
			return -1; //用户不存在或被禁用
		}
	}

	/**
	 * 更新用户登录信息
	 * @param  integer $uid 用户ID
	 */
	protected function updateLogin($uid){
		$data = array(
			'userid'       => $uid,
			'lasttime' => NOW_TIME,
		);
		$this->save($data);
	}

	public function updatePwd($uid,$oldPwd,$newPwd){
		$pwdtab = $this->verifyUser($uid ,$oldPwd);
		if($pwdtab){
			$data = array();
            $data['userid'] = $uid;
            $data['loginpwd'] = $newPwd;

            if($this->create($data)){
				$uid = $this->save();
				return $uid ? $uid : 0; //0-未知错误，大于0-成功
			} else {
				return $this->getError(); //错误详情见自动验证注释
			}

		}else{
			return -2;
		}
	}

	/**
	 * [updataUser 更新数据]
	 * @param  [type] $data [数据]
	 * @return [type]       [description]
	 */
	public function updataUser($data){
		/* 添加用户 */
		if($this->create($data)){
			$uid = $this->save();
			return $uid ? $uid : 0; //0-未知错误，大于0-更新成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
	}

	/**
	 * 更新用户信息
	 * @param int $uid 用户id
	 * @param string $loginpwd 密码，用来验证
	 * @param array $data 修改的字段数组
	 * @return true 修改成功，false 修改失败
	 * @author huajie <banhuajie@163.com>
	 */
	public function updateUserFields($uid, $loginpwd, $data){
		if(empty($uid) || empty($loginpwd) || empty($data)){
			$this->error = '参数错误！';
			return false;
		}

		//更新前检查用户密码
		if(!$this->verifyUser($uid, $loginpwd)){
			$this->error = '验证出错：密码不正确！';
			return false;
		}

		//更新用户信息
		$data = $this->create($data);
		if($data){
			return $this->where(array('id'=>$uid))->save($data);
		}
		return false;
	}

	/**
	 * 验证用户密码
	 * @param int $uid 用户id
	 * @param string $loginpwd_in 密码
	 * @return true 验证成功，false 验证失败
	 * @author huajie <banhuajie@163.com>
	 */
	protected function verifyUser($uid, $loginpwd_in){
		$loginpwd = $this->getFieldById($uid, 'loginpwd');
		if(think_ucenter_md5($loginpwd_in, UC_AUTH_KEY) === $loginpwd){
			return true;
		}
		return false;
	}

	/**
	 * [getFieldById 获得主键对应的某个参数]
	 * @param  [type] $uid     [用户主键]
	 * @param  [type] $keyName [字段名]
	 * @return [type]          [description]
	 */
	public function getFieldById($uid, $keyName){
		return $this->where("userid=$uid")->getField($keyName);
	}
	

	 /**
     * 注销当前用户
     * @return void
     */
    public function logout(){
        session('user_auth', null);
        session('user_auth_sign', null);
    }

    /**
     * 自动登录用户
     * @param  integer $user 用户信息数组
     */
    public function autoLogin($userId){
    	$map = array();
		$map['userid'] = $userId;
    	/* 获取用户数据 */
		$user = $this->where($map)->find();

		if(is_array($user) && $user['status']){
			 
			/* 记录登录SESSION和COOKIES */
	        $auth = array(
	            'userid'    => $user['userid'],
	            'username'  => $user['username'],
	            'loginname' => $user['loginname'],
	            'email'     => $user['email'],
	            'lasttime'  => $user['lasttime'],
	            'typeid'    => $user['typeid'],
	        );

	        session('user_auth', $auth);
	        session('user_auth_sign', data_auth_sign($auth));

	        return true;
		}
		else{
	       return false;
		}
    }


}