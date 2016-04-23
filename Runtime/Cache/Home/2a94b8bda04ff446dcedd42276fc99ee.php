<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo C('WebTitle');?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/css/index.css">
	<script type="text/javascript" src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/js/index.js"></script>
	<!-- 百度地图API -->
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=iBUgAroTOcTe61Z982tEp36i"></script>
</head>
<body>
	<!-- 主页面开始 -->
	<div class="page" id="page-main">
		<!-- 网页头部 -->
		<div class="header">
			<!-- 左上角logo -->
			<a href="javascript:void(0)" class="logo">
				<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/logo.png" alt="logo">
			</a>
			<!-- 右上角菜单 -->
			<div class="menu">
				<a href="<?php echo C('SchoolUrl');?>">学校主页</a>
				<span>|</span>
				<a href="<?php echo U('/PrivateLibrary');?>">我的图书馆</a>
			</div>
		</div>
		<!-- 搜索框 -->
		<div class="search">
			<div class="wrapper-span">
				<span>站内搜索</span>
				<span class="triangle"></span>
			</div>
			<div class="wrapper-input">
				<input type="text" id="keyword" placeholder="请输入搜索关键字">
				<input type="button" value="" id="btn-search">
				<ul id="search-tips">
				</ul>
				<div  id="clear-history">
					<span id="clear-history-btn">清空历史记录</span>
				</div>
			</div>	
		</div>
		<!-- 日历框 -->
		<div class="calendar">
			<a href="javascript:void(0)" class="calendar-icon"><!-- 日历活动 --></a>
			<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/calendarpic.jpg" class="calendar-pic">
			<ul class="calendar-week">
				<li>星期日<span>SUN</span></li>
				<li>星期一<span>MON</span></li>
				<li>星期二<span>TUE</span></li>
				<li>星期三<span>WEN</span></li>
				<li>星期四<span>THU</span></li>
				<li>星期五<span>FRI</span></li>
				<li>星期六<span>SAT</span></li>
			</ul>
			<ul class="calendar-date" id="calendar-date">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<!-- 弹出遮罩层 -->
		<div class="layer" id="layer">
			<div class="news-wrapper">
				<div class="close-wrapper"><span id="close">x</span></div>
				<ul class="item-box" id="newslist">
					<div class="connect">
						建立连接
					</div>
				</ul>
			</div>
		</div>
		<!-- 向下箭头 -->
		<div class="arrow" id="arrow"></div>
		<!-- 页面底部 -->
		<div class="footer">
			Copyright © 2015 大学图书馆 All Rights Reserved.
		</div>
	</div>
	<!-- 主页面结束 -->
	
	<!-- 服务页开始 -->
	<div class="page" id="page-service">
		<!-- 页面标题 -->
		<div class="title-wrapper">
			<h1 class="title"><a href="<?php echo U('server/index');?>"  target="_blank">服务</a></h1>
		</div>
		<!-- 内容容器 -->
		<div class="content-wrapper">
			<!-- 容器左边 -->
			<div class="content-left">
				<!-- 导航按钮 -->
				<ul class="item" id="tab-notice">
					<li class="on-orange"><a href="#">讲座培训</a></li>
					<li><a href="#">投稿指南</a></li>
					<li><a href="#">入馆指南</a></li>
				</ul>
				<div class="content-list-orange" style="max-height:138px;min-height: 138px;">
					<!-- 讲座培训 -->
					<ul class="service-notice listitem">
						<?php if(is_array($jzpx)): $i = 0; $__LIST__ = $jzpx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="dot brown" href="<?php echo U('Server/ShowArticle',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<!-- 投稿指南 -->
					<ul class="service-notice listitem" style="display: none;">
						 <?php if(is_array($tgzn)): $i = 0; $__LIST__ = $tgzn;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Server/ShowArticle',array('id'=>$vo['id']));?>" class="dot brown"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<!-- 入馆指南 -->
					<ul class="service-notice listitem" style="display: none;">
						 <?php if(is_array($rgzn)): $i = 0; $__LIST__ = $rgzn;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Server/ShowArticle',array('id'=>$vo['id']));?>"  class="dot brown"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<!-- 导航按钮 -->
				<ul class="item" id="tab-msg">
					<li class="on-blue"><a href="<?php echo U('Server/ShowArticle',array('id'=>14));?>">学科服务</a></li>
					<li><a href="#">文献传递</a></li>
					<li><a href="<?php echo U('Server/ShowArticle',array('id'=>15));?>">常见问题</a></li>
				</ul>
				<div class="content-list-blue">
					<!-- 学科服务简介 -->
					<div class="service-msg listitem">
						<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/service.jpg">
						<p>中国高校人文社会科学文献中心是全国性的唯一的人文社科外文期刊文献保障体系。CASHL人文社科外文期刊目次数据库收录了11100种国外人文社会科学领域的重要期刊…<a href="<?php echo U('Server/ShowArticle',array('id'=>14));?>" class="details">[详细]</a></p>
					</div>
					<!-- 文献传递简介 -->
					<div class="service-msg listitem" style="display: none;">
						<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/service.jpg">
						<p>暂无资料</p>
					</div>
					<!-- 信息咨询简介 -->
					<div class="service-msg listitem" style="display: none;">
						<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/service.jpg">
						<p>我馆内为广大读者提供方便，这里总结了常见问题，供大家参考
							<a href="<?php echo U('Server/ShowArticle',array('id'=>15));?>" class="details">[详细]</a></p>
					</div>
				</div>
			</div>
			<!-- 容器右边 -->
			<div class="content-right">
				<!-- 导航图标 -->
				<ul class="service-icon">
					<li style="display:none;">
						<a href="<?php echo U('Server/ShowArticle',array('id'=>13));?>" class="icon1 brown">学位论文提交</a>
					</li>
					<li>
						<a href="<?php echo U('Server/ShowArticle',array('id'=>17));?>" class="icon2 brown">VPN服务</a>
					</li>
					<li>
						<a href="<?php echo U('Server/ShowArticle',array('id'=>12));?>" class="icon3 brown">关于自习室</a>
					</li>
					<li>
						<a href="javascript:alert('cheng1483@163.com')" class="icon4 brown">馆长信箱</a>
					</li>
					<li>
						<a href="<?php echo U('Server/ShowArticle',array('id'=>11));?>" class="icon5 brown">失物招领</a>
					</li>
					<li>
						<a href="#" class="icon6 brown">图书检索</a>
					</li>
				</ul>
				<!-- 阅读推荐 -->
				<h3>
					<a href="#" class="recommend">阅读推荐</a>
					<a href="#" class="more">更多&gt;&gt;</a>
				</h3>
				<ul class="book-wrapper">
					<li>
						<a href="#" class="brown"><img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/book1.jpg">红高粱</a>
						<span>莫言作品</span>
					</li>
					<li>
						<a href class="brown"><img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/book2.png">平凡的世界</a>
						<span>路遥作品</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 服务页结束 -->
	
	<!-- 概况页开始 -->
	<div class="page" id="page-survey">
		<!-- 页面标题 -->
		<div class="title-wrapper">
			<h1 class="title"><a href="<?php echo U('/Introduce');?>">概况</a></h1>
		</div>
		<div class="content-wrapper">
			<!-- 左侧内容区 -->
			<div class="content-left">	
				<!-- 导航按钮 -->
				<ul class="item" id="tab-intro">
					<li class="on-orange"><a href="<?php echo U('Introduce/index',array('id'=>18));?>">本馆介绍</a></li>
					<li><a href="<?php echo U('Introduce/index',array('id'=>19));?>">分布图示</a></li>
					<li><a href="<?php echo U('Introduce/index',array('id'=>20));?>">馆舍风貌</a></li>
				</ul>
				<div class="content-list-orange">
					<!-- 本馆简介 -->
					<dl class="library-intro listitem">
						<dt>历史：</dt>
						<dd>我馆是大学工学院图书馆、大学师范学院图书馆合并而成。</dd>
						<dt>面积：</dt>
						<dd>图书馆大楼于1995年建成并使用，总建筑面积21550.6平方米。</dd>
						<dt>借阅：</dt>
						<dd>馆内图书分藏五个库室，均实行开架借阅。馆内有15个阅览室，其中电子阅览室和多媒体阅览室拥有110个阅览座位。另有设在各…<a href="<?php echo U('Introduce/index',array('id'=>18));?>" class="details">[详细]</a></dd>
					</dl>
					<!-- 分布图示 -->
					<ul class="buildings listitem" style="display: none;">
						<li><a href="<?php echo U('Introduce/index',array('id'=>19));?>">主楼</a></li>
						<li><a href="<?php echo U('Introduce/index',array('id'=>19));?>">辅楼</a></li>
					</ul>
					<!-- 馆舍风貌 -->
					<ul class="houseview listitem" style="display: none;">
						<li><a href="<?php echo U('Introduce/index',array('id'=>20));?>">
							<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/mainout.jpg">
							<span class="brown">主楼外部</span>
						</a></li>
						<li><a href="<?php echo U('Introduce/index',array('id'=>20));?>">
							<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/mainin.jpg">
							<span class="brown">主楼内部</span>
						</a></li>
						<li><a href="<?php echo U('Introduce/index',array('id'=>20));?>">
							<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/supout.jpg">
							<span class="brown">辅楼外部</span>
						</a></li>
						<li><a href="<?php echo U('Introduce/index',array('id'=>20));?>">
							<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/supin.jpg">
							<span class="brown">辅楼内部</span>
						</a></li>
					</ul>
				</div>
			</div>
			<!-- 右侧内容区 -->
			<div class="content-right">
				<!-- 导航按钮 -->
				<ul class="item" id="tab-survey">
					<li class="on-blue">
						<a href="#">工作动态</a>
					</li>
					<li>
						<a href="#">部门设置</a>
					</li>
					<li>
						<a href="#">应急预案</a>
					</li>
				</ul>
				<div class="content-list-blue">
					<!-- 工作动态 -->
					<dl class="content-detail listitem" id="workState">
						<dt>
							<a href="#" class="notice-title">图书馆征集“大学人文库”文…</a>
							<p>为了更好地反映大学的教学、科研成果，珍藏、展示和传播我校师生和校友的学术著作，弘扬大学的学术精神，进一步传承大学的历史文化，图书馆将建立"大学人文库"，并开辟"大学人文库"特色馆藏区。为此，特向在校师生…<a href="<?php echo U('Introduce/ShowArticle',array('id'=>21));?>" class="details">[详细]</a></p>
						</dt>
						<?php if(is_array($gzdt)): $i = 0; $__LIST__ = $gzdt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a class="dot" href="<?php echo U('Introduce/ShowArticle',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a><span><?php echo (date('m-d',$vo["createtime"])); ?></span></dd><?php endforeach; endif; else: echo "" ;endif; ?>
					</dl>
					<!-- 部门设置 -->
					<dl class="content-detail listitem" id="departmentSet" style="display: none;">
						<dt>
							<a href="#" class="notice-title">部门设置</a>
							<p>大学图书馆部门设置为一室五部：办公室、采编部、阅览部、流通部、参考咨询部、信息部。 1、 办公室 （电话：87402853） 负责全馆日常事务及管理等。 2、采编部 （电话：87402850） 采编部负责除期刊以…<a href="<?php echo U('Introduce/ShowArticle',array('id'=>23));?>" class="details">[详细]</a></p>
						</dt>
					</dl>
					<!-- 应急预案 -->
					<dl class="content-detail listitem" id="contingencyPlan" style="display: none;">
						<dt>
							<a href="#" class="notice-title">图书馆防控甲型H1N1 流感应急…</a>
							<p>一、总体目标 为做好甲型H1N1 流感防控工作，提高防控水平和应对能力，做到早发现、早报告、早隔离、早治疗，及时有效地采取各项防控措施，防止疫情传播、蔓延，保障广大师生的身体健康和生命安全，特制定本预案。 二、工作原则…<a href="#" class="details">[详细]</a></p>
						</dt>

						<?php if(is_array($yjya)): $i = 0; $__LIST__ = $yjya;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a class="dot" href="<?php echo U('Introduce/ShowArticle',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a><span><?php echo (date('m-d',$vo["createtime"])); ?></span></dd><?php endforeach; endif; else: echo "" ;endif; ?>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<!-- 概况页结束 -->

	<!-- 联系我们页开始 -->
	<div class="page" id="page-contact">
		<!-- 页面标题 -->
		<div class="title-wrapper">
			<h1 class="title"><a href="javascript:void(0)">联系我们</a></h1>
		</div>
		<!-- 内容容器 -->
		<div class="content-wrapper">
			<!-- 左侧内容 -->
			<div class="content-left">
				<!-- 分享到 -->
				<div class="share">
					<span>分享到 : </span>
					<a href="#" class="sina" title="分享到新浪微博"><!-- 新浪微博 --></a>
					<a href="#" class="weixin" title="分享到微信"><!-- 微信 --></a>
					<a href="#" class="qq" title="分享给QQ好友"><!-- QQ好友 --></a>
				</div>
				<div class="time">
					<h5>开馆时间 :</h5>
					<p>图书馆主楼</p>
					<p>周一至周五8:10-21:40 周六、日8:50-21:40</p>
					
				</div>
				<div class="address">
					<p><b>地址：</b><?php echo C('Address');?></p>
					<p><b>电话：</b><?php echo C('Telephone');?></p>
					<p><b>邮政编码：</b><?php echo C('ZipCode');?></p>
				</div>
				<div class="qrcode">
					<div class="box">
						<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/qcode.jpg" alt="">
						<p>微信公众号</p>
					</div>
					<div class="box">
						<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/qcode.jpg" alt="">
						<p>新浪微博</p>
					</div>
				</div>
			</div>
			<!-- 右侧内容(百度地图) -->
			<div class="content-right" id="bdmap">
				<img src="<?php echo C('DOMAIN');?>./Application/Home/View/workshop/images/map.png" width="615" height="468">
			</div>
		</div>
	</div>
	<!-- 联系我们页结束 -->

	<!-- 右侧导航栏开始 -->
	<ul id="sidebar-nav">
		<li id="survice">服务</li>
		<li id="survey">概况</li>
		<li id="contact">联系我们</li>
		<li id="totop">返回顶部</li>
		<!--
		<li id="library">魅力图书馆</li>
		<li id="thinker"  style="display:none;">思想者</li>
		-->
	</ul>
	<!-- 右侧导航栏结束 -->

	<script type="text/javascript">
			// 搜索框对象
		var keyWord = document.getElementById('keyword');
		keyWord.onfocus = function() {
			document.location = "<?php echo U('Server/BookRetrieval');?>";
		}
	</script>
</body>
</html>