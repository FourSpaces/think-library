<?php
namespace Admin\Controller;

/**
 * 图书管理控制器
 */
class BookmanageController extends AdminController {

    protected function _initialize(){
        parent::_initialize(); //调用父类的初始化函数
        $this->assign('menuTab', 'books-menu');
    }
	/*
    public function index(){
    	//$this->display();
    }
	*/

/*************************图书分类**************************/
    /**
     * [bookstype 图书类型]
     * @return [type] [description]
     */
    public function bookstyle(){

        //获得分类数据
        /* 查询条件初始化 */
        $map = array();
        $map  = array('status' => 1);

        $list = $this->lists('Booktype', $map,'sort asc,id asc');
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('list', $list);
        //导航标签
        $this->assign('pageTab', 'pageTSLX');
    	$this->display();
    }

    /**
     * [addstyle 添加图书分类]
     * @return [type] [description]
     */
    public function addstyle(){
        if(IS_POST){
        //如果是POST请求    
            $pressname = I('post.pressname','');
            $sort = I('post.sort','');

            $book = D('Booktype');
            $uid  = $book->addtype($pressname, $sort);
            if(0 < $uid){ //添加成功
                $this->success('添加成功！',U('Admin/Bookmanage/bookstyle'),true);
                //$this->success('添加成功！',U('Admin/Bookmanage/addstyle'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showstyleError($uid),true);
            }
    
        }else{
        //如果不是POST 请求
        
            $this->assign('titleTab','1');
            $this->assign('pageTab', 'pageTSLX');
            $this->display('styleedit');   
        }
    }

    /**
     * [editstyle 编辑图书分类]
     * @return [type] [description]
     */
    public function editstyle($id = 0){
        if(IS_POST){
        //如果是POST请求 
           $typeid = I('post.typeid','0');
           $pressname = I('post.pressname','');
           $sort = I('post.sort','');
           $book = D('Booktype');
           $val = $book->updatetype($typeid,$pressname,$sort );
           if(0 < $val){ //添加成功
                $this->success('修改成功！',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                //$this->error($book->_SQL(),true);
                $this->error($this->showstyleError($val),true);
            }

        //updatetype$pressname
        }else{
        //如果不是POST 请求
        if(!empty($id)){
            
            $book = D('Booktype');
            $info = $book->where("status=1 AND id=$id")->find();
            if(!empty($info)){
                $this->assign('info',$info);
                $this->assign('titleTab','2');
                $this->assign('pageTab', 'pageTSLX');
                $this->display('styleedit');
            }
           
        }
          
        }
    }

    /**
     * [deletestyle 删除图书分类]
     * @return [type] [description]
     */
    public function deletestyle(){
        if(IS_POST){
        //如果是POST请求
            $id = I('post.id',0);

            $data = array('id' => $id);

            $book = D('Booktype');
            $uid = $book->where($data)->save( array('status' =>0));

            if(0 < $uid){ //更新成功
                $this->success('操作成功',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showstyleError($uid),true);
            }
            
        }
    }


/*************************图书列表**************************/
    /**
     * [booklist 图书列表]
     * @return [type] [description]
     */
    public function booklist(){

         /* 查询条件初始化 */
        $map = array();
        $map  = array('status' => 1);

        $list = $this->lists('Bookinfo', $map,'id asc');
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('list', $list);

        //获得图书分类 与 版社分类
        $stylelist = D('Booktype')->getlists();
        $presslist = D('Publisher')->getlists();
        $this->assign('stylelist',$stylelist);
        $this->assign('presslist',$presslist);

        //导航标签
        $this->assign('pageTab', 'pageTSLB');
    	$this->display();
    }

    /**
     * [addbook 添加图书]
     * @return [type] [description]
     */
    public function addbook(){
        if(IS_POST){
        //如果是POST请求   
         $data = array();  
         $data['isbn'] = I('post.isbn','');
         $data['bookname'] = I('post.bookname','');
         $data['author'] = I('post.author','');
         $data['page'] = I('post.page','');
         $data['sumnum'] = I('post.sumnum','');
         $data['typeid'] = I('post.typeid','');
         $data['publisherid'] = I('post.publisherid','');
         $data['frontcover'] = I('post.frontcover','');
          
         $book = D('Bookinfo');

         $uid  = $book->addData($data);
         //$this->error(var_export($book,true),true);
         if(0 < $uid){ //添加成功
            $this->success('添加成功！',U('Admin/Bookmanage/booklist'),true);
            //$this->success('添加成功！',U('Admin/Bookmanage/addbook'),true);
         } else { //注册失败，显示错误信息
            $this->error($this->showBookError($uid),true);
         }
            
        }else{
        //如果不是POST 请求

            //获得图书分类 与 版社分类
            $stylelist = D('Booktype')->getlists();
            $presslist = D('Publisher')->getlists();
            $this->assign('stylelist',$stylelist);
            $this->assign('presslist',$presslist);
            
            $this->assign('titleTab','1');
            $this->assign('pageTab', 'pageTSLB');
            $this->display('bookedit');    
        }
    }

    /**
     * [editbook 编辑图书]
     * @return [type] [description]
     */
    public function editbook($id = 0){
        if(IS_POST){
        //如果是POST请求 
            
            $data = array();
            $data['id'] = I('post.bookid','');  
            $data['isbn'] = I('post.isbn','');
            $data['bookname'] = I('post.bookname','');
            $data['author'] = I('post.author','');
            $data['page'] = I('post.page','');
            $data['sumnum'] = I('post.sumnum','');
            $data['typeid'] = I('post.typeid','');
            $data['publisherid'] = I('post.publisherid','');
            $data['frontcover'] = I('post.frontcover','');

            $book = D('Bookinfo');
            $val = $book->update($data);
            if(0 < $val){ //添加成功
                $this->success('修改成功！',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                //$this->error($book->_SQL(),true);
                $this->error($this->showstyleError($val),true);
            }
   

        }else{
        //如果不是POST 请求
            if(!empty($id)){
            
                $book = D('Bookinfo');
                $info = $book->where("status=1 AND id=$id")->find();
                if(!empty($info)){
                    $this->assign('info',$info);
        
                    //获得图书分类 与 版社分类
                    $stylelist = D('Booktype')->getlists();
                    $presslist = D('Publisher')->getlists();
                    $this->assign('stylelist',$stylelist);
                    $this->assign('presslist',$presslist);
                    
                    $this->assign('titleTab','2');
                    $this->assign('pageTab', 'pageTSLB');
                    $this->display('bookedit');  
                }
           
            }
            
        }
    }

    /**
     * [deletebook 删除图书]
     * @return [type] [description]
     */
    public function deletebook(){
        if(IS_POST){
        //如果是POST请求
            $id = I('post.id',0);

            $data = array('id' => $id);

            $book = D('Bookinfo');
            $uid = $book->where($data)->save(array('status' =>0));

            if(0 < $uid){ //更新成功
                $this->success('操作成功',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showBookError($uid),true);
            }
            
        }
    }
/*************************出版社**************************/
    
    /**
     * [bookstype 出版社列表]
     * @return [type] [description]
     */
    public function presslist(){

        /* 查询条件初始化 */
        $map = array();
        $map  = array('status' => 1);

        $list = $this->lists('Publisher', $map,'sort asc,id asc');
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('list', $list);
        //导航标签
        $this->assign('pageTab', 'pageCBS');
        $this->display();
    }

    /**
     * [addstyle 添加出版社]
     * @return [type] [description]
     */
    public function addpress(){
        if(IS_POST){
        //如果是POST请求    
            $pressname = I('post.pressname','');
            $sort = I('post.sort','');

            $book = D('Publisher');
            $uid  = $book->addtype($pressname, $sort);
            if(0 < $uid){ //添加成功
                $this->success('添加成功！',U('Admin/Bookmanage/presslist'),true);
                //$this->success('添加成功！',U('Admin/Bookmanage/addpress'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showstyleError($uid),true);
            }
    
        }else{
        //如果不是POST 请求
        
            $this->assign('titleTab','1');
            $this->assign('pageTab', 'pageCBS');
            $this->display('pressedit');   
        }
    }

    /**
     * [editstyle 编辑出版社]
     * @return [type] [description]
     */
    public function editpress($id = 0){
        if(IS_POST){
        //如果是POST请求 
           $typeid = I('post.typeid','0');
           $pressname = I('post.pressname','');
           $sort = I('post.sort','');
           $book = D('Publisher');
           $val = $book->updatetype($typeid,$pressname,$sort );
           if(0 < $val){ //添加成功
                $this->success('修改成功！',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                //$this->error($book->_SQL(),true);
                $this->error($this->showstyleError($val),true);
            }

        //updatetype$pressname
        }else{
        //如果不是POST 请求
        if(!empty($id)){
            
            $book = D('Publisher');
            $info = $book->where("status=1 AND id=$id")->find();
            if(!empty($info)){
                $this->assign('info',$info);
                $this->assign('titleTab','2');
                $this->assign('pageTab', 'pageCBS');
                $this->display('pressedit');
            }
           
        }
          
        }
    }

    /**
     * [deletestyle 删除出版社信息]
     * @return [type] [description]
     */
    public function deletepress(){
        if(IS_POST){
        //如果是POST请求
            $id = I('post.id',0);

            $data = array('id' => $id);

            $book = D('Publisher');
            $uid = $book->where($data)->save( array('status' =>0));

            if(0 < $uid){ //更新成功
                $this->success('操作成功',Cookie('__forward__'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showstyleError($uid),true);
            }
            
        }
    }


/*************************图书分类**************************/
    /**
     * [bookcheck 图书状态]
     * @return [type] [description]
     */
    public function bookcheck(){
        if(IS_POST){

      }else{
        //更新状态方法()
        D('Borrowinfo')->updatestatus();
        /* 查询条件初始化 */
        $map = array();
        //$map['status'] = array('LT',2);
        //$map['readerid'] = $authIfon['userid'];
        $status = I('get.status',-1);
        if($status !=-1){
            $map['status'] = $status;
        }

        $list = $this->lists('Borrowinfo', $map,'id desc');
        
        $Book = D('Bookinfo');

        for($i = 0; $i < count($list); $i++){
          $data = array();
          $data['id'] = $list[$i]['bookid'];
          $into = $Book ->getvalue($data);
          $list[$i]['bookname'] = $into['bookname'];
          $list[$i]['isbn'] = $into['isbn'];
        }

        $this->assign('list', $list);
        $this->assign('sidebar', 'pageJHSH');
        $this->display();
      }
    }

    /**
     * 获取分类错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showstyleError($code = 0){
        switch ($code) {
            case  0:  $error = '数据未作修改'; break;
            case -1:  $error = '名称长度为不合法！'; break;
            case -3:  $error = '名称被占用！'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }


    /**
     * 获取分类错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showBookError($code = 0){
        switch ($code) {
            case  0:  $error = '数据未作修改'; break;
            case -1:  $error = 'ISBN长度为不合法！'; break;
            case -2:  $error = '长度为不合法！'; break;
            case -3:  $error = '名称被占用！'; break;
            case -4:  $error = '数据项不能我为空！'; break;
            case -5:  $error = 'ISBN码已经存在'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }
}