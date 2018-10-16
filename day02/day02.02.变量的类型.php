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
        $a = 10;
        echo gettype($a);

        echo '<hr>';
        $b = '张计荣';
        echo gettype($b);

        echo '<hr>';

        // 数组类型  枚举数组
        $arr = [1,2,3,4,5];
        echo gettype($arr);
        echo '<hr>';

        $arr1 = array(1,2,3,4,5,6);
        echo gettype($arr1);
        echo '<hr>';

        //可以指定下边，我们称这类数组是关联数组
        $student = ['name'=>'汤平', 'age'=>20, 'height'=>178];
        echo gettype($student);

        // boolean   null




        
        
    ?>

</body>
</html>