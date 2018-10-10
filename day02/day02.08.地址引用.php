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
        //直接复制一份出来
        $a = [1,2,3];
        $b = $a;
        array_pop($b);
        var_dump($b);
        echo '<hr>';
        var_dump($a);

        echo '<hr>';
        //地址引用
        $c = [2,3,4];
        $d = &$c;
        array_pop($d);
        var_dump($c);

        echo '<hr>';
        //地址引用的使用
        $e = [3,4,5];
        foreach ($e as $k => &$v) {
            $v *= 2;
        }
        //销毁变量
        unset($v);
        var_dump($e);




    ?>
</body>
</html>