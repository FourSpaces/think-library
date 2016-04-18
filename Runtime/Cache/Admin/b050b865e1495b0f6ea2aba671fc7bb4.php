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
      <h1 class="page-title">图书列表</h1>
  </div>

  <ul class="breadcrumb">
    <li><a href="">首页</a> <span class="divider">/</span></li>
    <li class="active"><?php if(($titleTab) == "1"): ?>添加<?php else: ?>编辑<?php endif; ?>图书</li>
  </ul>

	
<div class="container-fluid">
  <div class="row-fluid">
      <div class="well">
        <form class="demoform" action="<?php echo U('');?>">
          <input name='bookid' type="hidden" value="<?php echo ((isset($info["id"]) && ($info["id"] !== ""))?($info["id"]):''); ?>">
          <ul style="list-style-type: none;">
            <li>
              <label>图书ISBN码：</label>
              <input id="input_isbn" name="isbn" type="text" value="<?php echo ((isset($info["isbn"]) && ($info["isbn"] !== ""))?($info["isbn"]):''); ?>" class="input-xlarge" datatype="*9-20" errormsg="" sucmsg="&nbsp;">
              <span class="Validform_checktip"></span>
            </li>
            <li>
              <label>图书名称：</label>
              <input id="input_bookname" name="bookname" type="text" value="<?php echo ((isset($info["bookname"]) && ($info["bookname"] !== ""))?($info["bookname"]):''); ?>" class="input-xlarge" datatype="s2-12" errormsg="分类名称至少2个字符,最多12个字符！" sucmsg="&nbsp;">
              <span class="Validform_checktip"></span>
            </li>
            <li>
              <label>选择分类</label>
              
              <select name="typeid" id="input_typeid" class="input-xlarge"  datatype="*" errormsg="请选择图书的分类！"  sucmsg="&nbsp;">
                <option value="">----请选择----</option>
                <?php if(!empty($info["typeid"])): if(is_array($stylelist)): $i = 0; $__LIST__ = $stylelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>"  <?php if(($info["typeid"]) == $type["id"]): ?>selected<?php endif; ?>><?php echo ($type["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  <?php else: ?>
                   <?php if(is_array($stylelist)): $i = 0; $__LIST__ = $stylelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>" ><?php echo ($type["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              </select>
              <span class="Validform_checktip"></span>
            </li>
            <li>
              <label>选择出版社</label>
              <select name="publisherid" id="input_publisherid"  class="input-xlarge" datatype="*" errormsg="请选择出版社！"  sucmsg="&nbsp;" >
                <option value="">----请选择----</option>
                <?php if(!empty($info["publisherid"])): if(is_array($presslist)): $i = 0; $__LIST__ = $presslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>"  <?php if(($info["publisherid"]) == $type["id"]): ?>selected<?php endif; ?>><?php echo ($type["pressname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  <?php else: ?>
                   <?php if(is_array($presslist)): $i = 0; $__LIST__ = $presslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>" ><?php echo ($type["pressname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              </select>
              <span class="Validform_checktip"></span>
            </li>
            
            <li>
              <label>作者</label>
              <input id="input_author" name="author"  type="text" value="<?php echo ((isset($info["author"]) && ($info["author"] !== ""))?($info["author"]):''); ?>" class="input-xlarge" datatype="s2-12" errormsg="排序值不能为空" sucmsg="&nbsp;">
              <span class="Validform_checktip"></span>
            </li>
            
            <li>
              <label>页数</label>
              <input id="input_page" name="page" type="number" value="<?php echo ((isset($info["page"]) && ($info["page"] !== ""))?($info["page"]):'0'); ?>" class="input-xlarge" datatype="*" errormsg="页数不能为空" sucmsg="&nbsp;">
              <span class="Validform_checktip"></span>
            </li>
            
            <li>
              <label>图书数量</label>
              <input id="input_sumnum" name="sumnum" type="number" value="<?php echo ((isset($info["sumnum"]) && ($info["sumnum"] !== ""))?($info["sumnum"]):'1'); ?>" class="input-xlarge" datatype="*" errormsg="图书数量不能为空" sucmsg="&nbsp;">
              <span class="Validform_checktip"></span>
            </li>

            <li style="display:none;">
              <label>封面</label>
              <input id="input_frontcover" name="frontcover" type="number" value="<?php echo ((isset($info["frontcover"]) && ($info["frontcover"] !== ""))?($info["frontcover"]):'0'); ?>" class="input-xlarge" datatype="*" errormsg="排序值不能为空" sucmsg="&nbsp;">
              <!--
              <input type="file" id="upload_picture">
              <input type="hidden" name="portrait" id="input_frontcover" value="0"/>
              <div class="upload-img-box">
                <?php if(!empty($info['portrait'])): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($info["portrait"],'path')); ?>"/></div><?php endif; ?>
              </div>
              -->
              <span class="Validform_checktip"></span>
            </li>
            <li>
              <div class="btn-toolbar">
                <button type="submit" class="btn btn-primary"><i class="icon-save"></i> 提交</button>
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
    /* 初始化上传插件 */
    $("#upload_picture").uploadify({
          "height"          : 30,
          "swf"             : "<?php echo C('DOMAIN');?>./Application/Admin/View/workshop/lib/uploadify/uploadify.swf",
          "fileObjName"     : "download",
          "buttonText"      : "上传图片",
          "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
          "width"           : 120,
          'removeTimeout'   : 1,
          'fileTypeExts'    : '*.jpg; *.png; *.gif;',
          "onUploadSuccess" : uploadPicture,
          'onFallback' : function() {
              alert('未检测到兼容版本的Flash.');
          }
      });
    function uploadPicture(file, data){
        var data = $.parseJSON(data);
        var src = '';
          if(data.status){
            $("#img").val(data.id);
            src = data.url || '/think-library' + data.path;
            $("#img").parent().find('.upload-img-box').html(
              '<div class="upload-pre-item"><img src="' + src + '"/></div>'
            );
          } else {
            updateAlert(data.info);
            setTimeout(function(){
                  $('#top-alert').find('button').click();
                  $(that).removeClass('disabled').prop('disabled',false);
              },1500);
          }
      }
  </script>

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