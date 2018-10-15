<?php
require './top.php';
//每页显示多少天
$pagenum = 10;

//计算总页数 $totalpage = ($totalnums / $pagenum)
$sql = 'SELECT COUNT(sid) AS totalnums FROM students WHERE status = 1';
$r = $mysql->query($sql);
$row = $r->fetch_array(MYSQLI_ASSOC);
$totalpage = ceil($row['totalnums'] / $pagenum);

//当前是第几页
$page = (isset($_GET['page']) && (int)$_GET['page']  > 0 &&  (int)$_GET['page'] <= $totalpage) ? $_GET['page'] : 1;

$sql = 'SELECT * FROM students WHERE status = 1 LIMIT '.($page - 1)*$pagenum.', ' . $pagenum;
$r = $mysql->query($sql);
$students = $r->fetch_all(MYSQLI_ASSOC);

//上一页  不能小于 1
$prev = $page - 1 < 1 ? 1 : ($page - 1);

//下一页  不能大于 总页数
$next = $page + 1 > $totalpage ? $totalpage : ($page + 1);

//中间页面处理  初始化：开始页数  判断条件：页数小于等于总页数 
$showpage = 5;

$start = $page-($showpage-1)/2;
$end   = $page+($showpage-1)/2;
//开始页数检查
if($start < 1){
    $start = 1;
    $end =  $start  + $showpage - 1;
}
/*
    $end - $start = $showpage – 1
    $start = $page – ($showpage-1)/2
    $end = $page + ($showpage-1)/2
*/
// 结束页数不能大于总页数  $end =  $start  + $showpage - 1
if($end >$totalpage){
    $end = $totalpage;
    $start = $end - $showpage + 1;
    //如果总页数小于$showpage， 开始页数会出现负数的情况
    if($start < 1){
        $start = 1;
    }
}

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

  <div class="layui-box layui-laypage layui-laypage-default">
        <a href="./stulist.php?page=<?=$prev?>" class="layui-laypage-prev" data-page="0">上一页</a>
        <?php
            //显示中间页码
            for ($p=$start; $p <= $end; $p++) { 
                if($p == $page){
                    echo '<span class="layui-laypage-curr">
                            <em class="layui-laypage-em"></em>
                            <em>'.$page.'</em>
                        </span>';
                }else{
                    echo '<a href="./stulist.php?page='.$p.'">'.$p.'</a>';
                }
            }
        ?>
        <a href="./stulist.php?page=<?=$next?>" class="layui-laypage-next">下一页</a>
    </div>

    <table class="layui-table  classlist">
      <colgroup>
        <col width="50">
        <col width="100">
        <col>
      </colgroup>
      <thead>
        <tr>
          <th>ID</th>
          <th>姓名</th>
          <th>头像</th>
          <th>学号</th>
          <th>手机号</th>
          <th>性别</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $gender = [1 => '男', 2 => '女'];
        foreach ($students as $key => $stu) {
          echo '<tr>
              <th>' . $stu['sid'] . '</th>
              <th>' . $stu['sname'] . '</th>
              <th class="header"><img src="' . ($stu['head'] ? $stu['head'] : './img/header.jpg') . '"></th>
              <th>' . $stu['snum'] . '</th>
              <th>' . $stu['tel'] . '</th>
              <th>' . $gender[$stu['gender']] . '</th>
              <th><A href="###" class="delstu" data-sid="' . $stu['sid'] . '">删除</A> | 
              <a href="./updatestu.php?sid=' . $stu['sid'] . '">修改</a>
              </th>

            </tr>';
        }
        ?>
      
      </tbody>
    </table>

  </div>
</div>

<?php require './bottom.php'; ?>

<script>
var laypage = layui.laypage;
  
  //执行一个laypage实例
  laypage.render({
    elem: 'test1' //注意，这里的 test1 是 ID，不用加 # 号
    ,count: 50 //数据总数，从服务端得到
  });
</script>