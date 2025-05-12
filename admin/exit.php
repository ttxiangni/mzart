<?php
// 清除 zt 和 pass cookies
setcookie("zt", "", time() - 3600, "/");
setcookie("pass", "", time() - 3600, "/");

// 销毁 Session（如果使用了 Session）
if (session_status() == PHP_SESSION_ACTIVE) {
    session_unset();
    session_destroy();
}

// 重定向到登录页面
header("Location: login.php");

// 确保脚本在此处停止执行
exit;
?>