<?php
require('./common/admin.php');

// var_dump($_POST);
foreach ($_POST as $key => $value) {
    $$key = $value;
}

$sql = 'UPDATE students SET sname = "' . $sname . '", snum = "' . $snum . '",  tel = "' . $tel . '", cid = ' . $cid . ', gender = ' . $gender . ', updatetimes="'.date('Y-m-d H:i:s').'", head = "' . $head . '", info = "' . addslashes($info) . '", hobby = "' . $hobby . '" WHERE sid = ' . (int)$sid;
// echo $sql;
$r = $mysql->query($sql);

if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}



// UPDATE students SET sname = "汤平", snum = "180703",  tel = "18987898765", cid = 1, gender = 1, updatetimes="2018-10-13 15:03:26", head = "./upload/2018/10/img_5bc1986076a49.jpg", info = "<p><span style="font-weight: bold; font-size: x-large; font-family: 微软雅黑; color: rgb(249, 150, 59);">来自美丽的大草原</span></p><p><img src="./upload/2018/10/img_5bc198714418a.jpg" style="max-width:100%;"><img src="./upload/2018/10/img_5bc198714706a.jpg" style="max-width: 100%;"><img src="./upload/2018/10/img_5bc1987149b63.jpg" style="max-width: 100%;"><br></p>" WHERE sid = 1