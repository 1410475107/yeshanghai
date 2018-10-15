<?php
isset($_SESSION) || session_start(); 
//第一步：连接到数据库
$mysql = new mysqli('localhost', 'root', 'root', 'shanghai1807', 3306);
//第二步：设置编码
$mysql->query('SET NAMES UTF8');