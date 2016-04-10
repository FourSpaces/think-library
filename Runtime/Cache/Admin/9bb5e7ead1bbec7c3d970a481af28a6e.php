<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	  <!-- 头部 -->
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <link rel="stylesheet" type="text/css" href="<?php echo C('DOMAIN');?>./Application/Admin/View/workshop/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo C('DOMAIN');?>./Application/Admin/View/workshop/css/theme.css">
    <link rel="stylesheet" href="<?php echo C('DOMAIN');?>./Application/Admin/View/workshop/lib/font-awesome/css/font-awesome.css">
    <!-- Demo page code -->

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
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
  </head>
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
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                   
                    <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">  清空缓存</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo ($authIfon["username"]); ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">我的帐户</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">设置</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php echo U('Admin/publics/logout');?>">注销</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="<?php echo U('Admin/Index/index');?>"><span class="first">图书馆</span> <span class="second">管理系统</span></a>
        </div>
    </div>
    <!-- 行导航栏 end -->
	<!-- /导航 -->
	
	<!-- 侧边栏导航 -->
	<!-- 侧边导航栏 -->

    <!-- 侧边栏导航 start  -->
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class=<?php if(($menuTab) == "dashboard-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageSY"): ?>"active"<?php else: ?>""<?php endif; ?> ><a href="<?php echo U('Admin/Index/index');?>">首页</a></li>
            <li class=<?php if(($pageTab) == "pageWZPZ"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Config/index');?>">网站配置</a></li>
            <li class=<?php if(($pageTab) == "page1"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="users.html">Sample List</a></li>
            <li class=<?php if(($pageTab) == "page1"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="media.html">Media</a></li>
            <li class=<?php if(($pageTab) == "page1"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="calendar.html">Calendar</a></li>
            
        </ul>

        <a href="#user-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>用户管理<i class="icon-chevron-up"></i></a>
        <ul id="user-menu" class=<?php if(($menuTab) == "user-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageDZGL"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Usermanage/ReadersList');?>">读者管理</a></li>
            <li class=<?php if(($pageTab) == "pageGLYGL"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Usermanage/AdministratorList');?>">管理员管理</a></li>
            <li style="display:none;" class=<?php if(($pageTab) == "page1"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="500.html">500 page</a></li>
            <li style="display:none;" class=<?php if(($pageTab) == "page1"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="503.html">503 page</a></li>
        </ul>

        <a href="#books-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>图书管理<span class="label label-info">+3</span></a>
        <ul id="books-menu" class=<?php if(($menuTab) == "books-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageTSLX"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/bookstyle');?>">图书类型</a></li>
            <li class=<?php if(($pageTab) == "pageCBS"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/presslist');?>">出版社列表</a></li>
            <li class=<?php if(($pageTab) == "pageTSLB"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/booklist');?>">图书列表</a></li>
            <li style="display:none;" class=<?php if(($pageTab) == "pageJHSH"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/bookcheck');?>">借还审核</a></li>
        </ul>

        <a href="#rich-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>文章管理</a>
        <ul id="rich-menu" class=<?php if(($menuTab) == "rich-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageWZFL"): ?>"active"<?php else: ?>""<?php endif; ?>>
                <a href="<?php echo U('Article/ArticleType');?>">文章分类</a></li>
            <li class=<?php if(($pageTab) == "pageWZLB"): ?>"active"<?php else: ?>""<?php endif; ?>>
                <a href="<?php echo U('Article/ArticleList');?>">文章列表</a></li>
        </ul>

        <a href="help.html" class="nav-header" ><i class="icon-question-sign"></i>Help</a>
        <a href="faq.html" class="nav-header" style="display:none;" ><i class="icon-comment"></i>Faq</a>
    </div>
    <!-- 侧边栏导航 end  -->
	<!-- /侧边栏导航 -->

	<!-- 内容 -->
	<div class="content">
    
	
	
	<div class="header"> 
            <h1 class="page-title">Edit User</h1>
        </div>
        
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li><a href="users.html">Users</a> <span class="divider">/</span></li>
            <li class="active">User</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid"><br/>
            <!--    
                <div class="btn-toolbar">
                    <button class="btn btn-primary"><i class="icon-save"></i> Save</button>
                    <a href="#myModal" data-toggle="modal" class="btn">Delete</a>
                  <div class="btn-group">
                  </div>
                </div>
            -->
		<div class="well">
		    <ul class="nav nav-tabs">
		      <li class="active"><a href="#home" data-toggle="tab">基本配置</a></li>
		      <li><a href="#profile" data-toggle="tab">概况配置</a></li>
		    </ul>
		    <div id="myTabContent" class="tab-content">
		      <div class="tab-pane active in" id="home">
		          <form id="tab">
		              <label>网站标题：</label>
		              	<input type="text" value="jsmith" class="input-xlarge">
		              
		              <label>网站简介</label>
		             	 <textarea value="Smith" rows="3" class="input-xlarge"></textarea>
		              
		              <label>网站关键字：</label>
		              	<input type="text" value="Smith" class="input-xlarge">

		              <label>网站备案号：</label>
		              	<input type="text" value="John" class="input-xlarge">
		              
		              
		              <label>联系邮箱：</label>
		              	<input type="text" value="jsmith@yourcompany.com" class="input-xlarge">
		              
		              <label>开始时间：</label>
		              	 <textarea value="Smith" rows="3" class="input-xlarge"></textarea>

					  <label>地址：</label>
		              	<input type="text" value="jsmith@yourcompany.com" class="input-xlarge">
					 <label>邮政编码：</label>
		              	<input type="text" value="jsmith@yourcompany.com" class="input-xlarge">
		             <label>微信公众号：</label>
		              	<input type="text" value="jsmith@yourcompany.com" class="input-xlarge">	
		             <label>新浪微博：</label>
		              	<input type="text" value="jsmith@yourcompany.com" class="input-xlarge">
		              <div class="btn-toolbar">
                    	 <button class="btn btn-primary"><i class="icon-save"></i> Save</button>
                    	 <a href="#myModal" data-toggle="modal" class="btn">Delete</a>
		                  <div class="btn-group">
		                  </div>
                	  </div>
		          </form>
		      </div>
		      <div class="tab-pane fade" id="profile">
		          <form id="tab2">
		              <label>本馆介绍</label>
		              <textarea value="Smith" rows="3" class="input-xlarge"></textarea>

		              <label>馆舍风貌</label>
		              <input type="password" class="input-xlarge">
		              <div>
		                  <button class="btn btn-primary">Update</button>
		              </div>
		          </form>
		      </div>
		    </div>

		</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>

                    
            </div>
        </div>


    <footer>
        <hr>
        <p class="pull-right">Collect from </p>
        <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
    </footer>

</div>


<script src="<?php echo C('DOMAIN');?>./Application/Admin/View/workshop/lib/jquery-1.12.2.min.js" type="text/javascript"></script>
<script src="<?php echo C('DOMAIN');?>./Application/Admin/View/workshop/lib/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo C('DOMAIN');?>./Application/Admin/View/workshop/js/Validform_v5.3.2_min.js" type="text/javascript"></script>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function() {
        $('.demo-cancel-click').click(function(){return false;});
    });
</script>

	<!-- /内容 -->
</body>
</html>