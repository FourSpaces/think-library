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

        .table td{
            text-overflow:ellipsis;
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
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>图书管理系统</a>
        <ul id="dashboard-menu" class=<?php if(($menuTab) == "dashboard-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageWZPZ"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Config/index');?>">首页</a></li>
        </ul>

        <a href="#user-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>用户管理<i class="icon-chevron-up"></i></a>
        <ul id="user-menu" class=<?php if(($menuTab) == "user-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageDZGL"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Usermanage/ReadersList');?>">读者管理</a></li>
            <li class=<?php if(($pageTab) == "pageGLYGL"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Usermanage/AdministratorList');?>">管理员管理</a></li>
        </ul>

        <a href="#books-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>图书管理<i class="icon-chevron-up"></i></a>
        <ul id="books-menu" class=<?php if(($menuTab) == "books-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageTSLX"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/bookstyle');?>">图书类型</a></li>
            <li class=<?php if(($pageTab) == "pageCBS"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/presslist');?>">出版社列表</a></li>
            <li class=<?php if(($pageTab) == "pageTSLB"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/booklist');?>">图书列表</a></li>
            <li style="" class=<?php if(($pageTab) == "pageJHSH"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/bookcheck');?>">借还记录</a></li>
        </ul>

        <a href="#rich-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>文章管理<i class="icon-chevron-up"></i></a>
        <ul id="rich-menu" class=<?php if(($menuTab) == "rich-menu"): ?>"nav nav-list collapse in"<?php else: ?>"nav nav-list collapse"<?php endif; ?>>
            <li class=<?php if(($pageTab) == "pageWZFL"): ?>"active"<?php else: ?>""<?php endif; ?>>
                <a href="<?php echo U('Article/ArticleType');?>">文章分类</a></li>
            <li class=<?php if(($pageTab) == "pageWZLB"): ?>"active"<?php else: ?>""<?php endif; ?>>
                <a href="<?php echo U('Article/ArticleList');?>">文章列表</a></li>
        </ul>

       
        <a href="faq.html" class="nav-header" style="display:none;" ><i class="icon-comment"></i>Faq</a>
    </div>
    <!-- 侧边栏导航 end  -->
	<!-- /侧边栏导航 -->

	<!-- 内容 -->
	<div class="content">
    
  <div class="header">
      <h1 class="page-title">借还列表</h1>
  </div>

  <ul class="breadcrumb">
    <li><a href="index.html">首页</a> <span class="divider">/</span></li>
    <li class="active">借还列表</li>
  </ul>

	
<div class="container-fluid">
    <div class="row-fluid">
            

<div class="btn-toolbar">
</div>

              <div class="well">
                  <table class="table">
                      <thead>
                          <tr>
                            <th>图书名字</th>
                            <th>图书IBIN码</th>
                            <th>借出时间</th>
                            <th>违约时间</th>
                            <th>借阅人</th>
                            <th>读者类型</th>
                            <th>状态</th>
                          </tr>
                      </thead>
                      <tbody id ="book-tbdoy">
                        <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><tr>
                              <td style="width: 120px;"><?php echo ($order["bookname"]); ?></td>
                              <td style="width: 140px;"><?php echo ($order["isbn"]); ?></td>
                              <td style="width: 120px;"><?php echo (date('Y-m-d H:i',$order["borrowtime"])); ?></td>            
                              <td style="width: 120px;"><?php echo (date('Y-m-d H:i',$order["endttime"])); ?></td>
                              <td style="width: 120px;"><?php echo (get_user('username',$order["readerid"])); ?></td>
                              <td style="width: 120px;"><?php echo (get_user_type('typeid',$order["readerid"])); ?></td>
                              <td>
                                <?php switch($order["status"]): case "0": ?><b style="color: #FF0000;">已过期</b><?php break;?>
                                  <?php case "1": ?><b style="color: #012AFF;">借阅中</b><?php break;?>
                                  <?php case "2": ?><b style="color: #43FF08;">已还回</b><?php break;?>
                                  <?php case "3": ?><b style="color: #012AFF;">借出审核中</b><?php break;?>
                                  <?php case "4": ?><b style="color: #012AFF;">还回审核中</b><?php break;?>
                                  <?php default: ?>未知状态<?php endswitch;?>
                              </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                      
                          <?php else: ?>
                          <td colspan="6" class="text-center"> aOh! 暂时还没有内容! </td><?php endif; ?>
                      </tbody>
                  </table>
              </div>
              <div class="pagination">
                <?php echo ($_page); ?>
              </div> 
    </div>
</div>

    <footer>
        <hr>
        <p class="pull-right">Collect from </p>
        <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
    </footer>

</div>


<script src="<?php echo C('DOMAIN');?>./Application/Admin/View/workshop/lib/jquery-2.0.2.js" type="text/javascript"></script>
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