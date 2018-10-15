<?php
    //接收上传上来的文件：$_FILES
    // var_dump($_FILES["images"]);
    $imglist = ["errno"=>0,"data"=>[]];
    foreach ($_FILES["images"]["tmp_name"] as $k => $tmp) {
        $file = explode('.', $_FILES['images']['name'][$k]);
        $ext = array_pop($file);
        $filename = './upload/'.date('Y/m').'/' . uniqid('img_') . '.' . $ext;
        move_uploaded_file($tmp, $filename);
        //把图片地址追加到数组里面去
        array_push($imglist['data'], $filename);
    }
   

    // {
    //     "errno": 0,
    //     "data": [
    //         "图片1地址",
    //         "图片2地址",
    //         "……"
    //     ]
    // }


    echo json_encode($imglist);

