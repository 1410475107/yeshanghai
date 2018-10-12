<?php
require('./common/mysql.php');

$sid = $_GET['sid'];

$sql = 'UPDATE students SET status = 0, deltimes="'.date('Y-m-d H:i:s').'" WHERE sid = ' . (int)$sid;

$r = $mysql->query($sql);


if ($r) {
    echo json_encode(['r1'=>'ok']);
} else {
    echo json_encode(['r1'=>'fail']);
}
