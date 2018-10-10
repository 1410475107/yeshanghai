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
    //定义函数的时候，可以设置默认值：设置默认值的形参必须放到最右边
    function add($a, $b=0){
        return $a +$b;
    }

    echo add(3, 4);

?>
</body>
</html>