/*页面加载完毕执行*/
window.onload = function() {
	/**
	 * 日历框事件组
	 * 1-日历框自动填充日期
	 * 2-弹出层关闭事件
	 * 3-对应日期出现新闻提示
	 * 4-点击出现弹出层，动态获得新闻数据
	 */
	
	/*日历框自动填充日期*/  
	// 日期对象数组
	var calendarDate = document.getElementById('calendar-date').getElementsByTagName('li');

	var today = new Date(); 
	// 年
	var year = today.getFullYear();
	// 月份
	var month = today.getMonth() + 1;
	// 日期
	var date = today.getDate();
	// 星期几
	var day = today.getDay();
	// 当前月份天数
	var monthdays; 

	for (var i = day; i >= 0; i --) {
		calendarDate[i].innerHTML = date --;
	}
	// 重置当前日期
	date = today.getDate();

	if(month == 2) {
		if (year % 400 == 0 || (year % 4 == 0 && year % 100 != 0)) {  //如果是闰年，2月有29天
			monthdays = 29;
		}else {  //反之是平年，2月有28天
			monthdays = 28;
		}
	} else if (month == 4 || month == 6 || month == 9 || month == 11) {
		monthdays = 30;
	} else {  
		monthdays = 31;
	}

	for (var j = day + 1; j <= 6; j ++) {
		calendarDate[j].innerHTML = ++ date;
		// 差超过当前月份天数，置0
		 if (date == monthdays)
		 	date = 0;
	}
	
	// 关闭按钮
	var closeBtn = document.getElementById('close');
	// 弹出层
	var layer = document.getElementById('layer');
	// 新闻数据列表容器
	var itemBox = document.getElementById('newslist');
	// 建立连接框
	var connect = itemBox.getElementsByTagName('div')[0];	

	/*对应日期出现新闻提示*/
	// 创建xhr对象
	var	xhr = new XMLHttpRequest();
	// 当xhr对象的状态变化执行处理
	xhr.onreadystatechange = function() {
		// 如果请求响应结束
		if (xhr.readyState == 4 && xhr.status == 200) {
		
			// 把响应的字符串转化为json对象
			var jsonObj = eval('(' + xhr.responseText + ')');
			// 将返回数据传给数据处理函数
			dataHandle(jsonObj.news);
			
		}
	}
	// 设置请求的方式和url
	xhr.open('POST','virtualserve/news.json');
	// 禁止缓存
	xhr.setRequestHeader("If-Modified-Since","0");
	xhr.setRequestHeader("Cache-Control","no-cache");
	// 发出请求
	xhr.send();

	/**
	 * 工具函数封装
	 * @param  text 子元素文本值
	 * @param  ce   子元素标签样式
	 * @param  cecn 子元素类名
	 * @param  pe   父元素
	 * @return      返回父元素或子元素
	 */
	function packElement (text,ce,cecn,pe) {
		// 创建子元素
		var childElement = document.createElement(ce);
		// 如果类名不为空，设置子元素类名
		if (cecn) {
			childElement.className = cecn;
		}
		// 如果子元素标签为a，设置其href属性
		if (ce == 'a') {
			childElement.setAttribute('href', "javascript:void(0)");
		}
		// 创建父元素
		var parentElement = pe;
		// 将子元素追加到父元素之中
		parentElement.appendChild(childElement);
		// 如果子元素文本不为空，追加到子元素中，并返回父元素，反之返回子元素
		if (text) {			
			var textElement = document.createTextNode(text);
			childElement.appendChild(textElement);
			if (cecn == 'tip-item') {
				parentElement.insertBefore(childElement,searchTips.firstElementChild);
			}
			if (ce == 'p') {
				return childElement;
			}
			return parentElement;
		} else {
			return childElement;
		}
	}

	/*接收返回的数据并动态添加到文档中*/
	function dataHandle (newsList) {
		// 遍历新闻数组
		for (var i = 0; i < newsList.length; i ++) {
			// 如果有新闻
			if (newsList[i].flag) {

				// 新闻的条数
				var count = newsList[i].data.length;

				// 新闻提示信息的父元素
				var spanContainer = document.getElementById('calendar-date').getElementsByTagName('li')[i];

				// 新闻条数添加到对应日期之后
				packElement(count,'span','count',spanContainer);
				// 调用显示新闻事件函数（闭包处理）
				showNews(newsList[i].data, spanContainer);
				
			}
		}
	}

	function showNews(news, newsBtn) {
		newsBtn.onclick = function() {
			// 弹出层显示
			layer.style.display = 'block';
			// 网页不能向下滚动
			flag = false;
			// 模拟网络延迟
			setTimeout(function() {
				// 建立连接隐藏
				connect.style.display = "none";
				// 遍历所有新闻，将其动态添加到弹出层中
				for (var i = 0; i < news.length; i ++) {
					// 新闻数据容器
					var dataContainer = packElement(null,'li','news-item',itemBox);
					// 日期容器
					var dateContainer = packElement(null,'div','item-date',dataContainer);
					// 日
					var day = packElement(news[i].day,'span','day',dateContainer);
					// 年月
					var yearMonth = packElement(news[i].yearMonth,'span','yearmonth',dateContainer);
					// 内容容器
					var contentContainer = packElement(null,'div','item-content',dataContainer);
					// 标题
					var title = packElement(news[i].title,'a','item-title',contentContainer);
					// 简介
					var content = packElement(news[i].content,'p','item-brief',contentContainer);
					// 详细链接
					var detail = packElement('详细','a','details',content);
				} 
			},300)
		}
	}

	/*弹出框关闭事件*/
	closeBtn.onclick = function() {
		// 弹出层隐藏
		layer.style.display = 'none';
		// 建立连接显示
		connect.style.display = 'block';
		// 清除建立连接之后的所有子元素
		for (var i = itemBox.childElementCount; i > 1; i --) {
			itemBox.removeChild(itemBox.lastElementChild);
		}
		// 变量提升，网页可以向下滚动
		flag = true;
	}

	/**
	 * 搜索框事件组
	 * 1-检测搜索框不能为空
	 * 2-搜索框获得焦点显示提示信息
	 * 3-单击其他地方提示信息隐藏
	 * 4-存储新的搜索记录
	 * 5-删除搜索记录
	 * 6-与搜索内容相关的记录优先显示
	 * 7-上下键控制搜索记录高亮
	 * 8-实时将与搜索内容相关的条目提前
	 */
	
	// 搜索框对象
	var keyWord = document.getElementById('keyword');
	// 搜索按钮对象
	var searchBtn = document.getElementById('btn-search');
	// 搜索提示列表
	var searchTips = document.getElementById('search-tips');
	// 清除历史记录
	var clearHistory = document.getElementById('clear-history');
	// 清除历史记录按钮
	var clearHistoryBtn = document.getElementById('clear-history-btn');
	// 列表高亮索引
	var keyIndex = -1;
	// WEB存储列表索引
	var  startIndex;
	var endIndex;
	// 定时器索引
	var timerID;

	// 初始化索引
	if (!localStorage.endIndex) {
		localStorage.endIndex = endIndex = -1;
		localStorage.startIndex = startIndex = 0;
	} else {
		startIndex = localStorage.startIndex;
		endIndex = localStorage.endIndex;
	}

	/*存储搜索记录*/
	function saveRecord() {
		var kwValue = keyWord.value;
		// 检测搜索框是否为空
		if (kwValue == '') {
			alert('搜索内容不能为空！');
			return;
		}

		// 搜索内容与记录里的不同时进行存储
		for (var i = startIndex; i <= endIndex;i ++) {
			
			if (kwValue == localStorage.getItem(i))

			return null;
		}

		localStorage.setItem(++endIndex,kwValue);
		localStorage.setItem('endIndex',endIndex);
		
		// 最多存储3条搜索记录
		if (localStorage.length > 5) {
			localStorage.removeItem(startIndex++);
			localStorage.setItem('startIndex',startIndex);
		}
	}

	/*搜索按钮点击事件*/
	searchBtn.onclick = function() {
		saveRecord();
	}

	/*清除历史记录*/
	clearHistoryBtn.onclick = function() {
		keyIndex = -1;
		localStorage.clear();
		localStorage.endIndex = endIndex = -1;
		localStorage.startIndex = startIndex = 0;
	}

	/*搜索框获得焦点事件*/
	keyWord.onfocus = function() {
		// 如果没有搜索记录，停止向下执行
		if (localStorage.endIndex == '-1') return null;

		// 删除以前的提示
		while (searchTips.childElementCount) {
			searchTips.removeChild(searchTips.lastElementChild);
		}

		// 加载前三条搜索记录
		for (var i = startIndex; i <= endIndex; i ++) {
			packElement(localStorage.getItem(i),'li','tip-item',searchTips);
		}

		// 显示提示列表
		searchTips.style.display = 'block';
		clearHistory.style.display = 'block';

		// 绑定提示信息的单击和鼠标滑过事件
		bindTipItemEvent();

		// 重置高亮索引为-1
		keyIndex = -1;
		// flag设为false，页面不能向下滚动
		flag = false;
		timerID = setInterval(function(){
			if (!advanceTip())
				advanceTip();
		},200);
	}

	/*与搜索内容相关的条目提前*/
	function advanceTip() {

		var str = keyWord.value;
		if (!str) return null; 
		var reg = new RegExp(''+str+'','gi');

		var tipItem = searchTips.getElementsByTagName('li');
		var tipItemLen = tipItem.length;

		for (var i = 0; i < tipItemLen; i ++) {
			if(reg.test(tipItem[i].innerHTML)) {
				searchTips.insertBefore(tipItem[i],searchTips.firstElementChild);
				return true;
			}
		}

	}

	/*阻止事件冒泡*/
	keyWord.onclick = function(event) {
		event.stopPropagation();
	}

	/*隐藏提示列表*/
	function hiddenSearchTips() {
		clearInterval(timerID);
		searchTips.style.display = 'none';
		clearHistory.style.display = 'none';
		flag = true;
	}

	/*单击页面其他地方提示列表隐藏*/
	document.onclick = function() {
		hiddenSearchTips();
	}

	/*绑定提示信息的单击和鼠标滑过事件*/
	function bindTipItemEvent() {

		var tipItem = searchTips.getElementsByTagName('li');
		var tipItemLen = tipItem.length;

		for (var i = 0; i < tipItemLen; i ++) {

			tipItem[i].setAttribute('index', i);

			tipItem[i].onclick = function() {	
				keyWord.value = this.innerHTML;
			}

			tipItem[i].onmouseover = function() {
				keyIndex = this.getAttribute('index');
			}
		}
	}

	/*提示列表高亮*/
	function highlightItem() {

		var tipItem = searchTips.getElementsByTagName('li');
		var tipItemLen = tipItem.length;

		for (var i = 0; i < tipItemLen; i ++) {
			tipItem[i].className = 'tip-item';
		}

		tipItem[keyIndex].className = 'tip-item highlight'; 
	}

	/**
	 * 导航事件组
	 * 1 - 鼠标滚轮事件
	 * 2 - 键盘上下按键事件
	 * 3 - 首页向下箭头点击事件
	 * 4 - 返回顶部按钮点击事件
	 * 5 - 导航栏对应分页点击事件
	 */
	
	// 分页对象
	var pages = document.getElementsByClassName('page');
	// 导航栏对象
	var nav = document.getElementById('sidebar-nav');
	// 导航栏条目
	var navItem = nav.getElementsByTagName('li');
	// 首页向下箭头
	var arrow = document.getElementById('arrow');
	// 右侧导航栏回到顶部按钮
	var toTop = document.getElementById('totop');
	// 分页索引
	var index = 0; 
	// 判断页面是否在滚动的标志
	var flag = true;

	/*监听鼠标滚轮事件*/
	var scrollFun = function(event) {
		// 定义一个参数
		var param;
		// 兼容火狐
		if (event.wheelDelta) {
			// 鼠标向下滚动
			if (event.wheelDelta < 0)
				param = true;
			// 鼠标向上滚动
			else 
				param = false;
		} else {
			if (event.detail > 0)
				param = true;
			else
				param = false;
		}

	
		animate(param); 
	};

	document.onmousewheel = scrollFun;
	// 兼容火狐
	document.addEventListener('DOMMouseScroll', scrollFun, false)

	/*监听上下按键事件*/
	document.onkeydown = function(event) {

		// 回车键
		if (event.keyCode == 13 && !flag) {
			if (keyIndex != -1) {
				keyWord.value = searchTips.getElementsByTagName('li')[keyIndex].innerHTML;
			} else {
				saveRecord();
			}
			hiddenSearchTips();
		}

		// esc键
		if (event.keyCode == 27) {
			hiddenSearchTips();
		}
	
		// 定义一个参数
		var param;

		// 搜索记录长度
		var tipLength = endIndex - startIndex;
		// 上键
		if (event.keyCode == 38) {
			if (flag) {
				param = false;
				animate(param);
			} else {
				keyIndex--;
				if (keyIndex < 0) 
					keyIndex = tipLength;
				highlightItem();
			}
		}
		// 下键
		if (event.keyCode == 40) {
			if (flag) {
				param = true; 
				animate(param);
			} else {
				keyIndex++;
				if (keyIndex > tipLength)
					keyIndex = 0;
				highlightItem(); 
			}
		}
	};

	/*首页向下箭头点击事件*/
	arrow.onclick = function() {
		animate(true);
	}

	/*右侧导航栏返回顶部点击事件*/
	toTop.onclick = function() {
		// 将分页索引重新置为-1
		index = -1;

		animate(false);

		// 右侧导航栏隐藏
		nav.style.display = 'none';
	};

	for (var i = 0; i < navItem.length - 1; i ++) {
		// 为每个导航项目设置自定义属性
		navItem[i].setAttribute('page-index', -i);
		// 导航列表点击事件
		navItem[i].onclick = function() {
			flag = true;
			// 取得当前按钮的自定义属性值
			var pageIndex = this.getAttribute('page-index');
			if (index >= pageIndex) {
				index = pageIndex;
				animate(true);
			} else {
				index = pageIndex - 2;
				animate(false);
			}

		};
	}

	/*页面滚动函数*/
	function animate(param) {
		
		if (flag) {
			// 立即将标志置为false
			flag = false;

			// 在500毫秒后将标志置为true，即滚动后500毫秒之内无法滚动
			setTimeout(function(){
				flag = true;
			},500);
			
			// 参数为真向下滚动，反之向上滚动
			if (param) {
				// 最后一页时停止动画
				if (index == -4) return false;
				// 索引减一
				index --;
			} else if (param === false) {
				// 第一页时停止动画
				if (index == 0) return false;
				// 索引加一
				index ++; 
			}
			// 每个页面滚动对应距离
			for (var i = 0; i < pages.length; i ++) {
				pages[i].style.transform = 'translateY('+ index +'00%)';
			}
		}

		// 如果不是第一页导航栏显示
		if (index) {
			nav.style.display = "block";
			// 分页对应的导航栏条目高亮
			for (var j = 0; j < navItem.length - 1; j ++) {
				navItem[j].className = "";
			}
			navItem[Math.abs(index) - 1].className = "active";
		} else {
			nav.style.display = "none";
		}
	}

	/*各分页鼠标移过选项卡内容切换事件*/
	 
	// 选项卡对象
	function TabObj (tabId, pageId, color) {
		this.tab = document.getElementById(tabId).getElementsByTagName('li');
		this.pageId = pageId;
		this.color = color;
	}

	// 选项卡对象数组
	var tabArray = new Array(
 		//new TabObj('tab-database','page-resource','blue'),
 		new TabObj('tab-notice','page-service','orange'),
 		new TabObj('tab-msg','page-service','blue'),
 		new TabObj('tab-intro','page-survey','orange'),
 		new TabObj('tab-survey','page-survey','blue'));
 		//new TabObj('tab-thinker','page-thinker','blue'));	 	
	
	// 为每个选项卡对象绑定选项卡切换事件
	for (var i = 0; i < tabArray.length; i ++) {
		tabChange.call(tabArray[i]);
	}

	// 选项卡切换函数
	function tabChange() {
		// 根据选项卡对象所在分页和高亮颜色取得内容列表容器
	 	var contentList = document.getElementById(this.pageId).getElementsByClassName('content-list-' + this.color)[0];
	 	// 内容列表对象
	 	var listItem = contentList.getElementsByClassName('listitem');

	 	// 闭包时this指向改变，保存下来
	 	var that = this;

	  	for (var i = 0; i < this.tab.length; i ++) {
	  		// 添加自定义属性值
	  		this.tab[i].setAttribute('data-tid', i);
	  		// 鼠标移上选项卡事件
	  		this.tab[i].onmouseover = function() {
	  			// 将所有选项卡取消高亮样式
	  			for (var j = 0; j < that.tab.length; j ++) {
	  				that.tab[j].className = '';
	  			}
	  			// 当前选项卡高亮
	  			this.className = 'on-' + that.color;
	  			// 取得当前选项卡的自定义属性值
	  			var tid = parseInt(this.getAttribute('data-tid'));
	  			// 将所有内容列表隐藏
	  			for (var k = 0; k < listItem.length; k ++) {
	  				listItem[k].style.display = 'none';
	  			}
	  			// 当前选项卡对应的内容显示
	  			listItem[tid].style.display = 'block';
	  		}
	  	}	
	}

	/*百度地图*/

	// 创建地图实例  
	var map = new BMap.Map("bdmap"); 
	// 创建点坐标  
	var point = new BMap.Point(117.299001,39.06742);
	// 初始化地图，设置中心点坐标和地图级别  
	map.centerAndZoom(point, 19);
	// 设置地图显示的城市 此项是必须设
	map.setCurrentCity("天津");    
	// 添加地图类型控件
	map.addControl(new BMap.MapTypeControl());  
	// 地图平移缩放控件
	map.addControl(new BMap.NavigationControl());  
	// 比例尺控件  
	map.addControl(new BMap.ScaleControl());  
	// 缩略地图控件
	map.addControl(new BMap.OverviewMapControl());
	// 开启鼠标滚轮缩放
	map.enableScrollWheelZoom(true);  
};