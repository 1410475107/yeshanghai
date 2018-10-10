<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP学习</title>
</head>
<body>
    <?php
    $arr = array(1, 2, 3, 4);
    // 循环数组
    foreach ($arr as $key => $value) {
        echo $key . ':' . $value;
        // echo "$key:$value";
        echo '<hr>';
    }
    echo $arr[2];
    //如何打印整个数组
    var_dump($arr);

    //多维数组
    $student = [
        ['name' => '张晨松', 'gender' => 1, 'scores' => ['english' => ['g1' => 89, 'g2' => 90], 'math' => 90]],
        ['name' => '吴正鹏', 'gender' => 1],
        ['name' => '沈斌', 'gender' => 1],
        ['gender' => 2, 'name' => '凌敏'],
        ['gender' => 0, 'name' => '胡文文'],
        ['gender' => 3, 'name' => '匿名']
    ];
    echo '<hr>';
    echo $student[3]['name'];
    echo '<hr>';
    echo $student[1]['name'];

    //获取数组的元素个数
    echo count($student);
    ?>
    <hr>
    共有<?php echo count($student); ?>个学生
<table border="1">
    <tr>
        <td>顺序</td>
        <td>姓名</td>
        <td>性别</td>
    </tr>
    <?php
    // ($v['gender'] == 1? '男':($v['gender'] == 2? '女':'保密'))
    $gender = [0 => '保密', 1 => '男', 2 => '女', 3 => '不确定'];
    foreach ($student as $k => $v) {
        echo '<tr>
                <td>' . ($k + 1) . '</td>
                <td>' . $v['name'] . '</td>
                <td>' . $gender[$v['gender']] . '</td>
            </tr>';
    }

    
    ?>
    
</table>
</body>
</html>