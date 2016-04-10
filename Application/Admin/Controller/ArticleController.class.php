<?php
namespace Admin\Controller;


/**
 * 文章控制器
 */
class ArticleController extends AdminController {

	protected function _initialize(){
		parent::_initialize(); //调用父类的初始化函数
		$this->assign('menuTab', 'rich-menu');
	}


    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	//导航标签
    	$this->assign('pageTab', 'pageSY');
    	$this->display();
    }

    /**
     * [ArticleType 文章类型]
     */
    public function ArticleType(){
        if(IS_POST){

        }else{
            //获得文章初级类型
            $data = array();
            $data['parentid'] = 0;
            $data['type'] = 0;

            $list = D('Articletype')->getlists($data);

            //添加二级元素
            for($i = 0; $i<count($list);$i++){
                $data['parentid'] = $list[$i]['id'];
                $data['type'] = 1;
                $list[$i]['list'] = D('Articletype')->getlists($data);
            }

            $this->assign('list',$list);
            $this->assign('pageTab', 'pageWZFL');
            $this->display();
        }
    }

    public function AddType(){
        if(IS_POST){
            //如果是POST请求    
            $parentid = I('post.parentid','');
            $name = I('post.name','');

            $article = D('Articletype');
            $uid  = $article->addtype($parentid, $name);
            if(0 < $uid){ //添加成功
                $this->success('添加成功！',U('Admin/Article/ArticleType'),true);
                //$this->success('添加成功！',U('Admin/Bookmanage/addstyle'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showstyleError($uid),true);
            }
        }else{
            $parentid = I('get.id',0);
            $info = array('parentid' =>$parentid);
            $this->assign('info',$info);
            $this->assign('titleTab','1');
            $this->assign('pageTab', 'pageWZFL');
            $this->display('TypeEdit');
        }
    }

    public function EditType(){
        if(IS_POST){
            //如果是POST请求    
            $id = I('post.id','');
            $parentid = I('post.parentid','');
            $name = I('post.name','');

            $article = D('Articletype');
            $uid  = $article->updatetype($id,$parentid, $name);
            if(0 < $uid){ //添加成功
                $this->success('修改成功！',U('Admin/Article/ArticleType'),true);
                //$this->success('添加成功！',U('Admin/Bookmanage/addstyle'),true);
            } else { //注册失败，显示错误信息
                $this->error($this->showstyleError($uid),true);
            }
        }else{

            $id = I('get.id',0);
            if(!empty($id)){
            
            $article = D('Articletype');
            $info = $article->where("status=1 AND id=$id")->find();
            if(!empty($info)){
                $this->assign('info',$info);
                $this->assign('titleTab','2');
                $this->assign('pageTab', 'pageWZFL');
                $this->display('TypeEdit');
            }
           
        }
        }
    }

    /**
     * [deletestyle 删除文章类型]
     * @return [type] [description]
     */
    public function DeletType(){
        if(IS_POST){
        //如果是POST请求
            $id = I('post.id',0);

            $data = array('id' => $id);
            //查询是否有子层
            $article = D('Articletype');
            $info = $article->where(array('parentid' => $id))->select();
            if(empty($info)){
                $uid = $article->where($data)->save(array('status' =>0));

                if(0 < $uid){ //操作成功
                    $this->success('操作成功',U('Admin/Article/ArticleType'),true);
                } else {     //操作失败，显示错误信息
                    $this->error($this->showstyleError($uid),true);
                } 
            }else{
                $this->error('请先删除 当前分类下的 子分类',true);
            }

            
        }
    }

    /**
     * [ArticleList 文章列表]
     */
    public function ArticleList(){
        if(IS_POST){

        }else{
            $this->assign('pageTab', 'pageWZLB');
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
            case -3:  $error = '字段不能为空！'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }

}