<?php
    //接收上传上来的文件：$_FILES
    var_dump($_FILES);
    // 把文件从临时目录移动到目标位置  time() . '_' . rand(10000, 99999)
    $file = explode('.', $_FILES['myheader']['name']);
    $ext = array_pop($file);
    $filename = './upload/'.date('Y/m').'/' . uniqid('img_') . '.' . $ext;

    move_uploaded_file($_FILES['myheader']['tmp_name'], $filename);

