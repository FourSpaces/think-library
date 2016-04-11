<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 图书馆概况 模块
 */
class IntroduceController extends HomeController {

	protected function _initialize(){
		$this->assign('pagetab','Introduce');
	}


    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	$id = I('get.id',18);
    	$type = I('get.type',0);
    	if(!empty($id)){
    		$keylist = array('18' => 'bgjs','19' => 'fbts','20' => 'gsfm','23' => 'bmsz','9' => 'gzdt','11' => 'yjya' );
    		if($type==1){
    			$article = D('Article');
		    	$data = array();
		    	$data['status'] = 1;

		    	$data['type'] = $id;
		    	$list = $article->where($data)->select();
		    	$this->assign('list',$list);
    			$this->assign('sidebarTab',1);
    		}else{
    			$article = D('Article');
                $info = $article->where("status=1 AND id=$id")->find();
                $info['content'] = htmlspecialchars_decode($info['content']);
                $this->assign('info',$info);
    		}

    		$this->assign('sidebar',$keylist[$id.'']);
    	}

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
}