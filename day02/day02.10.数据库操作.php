<?php
// 接收get过来的数据
var_dump($_POST);

//第一步：创建数据库连接
$mysql = new mysqli('localhost', 'root', 'root', 'shanghai1807', 3306);

//第二步：设置编码  UTF 和 8之间没有 -
$mysql->query('SET NAMES UTF8');

//第三步：执行SQL语句
foreach ($_POST as $n => $v) $$n = $v;
$sql = 'INSERT INTO students(sname, tel, gender) VALUES ("'.$sname.'", "'.$tel.'", '.$gender.')';
// $data = $_POST;
// $sql = 'INSERT INTO students(sname, tel, gender) VALUES ("'.$data["sname"].'", "'.$data['tel'].'", '.$data['gender'].')';
$r = $mysql->query($sql);
var_dump($r);

//第四步：关闭数据库连接
$mysql->close();
