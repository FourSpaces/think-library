<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	  <!-- 头部 -->
    <meta charset="UTF-8">
    <title><?php echo C('WebTitle');?></title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--
     <link rel="stylesheet" type="text/css" href="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/lib/bootstrap/css/bootstrap.min.css">
 -->
    <link rel="stylesheet" type="text/css" href="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/css/service.css">
    <link rel="stylesheet" href="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/lib/font-awesome/css/font-awesome.css">

    <script type="text/javascript" src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/js/jquery.js"></script>
    <!--
    <script type="text/javascript" src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/lib/bootstrap/js/bootstrap.min.js"></script>
    -->
    <script type="text/javascript" src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/js/service.js"></script>
    

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
        
        /*分页下的列表*/
       .rows {
            float: left;
            padding: 0 14px;
            line-height: 38px;
            text-decoration: none;
            background-color: #ffffff;
            /* border: 1px solid #dddddd; */
            border-left-width: 0;
        }

        .content-right h2 .noaction {
            height: 48px;
            text-align: center;
            font-size: 22px;
            color: #777;
            background-color: #d5d5d5;
            border-radius: 4px;
            cursor: pointer;
        }
        .content-right h2 .noaction:hover{
            background-color: #365088;
            font-size: 24px;
            color: #fff;

        }
        /*表单*/
        .form-ul li{
            position: relative;
            display: table;
            border-collapse: separate;
        }
        .form-label {
            display: inline-block;
            margin-top: 1px;
            padding-right: 14px;
            width:64px;
            height: 35px;
            font-size: 16px;
            line-height: 35px;
            color: #FFFFFF;
            text-align: right;
            border: 1px solid #ccc;
            border-radius: 4px 0px 0px 4px;
            background: -webkit-linear-gradient(left, #94bcc8 85%, #7ba0b0); /* Safari 5.1 - 6.0 */
            background: -o-linear-gradient(left, #94bcc8 85%, #7ba0b0); /* Opera 11.1 - 12.0 */
            background: -moz-linear-gradient(left,#94bcc8 85%, #7ba0b0); /* Firefox 3.6 - 15 */
            background: linear-gradient(left,#94bcc8 85%, #7ba0b0); /* 标准的语法（必须放在最后） */
        }
        .form-label select{
            width: 72px;
            height: 34px;
            font-size: 14px;
            font-weight: 600;
            line-height: 34px;
            margin-right: -10px;
            margin-top:-5px;
            background: rgba(0,0,0,0);
            border: 0px solid;
            color: #FFFFFF;
            text-align: right;
        }
        .form-label select option{
            text-align: right;
            color: #000000;
        }
        .form-control {
            margin-top: -3px;
            width:240px;
            height: 24px;
            padding: 5px 12px;
            font-size: 16px;
            line-height: 34px;
            color: #555;
            vertical-align: middle;
            background: rgba(217,217,217,0.3);
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 0px 4px 4px 0px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        }
        form  ul li {
            padding: 0;
            margin: 0 0 10px 25px;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 16px;
            font-weight: 600;
            line-height: 1.428571429;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
        .btn-info {
            min-width: 260px;
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
        }
        .btn-info:hover{
            color: #fff;
            background-color: #39b3d7;
            border-color: #269abc;
        }
        .btn-success {
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }
        .btn-success:hover {
            color: #fff;
            background-color: #4cae4c;
            border-color: #5cb85c;
        }
        
        
        .btn-sm, .btn-group-sm>.btn {
            padding: 2px 8px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }

        .content-container .content-left .action {
            color: #fff;
            font-weight: bold;
            background-color: #ff6e01;
            border: 1px solid #C35F14;
        }

        .content-left .action a {
            color: #fff;
            font-weight: bold;
            background-color: #ff6e01;
            background-position: 25px -220px;
        }
        
    </style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
	<block name ="style"></block>
</head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
<body>
  <!--<![endif]-->
	<!-- 导航 -->
	<!-- 顶部导航 -->
    <!-- 行导航栏 start -->
        <!-- header start -->
    <header id="header" class="header">
        <div class="header-container">
            <!-- logo -->
            <div class="logo"></div>
            <!-- 一级导航菜单 -->
            <ul class="menu">

                <li class=<?php if(($pagetab) == "Server"): ?>"active"<?php else: ?>""<?php endif; ?>>
                    <a href="<?php echo U('/Server');?>" class="service">服务</a>
                    <ul class="sub-menu">
                        <li><a href="javascript:void(0)">入馆指南</a></li>
                        <li><a href="javascript:void(0)">投稿指南</a></li>
                        <li><a href="javascript:void(0)">信息咨询</a></li>
                        <li><a href="javascript:void(0)">通知</a></li>
                    </ul>
                </li>
                <li class=<?php if(($pagetab) == "Introduce"): ?>"active"<?php else: ?>""<?php endif; ?>>
                    <a href="<?php echo U('/Introduce');?>" class="survey">概况</a>
                    <ul class="sub-menu">
                        <li><a href="javascript:void(0)">本馆介绍</a></li>
                        <li><a href="javascript:void(0)">分布图示</a></li>
                        <li><a href="javascript:void(0)">馆舍风貌</a></li>
                        <li><a href="javascript:void(0)">工作动态</a></li>
                        <!--
                        <li><a href="javascript:void(0)">部门设置</a></li>
                        <li><a href="javascript:void(0)">应急预案</a></li>
                        -->
                    </ul>
                </li>
                <li class=<?php if(($pagetab) == "PrivateLibrary"): ?>"active"<?php else: ?>""<?php endif; ?>>
                    <a href="<?php echo U('/PrivateLibrary');?>" class="resource">我的图书馆</a>
                    <!-- 二级导航菜单 -->
                    <ul class="sub-menu">
                        <li><a href="javascript:void(0)">登陆/注册</a></li>
                        <li><a href="javascript:void(0)">我的图书馆</a></li>
                        <li><a href="javascript:void(0)">借书/还书</a></li>
                        <li><a href="javascript:void(0)">借阅记录</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <!-- header end -->
    <!-- 行导航栏 end -->
	<!-- /导航 -->

	<!-- 内容 -->
	<!-- content start -->
<div class="content-wrapper">

    
<!--
  <div class="header">
      <h1 class="page-title">图书管理</h1>
  </div>

  <ul class="breadcrumb">
    <li><a href="index.html">首页</a> <span class="divider">/</span></li>
    <li class="active">图书列表</li>
  </ul>
-->
<!-- title -->
    <h3><a href="index.html">首页</a>&nbsp;&gt;&nbsp;<a href="javascript:void(0)">我的图书馆</a></h3>


    <div class="content-container">
        
	 <!-- 左侧侧边栏 -->
        <dl class="content-left">
                <dt>我的图书馆</dt>
    <?php if(($sidebar) == "L&R"): ?><dd class="action"><a href="<?php echo U('User/login');?>"><span>登陆</span>/<span>注册</span></a></dd>
     <dd><a href="<?php echo U('PrivateLibrary/LendBook');?>">借书/还书</a></dd>
     <dd><a href="<?php echo U('PrivateLibrary/BorrowingRecord');?>">借阅记录</a></dd>
    <?php else: ?>
     <dd class=<?php if(($sidebar) == "index"): ?>'action'<?php else: ?>''<?php endif; ?>>
        <a href="<?php echo U('PrivateLibrary/index');?>" >个人中心</a></dd>
     <dd class=<?php if(($sidebar) == "lend&also"): ?>'action'<?php else: ?>''<?php endif; ?>>
        <a href="<?php echo U('PrivateLibrary/LendBook');?>">借书/还书</a></dd>
     <dd class=<?php if(($sidebar) == "Borrowing"): ?>'action'<?php else: ?>''<?php endif; ?>>
        <a href="<?php echo U('PrivateLibrary/BorrowingRecord');?>">借阅记录</a></dd>
     <dd>
        <a href="<?php echo U('user/logout');?>">注销登陆</a></dd><?php endif; ?>
        </dl>
        <!-- 右侧内容区 -->
        <div class="content-right">         
            <h2><a href="">个人中心</a>
                <a id="register_folds" class="noaction" href="<?php echo U('User/changePassword');?>">修改密码</a>
            </h2>
            <div class="well zm-profile-header-main">
                <div class="title-section ellipsis">
                    <span class="name"><?php echo ($authIfon['username']); ?></span>
                </div>

                <div class="body clearfix">

                    <div class="ProfileAvatarEditor">
                        <img class="Avatar Avatar--l" src=""  >
                    </div>

                    <div class="ProfileCard">
                        <!--authIfon -->
                        <div class="item editable-group editing" data-name="location">

                            <i class="icon icon-profile-location"></i>

                            <span class="info-wrap">

                            <span class="location item" title="天津职业技术师范大学">天津职业技术师范大学</span>
                            <span class="business item" title="计算机软件"><a class="topic-link" data-token="19619368" data-topicid="23110">信息技术工程学院</a></span>

                            </span>
                        </div>
                        <div class="item editable-group editing" data-name="location">

                            <i class="icon icon-profile-location"></i>

                            <span class="info-wrap">

                            <span class="location item" title="天津职业技术师范大学">学号</span>
                            <span class="business item" title="计算机软件"><a class="topic-link" data-token="19619368" data-topicid="23110"><?php echo ($authIfon['loginname']); ?></a></span>

                            </span>
                        </div>
                        <div class="item editable-group editing" data-name="location">

                            <i class="icon icon-profile-location"></i>

                            <span class="info-wrap">

                            <span class="location item" title="天津职业技术师范大学">姓名</span>
                            <span class="business item" title="计算机软件"><a class="topic-link" data-token="19619368" data-topicid="23110"><?php echo ($authIfon['username']); ?></a></span>

                            </span>
                        </div>
                        <div class="item editable-group editing" data-name="location">

                            <i class="icon icon-profile-location"></i>

                            <span class="info-wrap">

                            <span class="location item" title="天津职业技术师范大学">邮箱</span>
                            <span class="business item" title="计算机软件"><a class="topic-link" data-token="19619368" data-topicid="23110"><?php echo ($authIfon['email']); ?></a></span>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- footer start -->
    <footer class="footer-container">
        <ul class="footer">
            <li>
                <h4>开馆时间：</h4>
                <p>图书馆主楼</p>
                <p>周一至周五8:10-21:40 周六、日8:50-21:40</p>
            </li>
            <li>
                <div class="msgbox">
                    <h4>联系方式：</h4>
                    <p><span>地 址：</span><?php echo C('Address');?></p>
                    <p><span>电 话：</span><?php echo C('Telephone');?></p>
                    <p><span>邮政编码：</span><?php echo C('ZipCode');?></p>
                </div>
            </li>
            <li>
                <div class="share">
                    <span>分享到 : </span>
                    <a href="#" class="sina" title="分享到新浪微博"><!-- 新浪微博 --></a>
                    <a href="#" class="weixin" title="分享到微信"><!-- 微信 --></a>
                    <a href="#" class="qq" title="分享给QQ好友"><!-- QQ好友 --></a>
                </div>
                <div class="box">
                    <img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/qcode.jpg" alt="">
                    <p>微信公众号</p>
                </div>
                <div class="box">
                    <img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/qcode.jpg" alt="">
                    <p>新浪微博</p>
                </div>
            </li>
        </ul>
    </footer>
    <!-- footer end -->
    <script src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/lib/jquery-1.12.2.min.js" type="text/javascript"></script>
    <script src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/lib/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/js/Validform_v5.3.2_min.js" type="text/javascript"></script>
    
</div>
<!-- content end -->
	<!-- /内容 -->
</body>
</html>