<?php
return array(
	//'配置项'=>'配置值'
    
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        /*'__STATIC__' => __ROOT__ . '/Public/static',*/
        /*'__ADDONS__' => __ROOT__ . APP_PATH . MODULE_NAME . '/Addons',*/
        '__IMG__'    =>  MODULE_PATH .'View/workshop' . '/images',
        '__CSS__'    =>  MODULE_PATH .'View/workshop' . '/css',
        '__JS__'     =>  MODULE_PATH .'View/workshop' . '/js',
        '__LIB__'    =>  MODULE_PATH .'View/workshop' . '/lib',
        /*'__VIDEO__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/video',*/
    ),

    /*网站域名*/
    'DOMAIN' => __ROOT__ ,

    //'配置项'=>'配置值'
    'DATA_AUTH_KEY' => '_08ay$s@E|nDK{o6QYLf~21qGJvCw<5PI9k.p4iU', //默认数据加密KEY

    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    'USER_ADMINISTRATOR' => 1, //管理员用户ID
    /* SESSION 和 COOKIE 配置 */
    'SESSION_PREFIX'     => 'Library_admin', //session前缀
    'COOKIE_PREFIX'      => 'Library_admin_', // Cookie前缀 避免冲突
    'VAR_SESSION_ID'     => 'session_id',   //修复uploadify插件无法传递session_id的bug
    'SESSION_OPTIONS'    =>  array(
        'expire'         =>  1800,                      //SESSION保存15天
         ),
);

//define('UC_AUTH_KEY', ''); //加密KEY