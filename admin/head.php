<!DOCTYPE html>
<head>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
	<title>后台管理 - MizhiPlayer觅知弹幕ART播放器系统 </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="/admin/layui/css/layui.css" media="all">
	<script type="text/javascript" src="/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
	<script src="./js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./js/config.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/MizhiPlayerART.js"></script>
    <link rel="stylesheet" href="/admin/css/bootstrap-3.4.1/dist/css/bootstrap.min.css">
<!-- 修改后的导航条部分 -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">MizhiPlayer 觅知ART弹幕播放器后台管理中心 - www.98dou.cn</a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li <?php if (get_current_file_name() == 'index.php') echo 'class="active"'; ?>><a href="index.php"><span class="glyphicon glyphicon-list-alt"></span>网站信息</a></li>
                <li <?php if (get_current_file_name() == 'update.php') echo 'class="active"'; ?>><a href="https://www.98dou.cn/4973.html" target="_blank"><span class="glyphicon glyphicon-refresh"></span>更新播放器</a></li>
                <li <?php if (get_current_file_name() == 'blog.php') echo 'class="active"'; ?>><a href="https://www.98dou.cn/" target="_blank"><span class="glyphicon glyphicon-globe"></span>觅知博客</a></li>
                <li <?php if (get_current_file_name() == 'exit.php') echo 'class="active"'; ?>><a id="logoutLink" href="javascript:;"><span class="glyphicon glyphicon-off"></span>安全退出</a></li>
            </ul>
        </div>
    </div>
</nav>
</head>
<script>
layui.use(['layer'], function(){
  var layer = layui.layer;

  // 为安全退出链接绑定点击事件
  document.getElementById('logoutLink').addEventListener('click', function(e) {
    e.preventDefault();  // 阻止默认行为
    layer.confirm('您确定要退出登录吗？', {icon: 7, title:'提示'}, function(index){
      // 当用户点击确认后执行的操作
      window.location.href = 'exit.php';  // 跳转到退出页面
      layer.close(index);  // 关闭确认框
    });
  });
});
</script>
<?php
// 辅助函数，用于获取当前文件名
function get_current_file_name() {
    return basename(__FILE__);
}
?>
