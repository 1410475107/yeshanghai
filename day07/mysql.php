<?php
    require './class/DB.class.php';
    $dbconfig = [
        'host'=>'localhost',
        'username'=>'root',
        'passwd'=>'root',
        'database'=>'shanghai1807',
        'port'=>3306
    ];
    $mydb = new DB($dbconfig);
 
    $sql = 'INSERT INTO province(pname) VALUES ("北京")';
    //执行SQL语句
    $r = $mydb->dblink->query($sql);
    var_dump($r);

    //调用封装好的方法实现插入数据操作
    $data = ['pid'=>40, 'cityname'=>'苏州'];
    $r = $mydb->insertData('city', $data);
    var_dump($r);
    echo '<hr>';
    //删除操作
    $r = $mydb->delData('city', 'cityid=8');
    var_dump($r);


    //修改数据
    $data = ['pid'=>99, 'cityname'=>'佛山'];
    $r = $mydb->updateData('city',  $data, 'cityid=9');
    var_dump($r);

