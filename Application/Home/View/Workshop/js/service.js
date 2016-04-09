$(document).ready(function() {
	// 先取得当前高亮菜单选项的下标
	var activeIndex = $('.menu > li').index($('.active'));
	/*鼠标滑过一级菜单事件*/
	$('.menu > li').mouseover(function(event) {
		// 当前菜单选项高亮
		$('.menu > li').removeClass('active');
		$(this).addClass('active');
		// 首页>服务隐藏
		$('.content-wrapper h3').css('visibility', 'hidden');
	});
	/*鼠标滑出一级菜单事件*/
	$('.menu > li').mouseout(function(event) {
		// 取消所有高亮
		$('.menu > li').removeClass('active');
		// 恢复原高亮
		$('.menu > li').eq(activeIndex).addClass('active');
		// 首页>服务显示
		$('.content-wrapper h3').css('visibility', 'visible');
	});
	/*右侧内容折叠展开按钮*/
	$('.fold').click(function(event) {
		if ($(this).html() == '折叠') {
			$(this).parent().next().slideUp('slow');
			$(this).html('展开');
		} else {
			$(this).parent().next().slideDown('slow');
			$(this).html('折叠');
		}
	});

});