<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php学习</title>
</head>
<body>
    <?php
        $var = 'name';
        echo $var;

        $name = '李静娴';
        echo $name;


        echo '<hr>';
        // 可变变量  $name
        echo $$var;

        $stu = ['username' => '吴正鹏', 'gender' => 1, 'tel'=>'178993388444'];
        echo $stu['username'];
        echo '<hr>';
        //可变变量的使用
        foreach ($stu as $k1 => $v1) {
            $$k1 = $v1;
        }
        echo $username;
        echo $gender;
        echo $tel;

    ?>
</body>
</html>