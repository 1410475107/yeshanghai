<?php
// 开启session：如果配置环境里面没有auto_start
session_start();

$_SESSION['name'] = '李静娴';

echo 'SESSION123';