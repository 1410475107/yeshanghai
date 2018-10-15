<?php
// 开启session：如果配置环境里面没有auto_start
require('./common/mysql.php');

//检查是否有session 
if(!$_SESSION['aid']){
    //跳转到登录页面  php实现跳转
    header('Location:./login.html');
    exit;
}