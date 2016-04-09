<?php
namespace Admin\Controller;

/**
 * 配置
 */
class ConfigController extends AdminController{

	protected function _initialize(){
		parent::_initialize(); //调用父类的初始化函数
		$this->assign('menuTab', 'dashboard-menu');
	}
	public function index(){
		//导航标签
    	$this->assign('pageTab', 'pageWZPZ');
		$this->display();
	}
}

