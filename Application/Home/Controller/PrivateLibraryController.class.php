<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 个人图书馆模块
 */
class PrivateLibraryController extends HomeController {

	protected function _initialize(){
		$UID = is_login();
		if($UID == 0){
			$this->redirect('User/login');
		}
		else{
			$authIfon = $this->userauthinfo();
			$this->assign('authIfon', $authIfon);
		}
		$this->assign('pagetab','PrivateLibrary');
	}

	/**
	 * [userauthinfo description]
	 * @return [type] [description]
	 */
	private function userauthinfo(){
		return session('user_auth');
	}

	/**
	 * [index 个人图书馆主页 个人中心]
	 * @return [type] [description]
	 */
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	if(IS_POST){

      }else{
        
        $this->assign('sidebar', 'index');
        $this->display();
      }
    	
    }

    /**
     * [BookRetrieval 图书检索]
     */
    public function BookRetrieval(){
        if(IS_POST){
          //如果是 POST 请求
          $data = array();
          //获得请求参数
          $searchType = I('post.searchType','1');
          $searchContent = I('post.searchContent','');

          //区分类型
          if($searchType == 1){
            $data['bookname'] = array('like','%'.$searchContent.'%');
          } else{
            $data['isbn'] = array('like','%'.$searchContent.'%');
          } 

          $Book = D('Bookinfo');
          $info = $Book->getlists($data);
          //$info = $Book->getbooklists($data);
          
          if($info){
            //获得图书分类 与 版社分类
            $stylelist = D('Booktype')->getlistarray();
            $presslist = D('Publisher')->getlistarray();
            for($i = 0; $i < count($info); $i++){
              $info[$i]['typeid'] = $stylelist[$info[$i]['typeid']];
              $info[$i]['publisherid'] = $presslist[$info[$i]['publisherid']];
              $info[$i]['stock'] = $info[$i]['sumnum'] + $info[$i]['nownum'];
            }
              //echo var_export($info ,true);
              $this->success($info);
          }
          else{
            $this->error("无相关内容");
          }         
        }
    }

    /**
     * [BorrowBook 借出图书]
     */
    public function LendBook(){
      if(IS_POST){
        //获得用户ID
      	$authIfon = $this->userauthinfo();

        //获得请求参数
        $bookid = I('post.bookid',0);
        $Book = D('Borrowinfo');

        //验证图书
        $binto = D('Bookinfo')->updatanum($bookid,false);
        if( 0 > $binto){
           $this->error($this->showUpBookError($binto),true);
        }

        $bid = $Book->addData($authIfon['userid'],$authIfon['typeid'],$bookid);
        if(0 < $bid){ //添加成功
            $this->success('借出成功！正在跳转','',true);
          }else{ //注册失败，显示错误信息
            $this->error($this->showBookError($bid),true);
          }

      }else{
        $this->assign('sidebar', 'lend&also');
        $this->display();
      }
    }


    /**
     * [AlsoBook 归还图书]
     */
    public function AlsoBook(){

      if(IS_POST){
         //获得用户ID
        $authIfon = $this->userauthinfo();

        $map = array();
        //获得请求参数
        //条件函数
        $map['id'] = I('post.alsoid',0);
        $bookid = I('post.bookid',0);
        $map['readerid'] = $authIfon['userid'];

        //验证图书
        $binto = D('Bookinfo')->updatanum($bookid,true);
        if( 0 > $binto){
           $this->error($this->showUpBookError($binto),true);
        }

        $Book = D('Borrowinfo');
        $bid = $Book->alsoBook($map);
       
        if(0 < $bid){ //添加成功
            $this->success('归还成功！','',true);
          }else{ //失败，显示错误信息
            $this->error($this->showBookError($bid),true);
          }
      }else{
        $authIfon = $this->userauthinfo();
        /* 查询条件初始化 */
        $map = array();
        $map['status'] = array('LT',2);
        $map['readerid'] = $authIfon['userid'];

        //更新图书状态
        //更新状态方法（）

        $list = $this->lists('Borrowinfo', $map,'id asc');
        
        $Book = D('Bookinfo');

        for($i = 0; $i < count($list); $i++){
          $data = array();
          $data['id'] = $list[$i]['bookid'];
          $into = $Book ->getvalue($data);
          $list[$i]['bookname'] = $into['bookname'];
          $list[$i]['isbn'] = $into['isbn'];
        }

        $this->assign('list', $list);
        $this->assign('sidebar', 'lend&also');
        $this->display();
      }
    }

    /**
     * [BorrowingRecord 借还记录]
     */
    public function BorrowingRecord(){
      if(IS_POST){

      }else{
        $authIfon = $this->userauthinfo();

        //更新状态方法()
        D('Borrowinfo')->updatestatus();
        /* 查询条件初始化 */
        $map = array();
        //$map['status'] = array('LT',2);
        $map['readerid'] = $authIfon['userid'];

        //更新图书状态
        //更新状态方法（）

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
        $this->assign('sidebar', 'Borrowing');
        $this->display();
      }
    	
    }


    /**
     * 获取分类错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showBookError($code = 0){
        switch ($code) {
            case  0:  $error = '数据未作修改'; break;
            case -1:  $error = '读者id不能为空'; break;
            case -2:  $error = '图书id不能为空'; break;
            case -3:  $error = '管理员id不能为空'; break;
            case -4:  $error = '数据项不能为空！'; break;
            case -5:  $error = ''; break;
            default:  $error = '未知错误';
        }
        return $error;
    }

    private function showUpBookError($code = 0){
        switch ($code) {
            case  0:  $error = '数据未作修改'; break;
            case -10:  $error = '图书不存在'; break;
            case -11:  $error = '馆藏图书数量出错'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }
}