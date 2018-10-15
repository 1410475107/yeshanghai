<?php
// 开启session：如果配置环境里面没有auto_start
//如果开启了 auto_start   $_SESSION可以直接使用 
$_SESSION || session_start();

$_SESSION['name'] = '李静娴';

echo 'SESSION123';