<?php
require_once 'adminpass.php';

$yzm =  array (
 'adminpass' => $adminpass, // 后台密码
 'tips' => '弹幕来袭',              // 出场弹幕提示
 array (
   'time' => '6',
   'color' => '#fb7299',
   'text' => '请大家遵守弹幕礼仪',
 ),
 'ok' => '0',         // 接口防窥
 );
?>