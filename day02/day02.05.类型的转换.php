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
    //把字符串转成数字
    $str = '123';
    echo gettype((int)$str);
    echo gettype(intval($str));

    echo '<hr>';
    $str1 = '123abc';
    echo (int)$str1;
    echo gettype((int)$str1);


    echo '<hr>';
    $str2 = 'abc123';
    echo (int)$str2;
    echo gettype((int)$str2);


    //把数字转成字符串
    echo '<hr>';
    $num = 100;
    echo gettype((string)$num);

    //字符串转成数组  array explode ( string $delimiter , string $string [, int $limit ] )
    // 大胆猜测  小心求证
    $str = '1,2,3,4,5,6';
    $a1 = explode(',', $str, 4);
    var_dump($a1);

    echo '<hr>';
    //把数组转成字符串 string implode ( array $pieces )
    $a2 = ['s1', 's2', 's3'];
    echo implode('|', $a2);
    echo implode(',', $a2);


    echo '<hr>';
    $str3 = '你们好';
    //处理中文的
    echo mb_substr($str3, 2, 1);
    echo '<hr>';
    //获取字符串长度
    echo strlen($str3);
    echo '<hr>';
    //获取中文字符串长度
    echo mb_strlen($str3);

    







    ?>
</body>
</html>