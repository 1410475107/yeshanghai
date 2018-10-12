<?php
require('./common/mysql.php');
// var_dump($_POST);
foreach ($_POST as $key => $value) $$key = $value;

$sql = 'INSERT INTO students(sname, snum,  tel, cid, gender, addtimes, pid) VALUES ("' . $sname . '","' . $snum . '","' . $tel . '", ' . $cid . ', ' . $gender . ', "'.date('Y-m-d H:i:s', time()).'", ' . $pid . ')';
//$sid && ($sql = 'UPDATE students SET sname = "' . $sname . '", snum = "' . $snum . '",  tel = "' . $tel . '", cid = ' . $cid . ', gender = ' . $gender . ' WHERE sid = ' . (int)$sid);
$r = $mysql->query($sql);

if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}
