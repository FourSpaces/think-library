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
            <li class=<?php if(($pageTab) == "page1"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="500.html">500 page</a></li>
            <li class=<?php if(($pageTab) == "page1"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="503.html">503 page</a></li>
        </ul>

        <a href="#books-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>图书管理<span class="label label-info">+3</span></a>
        <ul id="books-menu" class=<?php if(($menuTab) == "books-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageTSLX"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/bookstyle');?>">图书类型</a></li>
            <li class=<?php if(($pageTab) == "pageCBS"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/presslist');?>">出版社列表</a></li>
            <li class=<?php if(($pageTab) == "pageTSLB"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/booklist');?>">图书列表</a></li>
            <li class=<?php if(($pageTab) == "pageJHSH"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/bookcheck');?>">借还审核</a></li>
        </ul>

        <a href="#rich-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>文章管理</a>
        <ul id="rich-menu" class=<?php if(($menuTab) == "rich-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageWZ"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="privacy-policy.html">文章</a></li>
            <li class=<?php if(($pageTab) == "pageTZ"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="terms-and-conditions.html">通知</a></li>
        </ul>

        <a href="help.html" class="nav-header" ><i class="icon-question-sign"></i>Help</a>
        <a href="faq.html" class="nav-header" ><i class="icon-comment"></i>Faq</a>
    </div>
    <!-- 侧边栏导航 end  -->
	<!-- /侧边栏导航 -->

	<!-- 内容 -->
	<div class="content">
    
	

<div class="header">
    <div class="stats">
        <p class="stat"><span class="number">53</span>tickets</p>
        <p class="stat"><span class="number">27</span>tasks</p>
        <p class="stat"><span class="number">15</span>waiting</p>
    </div>

    <h1 class="page-title">Dashboard</h1>
</div>

<ul class="breadcrumb">
  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
  <li class="active">Dashboard</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
            

    <div class="row-fluid">

        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Just a quick note:</strong> Hope you like the theme!
        </div>

        <div class="block">
            <a href="#page-stats" class="block-heading" data-toggle="collapse">Latest Stats</a>
            <div id="page-stats" class="block-body collapse in">

                <div class="stat-widget-container">
                    <div class="stat-widget">
                        <div class="stat-button">
                            <p class="title">2,500</p>
                            <p class="detail">Accounts</p>
                        </div>
                    </div>

                    <div class="stat-widget">
                        <div class="stat-button">
                            <p class="title">3,299</p>
                            <p class="detail">Subscribers</p>
                        </div>
                    </div>

                    <div class="stat-widget">
                        <div class="stat-button">
                            <p class="title">$1,500</p>
                            <p class="detail">Pending</p>
                        </div>
                    </div>

                    <div class="stat-widget">
                        <div class="stat-button">
                            <p class="title">$12,675</p>
                            <p class="detail">Completed</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="block span6">
            <a href="#tablewidget" class="block-heading" data-toggle="collapse">Users<span class="label label-warning">+10</span></a>
            <div id="tablewidget" class="block-body collapse in">
                <table class="table">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Username</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Mark</td>
                      <td>Tompson</td>
                      <td>the_mark7</td>
                    </tr>
                    <tr>
                      <td>Ashley</td>
                      <td>Jacobs</td>
                      <td>ash11927</td>
                    </tr>
                    <tr>
                      <td>Audrey</td>
                      <td>Ann</td>
                      <td>audann84</td>
                    </tr>
                    <tr>
                      <td>John</td>
                      <td>Robinson</td>
                      <td>jr5527</td>
                    </tr>
                    <tr>
                      <td>Aaron</td>
                      <td>Butler</td>
                      <td>aaron_butler</td>
                    </tr>
                    <tr>
                      <td>Chris</td>
                      <td>Albert</td>
                      <td>cab79</td>
                    </tr>
                  </tbody>
                </table>
                <p><a href="users.html">More...</a></p>
            </div>
        </div>
        <div class="block span6">
            <a href="#widget1container" class="block-heading" data-toggle="collapse">Collapsible </a>
            <div id="widget1container" class="block-body collapse in">
                <h2>Here's a Tip</h2>
                <p>This template was developed with <a href="http://middlemanapp.com/" target="_blank">Middleman</a> and includes .erb layouts and views.</p>
                <p>All of the views you see here (sign in, sign up, users, etc) are already split up so you don't have to waste your time doing it yourself!</p>
                <p>The layout.erb file includes the header, footer, and side navigation and all of the views are broken out into their own files.</p>
                <p>If you aren't using Ruby, there is also a set of plain HTML files for each page, just like you would expect.</p>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="block span6">
            <div class="block-heading">
                <span class="block-icon pull-right">
                    <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
                </span>

                <a href="#widget2container" data-toggle="collapse">History</a>
            </div>
            <div id="widget2container" class="block-body collapse in">
                <table class="table list">
                  <tbody>
                      <tr>
                          <td>
                              <p><i class="icon-user"></i> Mark Otto</p>
                          </td>
                          <td>
                              <p>Amount: $1,247</p>
                          </td>
                          <td>
                              <p>Date: 7/19/2012</p>
                              <a href="#">View Transaction</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <p><i class="icon-user"></i> Audrey Ann</p>
                          </td>
                          <td>
                              <p>Amount: $2,793</p>
                          </td>
                          <td>
                              <p>Date: 7/12/2012</p>
                              <a href="#">View Transaction</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <p><i class="icon-user"></i> Mark Tompson</p>
                          </td>
                          <td>
                              <p>Amount: $2,349</p>
                          </td>
                          <td>
                              <p>Date: 3/10/2012</p>
                              <a href="#">View Transaction</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <p><i class="icon-user"></i> Ashley Jacobs</p>
                          </td>
                          <td>
                              <p>Amount: $1,192</p>
                          </td>
                          <td>
                              <p>Date: 1/19/2012</p>
                              <a href="#">View Transaction</a>
                          </td>
                      </tr>
                        
                  </tbody>
                </table>
            </div>
        </div>
        <div class="block span6">
            <p class="block-heading">Not Collapsible</p>
            <div class="block-body">
                <h2>Built with Less</h2>
                <p>The CSS is built with Less. There is a compiled version included if you prefer plain CSS.</p>
                <p>Fava bean jícama seakale beetroot courgette shallot amaranth pea garbanzo carrot radicchio peanut leek pea sprouts arugula brussels sprout green bean. Spring onion broccoli chicory shallot winter purslane pumpkin gumbo cabbage squash beet greens lettuce celery. Gram zucchini swiss chard mustard burdock radish brussels sprout groundnut. Asparagus horseradish beet greens broccoli brussels.</p>
                <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
            </div>
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