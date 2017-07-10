layui.config({
base: rooturl+'Public/static/js/'
}).use(['layer','laypage'], function() {
	laypage = layui.laypage;
	laypage({
	cont: 'page',
	pages: pages,
	groups: 5,
	skip: true, //是否开启跳页
	curr: curr,
	jump: function(obj, first) {
		var curr = obj.curr;
		if(!first) {
			window.location.href = listurl+"?requestPage="+curr;
		}
	}
});
});