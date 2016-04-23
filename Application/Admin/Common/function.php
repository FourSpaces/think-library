<?php
/**
 * 后台公共文件
 * 主要定义后台公共函数库
 */

/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function is_login(){
    $user = session('user_auth');
    if (empty($user)) {
        return 0;
    } else {
        return session('user_auth_sign') == data_auth_sign($user) ? $user['userid'] : 0;
    }
}

/**
 * 检测当前用户是否为超级管理员
 * @return boolean true-管理员，false-非管理员
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function is_administrator($uid = null){
    $uid = is_null($uid) ? is_login() : $uid;
    return $uid && (intval($uid) === C('USER_ADMINISTRATOR'));
}


function get_user($field = null,$id = null){
    if(empty($id) && !is_numeric($id)){
        return false;
    }

    $list = null;
    if(empty($list[$id])){
	    $map = array('userid'=>$id);
	    $list[$id] = M('Readerinfo')->where($map)->field(true)->find();
	}
    return empty($field) ? $list[$id] : $list[$id][$field];
}

function get_user_type($field = null,$id = null){
	if(empty($id) && !is_numeric($id)){
        return false;
    }

    
	$map = array('userid'=>$id);
	$value = M('Readerinfo')->where($map)->getField($field);
	
	if($value==1){
		return "学生";
	}else if($value==2){
		return "教师";
	}else{
		return false;

	}
}