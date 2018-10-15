<?php
//进行数据库的操作：查询操作
require('./common/mysql.php');

//第三步：执行SQL语句
$sql = '
        SELECT s.sid, s.sname, s.gender, s.snum, c.cname, p.pname FROM students AS s 
        LEFT JOIN classlist AS c ON s.cid = c.cid 
        LEFT JOIN province AS p ON s.pid = p.pid 
        WHERE 1
        ';
$result = $mysql->query($sql);
// var_dump($result);
    /*
    MYSQLI_ASSOC:返回关联数组
    MYSQLI_NUM：返回的枚举数组
    MYSQLI_BOTH：两个都返回
 */
//适合获取一条记录
// $row = $result->fetch_array(MYSQLI_ASSOC);
// var_dump($row);
// 获取全部记录
$students = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>数据的查询</title>
</head>
<body>
    <table border="1">
        <thead>
        <tr>
            <td>ID</td>
            <td>姓名</td>
            <td>学号</td>
            <td>性别</td>
            <td>班级</td>
            <td>省</td>
        </tr>
        </thead>
        <tbody>
        <?php
            $gender = [1=>'男', 2=>'女'];
            foreach ($students as $k => $value) {
                echo '<tr>
                <td>'.$value["sid"].'</td>
                <td>'.$value["sname"].'</td>
                <td>'.$value["snum"].'</td>
                <td>'.$gender[$value["gender"]].'</td>
                <td>'.$value["cname"].'</td>
                <td>'.$value["pname"].'</td>

            </tr>';
            }
        ?>
        
        </tbody>
    </table>
</body>
</html>