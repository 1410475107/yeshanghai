<?php
require './top.php';
$sql = 'SELECT * FROM students WHERE status = 1';
$r = $mysql->query($sql);
$students = $r->fetch_all(MYSQLI_ASSOC);
?>

<div class="layui-body">
  <!-- 内容主体区域 -->
  <div style="padding: 15px;">
    <span class="layui-breadcrumb">
      <a href="">首页</a>
      <a href="">教务系统</a>
      <a href="">学生管理</a>
      <a><cite>学生列表</cite></a>
    </span>
    <hr>
    <table class="layui-table  classlist">
      <colgroup>
        <col width="150">
        <col width="200">
        <col>
      </colgroup>
      <thead>
        <tr>
          <th>ID</th>
          <th>姓名</th>
          <th>学号</th>
          <th>手机号</th>
          <th>性别</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $gender = [1=>'男', 2=>'女'];
          foreach ($students as $key => $stu) {
            echo '<tr>
              <th>'.$stu['sid'].'</th>
              <th>'.$stu['sname'].'</th>
              <th>'.$stu['snum'].'</th>
              <th>'.$stu['tel'].'</th>
              <th>'.$gender[$stu['gender']].'</th>
              <th><A href="###" class="delstu" data-sid="'.$stu['sid'].'">删除</A> | 
              <a href="./updatestu.php?sid='.$stu['sid'].'">修改</a>
              </th>

            </tr>';
          }
        ?>
      
      </tbody>
    </table>

  </div>
</div>

<?php require './bottom.php'; ?>