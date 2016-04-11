<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 服务模块
 */
class ServerController extends HomeController {

	protected function _initialize(){
		$this->assign('pagetab','Server');

	}

    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	
    	//获得入馆指南文章
    	// $article = D('Articletype');
    	$article = D('Article');
    	$data = array();
    	$data['status'] = 1;

    	$data['type'] = 4;
    	$rgzn = $article->where($data)->select();

    	$data['type'] = 5;
    	$jzpx = $article->where($data)->select();

    	$data['type'] = 7;
    	$tgzn = $article->where($data)->select();

    	$this->assign('rgzn',$rgzn);
    	$this->assign('jzpx',$jzpx);
    	$this->assign('tgzn',$tgzn);
    	
    	$this->display();
    }

    /**
     * [ShowView 显示文章]
     */
    public function ShowArticle(){
    	$id = I('get.id',0);
            if(!empty($id)){
                //获得文章分类                
                $article = D('Article');
                $info = $article->where("status=1 AND id=$id")->find();
                
                //$info['content'] = strtr($info['content'],'&lt;','<');
                //$info['content'] = urldecode($info['content']);
                $info['content'] = htmlspecialchars_decode($info['content']);
                $this->assign('info',$info);
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
        else{
            $this->display();
        }

    }


}