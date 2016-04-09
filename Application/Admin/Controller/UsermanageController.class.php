<?php
namespace Admin\Controller;

/**
 * 用户管理模块控制器
 */
class UsermanageController extends AdminController{


    protected function _initialize(){
        parent::_initialize(); //调用父类的初始化函数
        $this->assign('menuTab', 'user-menu');
    }

/*****************读者管理模块****************/
    /**
     * [ReadersList description]
     */
    public function ReadersList(){

        $map = array();
        $map['status']  = array('gt',0);

        $list = $this->lists('Readerinfo', $map,'createtime desc ,userid desc');
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('list', $list);

        $stylelist[] = array('id' => 1 ,'typename'=> '学生' );
        $stylelist[] = array('id' => 2 ,'typename'=> '老师' );
        $this->assign('stylelist', $stylelist);
        $this->assign('pageTab', 'pageDZGL');
        $this->display();
    }

    /**
     * [ReadersAdd description]
     */
    public function ReadersAdd(){

        if(IS_POST){
            /* 注册用户 */
            $loginName = I('post.loginname','');
            $loginPwd = I('post.loginpwd','');
            $email = I('post.email','');
            $userName = I('post.username','');
            $typeid = (int)I('post.typeid','1');
            $status = (int)I('post.status','1');

            $User = D('Readerinfo');
            $uid  = $User->register($loginName, $loginPwd, $email,$userName,$typeid,$status);
            if(0 < $uid){ //注册成功
                //$this->success('用户添加成功！',U('Admin/index/index'),true);
                $this->success('用户添加成功！',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid),true);
            }
    
        }else{
            //如果不是POST 请求
            $stylelist[] = array('id' => 1 ,'typename'=> '学生' );
            $stylelist[] = array('id' => 2 ,'typename'=> '老师' );
            $this->assign('stylelist', $stylelist);

            $this->assign('titleTab','1');
            $this->assign('pageTab', 'pageDZGL');
            $this->display('ReadersEdit');
        }

       
    }

    /**
     * [ReadersEdit description]
     */
    public function ReadersEdit($id = 0){

        if(IS_POST){
            //如果是POST请求 
            $data = array();
            $data['userid'] = I('post.userid','');
            $data['loginname'] = I('post.loginname','');
            $data['email'] = I('post.email','');
            $data['username'] = I('post.username','');
            $data['typeid'] = (int)I('post.typeid','1');
            $data['status'] = (int)I('post.status','1');
          
            if(I('post.loginpwd','') != substr(md5("passwprd"),8,16)){
                $data['loginpwd'] = I('post.loginpwd','');
            }

            $user = D('Readerinfo');

            $val = $user->updataUser($data);
            if(0 < $val){ //添加成功
                $this->success('修改成功！',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                //$this->error($book->_SQL(),true);
                $this->error($this->showRegError($val),true);
            }

        }else{
            //如果不是POST 请求
            if(!empty($id)){
                $user = D('Readerinfo');
                $info = $user->where("status>0 AND userid=$id")->find();

                if(!empty($info)){
                    $info['loginpwd'] = substr(md5("passwprd"),8,16);

                    $stylelist[] = array('id' => 1 ,'typename'=> '学生' );
                    $stylelist[] = array('id' => 2 ,'typename'=> '老师' );
                    $this->assign('stylelist', $stylelist);
                    $this->assign('info',$info);
                    $this->assign('titleTab','2');
                    $this->assign('pageTab', 'pageDZGL');
                    $this->display('ReadersEdit');
                }
               
            }
          
        }

       
    }

    /**
     * [deleteReaders description]
     */
    public function deleteReaders(){
        if(IS_POST){
        //如果是POST请求
            $id = I('post.id',0);

            $data = array('userid' => $id);

            $user = D('Readerinfo');
            $uid = $user->where($data)->save( array('status' =>0));

            if(0 < $uid){ //更新成功
                $this->success('操作成功',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showstyleError($uid),true);
            }
            
        }
    }

/*****************管理员管理模块*************/
    
    /**
     * [AdministratorList description]
     */
    public function AdministratorList(){


        $map = array();
        $map['status']  = array('gt',0);

        $list = $this->lists('Managerinfo', $map,'createtime desc ,userid desc');
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('list', $list);

        $stylelist[] = array('id' => 1 ,'typename'=> '超级管理员' );
        $stylelist[] = array('id' => 2 ,'typename'=> '管理员' );
        $this->assign('stylelist', $stylelist);
        $this->assign('pageTab', 'pageGLYGL');
        $this->display();
    }

    /**
     * [AdministratorAdd description]
     */
    public function AdministratorAdd(){

         if(IS_POST){
            /* 注册用户 */
            $loginName = I('post.loginname','');
            $loginPwd = I('post.loginpwd','');
            $email = I('post.email','');
            $userName = I('post.username','');
            $typeid = (int)I('post.typeid','1');
            $status = (int)I('post.status','1');

            $User = D('Managerinfo');
            $uid  = $User->register($loginName, $loginPwd, $email,$userName,$typeid,$status);
            if(0 < $uid){ //注册成功
                //$this->success('用户添加成功！',U('Admin/index/index'),true);
                $this->success('用户添加成功！',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid),true);
            }
    
        }else{
            //如果不是POST 请求
            $stylelist[] = array('id' => 1 ,'typename'=> '超级管理员' );
            $stylelist[] = array('id' => 2 ,'typename'=> '管理员' );
            $this->assign('stylelist', $stylelist);

            $this->assign('titleTab','1');
            $this->assign('pageTab', 'pageGLYGL');
            $this->display('AdministratorEdit');
        }

        
    }

    /**
     * [AdministratorEdit description]
     */
    public function AdministratorEdit($id = 0){

         if(IS_POST){
            //如果是POST请求 
            $data = array();
            $data['userid'] = I('post.userid','');
            $data['loginname'] = I('post.loginname','');
            $data['email'] = I('post.email','');
            $data['username'] = I('post.username','');
            $data['typeid'] = (int)I('post.typeid','1');
            $data['status'] = (int)I('post.status','1');
          
            if(I('post.loginpwd','') != substr(md5("passwprd"),8,16)){
                $data['loginpwd'] = I('post.loginpwd','');
            }

            $user = D('Managerinfo');

            $val = $user->updataUser($data);
            if(0 < $val){ //添加成功
                $this->success('修改成功！',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                //$this->error($book->_SQL(),true);
                $this->error($this->showRegError($val),true);
            }

        }else{
            //如果不是POST 请求
            if(!empty($id)){
                $user = D('Managerinfo');
                $info = $user->where("status>0 AND userid=$id")->find();

                if(!empty($info)){
                    $info['loginpwd'] = substr(md5("passwprd"),8,16);

                    $stylelist[] = array('id' => 1 ,'typename'=> '超级管理员' );
                    $stylelist[] = array('id' => 2 ,'typename'=> '管理员' );
                    $this->assign('stylelist', $stylelist);
                    $this->assign('info',$info);
                    $this->assign('titleTab','2');
                    $this->assign('pageTab', 'pageGLYGL');
                    $this->display('AdministratorEdit');
                }
               
            }
          
        }
    }

    /**
     * [deleteAdministrator description]
     * @return [type] [description]
     */
    public function deleteAdministrator(){
        if(IS_POST){
        //如果是POST请求
            $id = I('post.id',0);

            $data = array('userid' => $id);

            $user = D('Managerinfo');
            $uid = $user->where($data)->save( array('status' =>0));

            if(0 < $uid){ //更新成功
                $this->success('操作成功',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showstyleError($uid),true);
            }
            
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
}