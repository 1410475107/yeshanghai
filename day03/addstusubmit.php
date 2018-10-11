<?php
require('./common/mysql.php');

// var_dump($_POST);
foreach ($_POST as $key => $value) {
    $$key = $value;
}

$sql = 'INSERT INTO students(sname, snum,  tel, cid, gender) VALUES ("' . $sname . '","' . $snum . '","' . $tel . '", ' . $cid . ', ' . $gender . ')';

$r = $mysql->query($sql);


if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}
