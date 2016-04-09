<?php
namespace Admin\Controller;
use Think\Controller;
class PublicsController extends Controller{
	/**
     * 后台用户登录
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function login(){
        if(IS_POST){
            /* 检测验证码 TODO: 
            if(!check_verify($verify)){
                $this->error('验证码输入错误！');
            }
			*/
		    $loginName = I('post.loginName','');
            $loginPwd = I('post.loginPwd','');
            /* 验证登录 */
            $User = D('Managerinfo');
            $uid = $User->login($loginName, $loginPwd);
            if(0 < $uid){ //验证登录成功
            
                if($User->autoLogin($uid)){ //登录用户
                    //TODO:跳转到登录前页面
                    $this->success('登录成功！', U('Index/index'));
                } else {
                    $this->error($User->getError());
                }

            } else { //登录失败
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $this->error($error);
            }
        } else {
            if(is_login()){
                $this->redirect('Index/index');
            }else{
                /* 读取数据库中的配置 */
                /*
                $config	=	S('DB_CONFIG_DATA');
                if(!$config){
                    $config	=	D('Config')->lists();
                    S('DB_CONFIG_DATA',$config);
                }
                C($config); //添加配置
                */
               // $this->display();
               $this->display('sign-in');
            }
        }
    }

    /* 退出登录 */
    public function logout(){
        if(is_login()){
            D('Managerinfo')->logout();
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
        }
    }

    /**
     * [add description]
     * @param string $username [description]
     * @param string $password [description]
     * @param string $email    [description]
     */
    public function add(){
        if(IS_POST){
            /* 注册用户 */
            $loginName = I('post.loginName','');
            $loginPwd = I('post.loginPwd','');
            $email = I('post.email','');
            $userName = I('post.userName','');
            

            $User = D('Managerinfo');
            $uid  = $User->register($loginName, $loginPwd, $email,$userName);
            if(0 < $uid){ //注册成功
                $this->success('用户添加成功！',U('Admin/index/index'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid),true);
            }

        } else {
            $this->meta_title = '新增管理员';
            //$this->display();
            $this->display('sign-up');
        }
    }    

    /**
     * 获取用户注册错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showRegError($code = 0){
        switch ($code) {
            case -1:  $error = '用户名长度必须在16个字符以内！'; break;
            case -2:  $error = '用户名被禁止注册！'; break;
            case -3:  $error = '用户名被占用！'; break;
            case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
            case -5:  $error = '邮箱格式不正确！'; break;
            case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
            case -7:  $error = '邮箱被禁止注册！'; break;
            case -8:  $error = '邮箱被占用！'; break;
            case -9:  $error = '手机格式不正确！'; break;
            case -10: $error = '手机被禁止注册！'; break;
            case -11: $error = '手机号被占用！'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }

    /**
     * [verify description]
     * @return [type] [description]
     */
    public function verify(){
        $verify = new \Think\Verify();
        $verify->entry(1);
    }
}