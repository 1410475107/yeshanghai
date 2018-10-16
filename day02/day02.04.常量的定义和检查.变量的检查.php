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
        echo '字符串';
        $name = '胡文文';
        echo $name;

        $arr = [1,2,3];
        var_dump($arr);

        //常量的定义
        define('CLASSNAME', 'SHH51807');
        echo CLASSNAME;
        // 检查常量是否声明过
        if(!defined('CLASSNAME')){
            define('CLASSNAME', '123');
            echo CLASSNAME;
        }
        echo '<hr>';
        //检查变量是否声明过
        // unset:销毁变量
        if(isset($c)){
            echo $c;
        }else{
            $c = 0;
            echo $c;
        }

        
        

    ?>
</body>
</html>