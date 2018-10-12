<?php
require('./common/mysql.php');

// var_dump($_POST);
foreach ($_POST as $key => $value) {
    $$key = $value;
}

$sql = 'UPDATE students SET sname = "' . $sname . '", snum = "' . $snum . '",  tel = "' . $tel . '", cid = ' . $cid . ', gender = ' . $gender . ', updatetimes="'.date('Y-m-d H:i:s').'" WHERE sid = ' . (int)$sid;
$r = $mysql->query($sql);

if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}
