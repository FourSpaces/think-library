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
            <li style="display:none;" class=<?php if(($pageTab) == "pageJHSH"): ?>"active"<?php else: ?>""<?php endif; ?>><a href="<?php echo U('Admin/Bookmanage/bookcheck');?>">借还审核</a></li>
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
      <h1 class="page-title">读者管理</h1>
  </div>

  <ul class="breadcrumb">
    <li><a href="">首页</a> <span class="divider">/</span></li>
    <li class="active"><?php if(($titleTab) == "1"): ?>添加<?php else: ?>编辑<?php endif; ?>读者</li>
  </ul>

	
<div class="container-fluid">
  <div class="row-fluid">
      <div class="well">
        <form class="demoform" action="<?php echo U('');?>">
          <input name='userid' type="hidden" value="<?php echo ((isset($info["userid"]) && ($info["userid"] !== ""))?($info["userid"]):''); ?>">
          <ul style="list-style-type: none;">
            <li>
              <label>用户名：</label>
              <input id="input_loginname" name="loginname" type="text" value="<?php echo ((isset($info["loginname"]) && ($info["loginname"] !== ""))?($info["loginname"]):''); ?>" class="input-xlarge" datatype="*9-20" errormsg="" sucmsg="&nbsp;">
              <span class="Validform_checktip"></span>
            </li>
            <li>
              <label>密码：</label>
              <input id="input_loginpwd" name="loginpwd" type="password" value="<?php echo ((isset($info["loginpwd"]) && ($info["loginpwd"] !== ""))?($info["loginpwd"]):''); ?>" class="input-xlarge" datatype="*6-20" errormsg="" sucmsg="&nbsp;">
              <span class="Validform_checktip"></span>
            </li>
            <li>
              <label>姓名：</label>
              <input id="input_username" name="username" type="text" value="<?php echo ((isset($info["username"]) && ($info["username"] !== ""))?($info["username"]):''); ?>" class="input-xlarge" datatype="s2-6" errormsg="姓名至少2个字符,最多6个字符！" sucmsg="&nbsp;">
              <span class="Validform_checktip"></span>
            </li>
            <li>
              <label>用户类型</label>
              
              <select name="typeid" id="input_typeid" class="input-xlarge"  datatype="*" errormsg="请选择读者类型！"  sucmsg="&nbsp;">
                <option value="">----请选择----</option>
                <?php if(!empty($info["typeid"])): if(is_array($stylelist)): $i = 0; $__LIST__ = $stylelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>"  <?php if(($info["typeid"]) == $type["id"]): ?>selected<?php endif; ?>><?php echo ($type["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  <?php else: ?>
                   <?php if(is_array($stylelist)): $i = 0; $__LIST__ = $stylelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>" ><?php echo ($type["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              </select>
              <span class="Validform_checktip"></span>
            </li>
            <li>
              <label>邮箱</label>
              <input id="input_email" name="email"  type="text" value="<?php echo ((isset($info["email"]) && ($info["email"] !== ""))?($info["email"]):''); ?>" class="input-xlarge" datatype="e" errormsg="排序值不能为空" sucmsg="&nbsp;">
              <span class="Validform_checktip"></span>
            </li>
            
            <li>
              <label>状态</label>
              <select name="status" id="input_status" class="input-xlarge"  datatype="*" errormsg="请选择状态！"  sucmsg="&nbsp;">
                <option value="">----请选择----</option>
                <?php if(!empty($info["status"])): ?><option value="1" <?php if(($info["status"]) == "1"): ?>selected<?php endif; ?>>正常</option></case>
                    <option value="2" <?php if(($info["status"]) == "2"): ?>selected<?php endif; ?>>审核中</option></case>

                  <?php else: ?>
                    <option value="1" >正常</option>
                    <option value="2" >审核中</option><?php endif; ?>
              </select>
              <span class="Validform_checktip"></span>
            </li>
            <li>
              <div class="btn-toolbar">
                <button type="submit" class="btn btn-primary"><i class="icon-save"></i>提交</button>
                <a href="" data-toggle="modal" class="btn">返回</a>
                <div class="btn-group"></div>
              </div>
            </li>
          </ul>

        </form>
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

  <script type="text/javascript" src="<?php echo C('DOMAIN');?>./Application/Admin/View/workshop/lib/uploadify/jquery.uploadify.min.js"></script>
  <script>
  $(function() {
    //初始化表单插件
     var validform = $(".demoform").Validform({
          tiptype:function(msg,o,cssctl){
          //msg：提示信息;
          //o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
          //cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
              if(!o.obj.is("form")){
              //验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
                  var objtip=o.obj.siblings(".Validform_checktip");
                  cssctl(objtip,o.type);
                  objtip.text(msg);
              }
          },
          ajaxPost:true,
          callback:function(data){
              
              if(data.status=="1"){
                  //$.Hidemsg()公用方法关闭信息提示框;
                  //显示方法是$.Showmsg("message goes here.");
                  $.Showmsg(data.info+'正在跳转，请稍后!');
                  setTimeout(function(){$.Hidemsg();
                      location.href = data.url;},2000);
              }
              else{
                  //$.Hidemsg()公用方法关闭信息提示框;
                  //显示方法是$.Showmsg("message goes here.");
                $.Showmsg(data.info);
                setTimeout(function(){$.Hidemsg(); },2000);
              }
          }

      });
  });
  </script>

	<!-- /内容 -->
</body>
</html>