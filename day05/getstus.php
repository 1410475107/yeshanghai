<?php
require './common/mysql.php';
$sql = 'SELECT sid, sname FROM students WHERE status = 1';
$r = $mysql->query($sql);
$students = $r->fetch_all(MYSQLI_ASSOC);

echo json_encode($students);
?>
