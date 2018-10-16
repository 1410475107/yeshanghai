<?php
require './top.php';
//每页显示多少天
$pagenum = 10;
//查询条件设置
$where = ' WHERE status = 1';
//链接地址要传的值
$urlext = '';
//如果用户输入关键词 去除空格   trim
$cname = '';
if (isset($_GET['cname']) && trim($_GET['cname'])) {
    $cname = trim($_GET['cname']);
    $where .= ' AND cname LIKE "%' . $cname . '%"';
    //地址传值  urlencode：对地址进行编码
    $urlext .= '&cname=' . urlencode($cname);
}

//根据性别查询
$gender = 0;
if (isset($_GET['gender']) && (int)$_GET['gender']) {
    $gender = (int)($_GET['gender']);
    $where .= ' AND gender = ' . $gender;
    $urlext .= '&gender=' . (int)($gender);
}

//计算总页数 $totalpage = ($totalnums / $pagenum)
$sql = 'SELECT COUNT(cid) AS totalnums FROM classlist' . $where;
$r = $mysql->query($sql);
$row = $r->fetch_array(MYSQLI_ASSOC);
$totalpage = ceil($row['totalnums'] / $pagenum);

//当前是第几页
$page = (isset($_GET['page']) && (int)$_GET['page'] > 0 && (int)$_GET['page'] <= $totalpage) ? $_GET['page'] : 1;

$sql = 'SELECT * FROM classlist' . $where . ' LIMIT ' . ($page - 1) * $pagenum . ', ' . $pagenum;

$r = $mysql->query($sql);
$classlist = $r->fetch_all(MYSQLI_ASSOC);

//上一页  不能小于 1
$prev = $page - 1 < 1 ? 1 : ($page - 1);

//下一页  不能大于 总页数
$next = $page + 1 > $totalpage ? $totalpage : ($page + 1);

//中间页面处理  初始化：开始页数  判断条件：页数小于等于总页数 
$showpage = 5;

$start = $page - ($showpage - 1) / 2;
$end = $page + ($showpage - 1) / 2;
//开始页数检查
if ($start < 1) {
    $start = 1;
    $end = $start + $showpage - 1;
}

// 结束页数不能大于总页数  $end =  $start  + $showpage - 1
if ($end > $totalpage) {
    $end = $totalpage;
    $start = $end - $showpage + 1;
    //如果总页数小于$showpage， 开始页数会出现负数的情况
    if ($start < 1) {
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
      <a href="">班级管理</a>
      <a><cite>班级列表</cite></a>
    </span>
    <hr>
    <form action="./classlist.php" class="layui-form" method="get">
    
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label my-label"> 班级名称：</label>
            <div class="layui-input-inline" style="width: 100px;">
                <input type="text" name="cname"  class="layui-input" value="<?= $cname ?>">
            </div>
        </div>
         <button class="layui-btn">查询</button>

        </div>
    </form>
  
  <div class="layui-box layui-laypage layui-laypage-default">
        <a href="./classlist.php?page=<?= $prev . $urlext ?>" class="layui-laypage-prev" data-page="0">上一页</a>
        <?php
            //显示中间页码
        for ($p = $start; $p <= $end; $p++) {
            if ($p == $page) {
                echo '<span class="layui-laypage-curr">
                            <em class="layui-laypage-em"></em>
                            <em>' . $page . '</em>
                        </span>';
            } else {
                echo '<a href="./classlist.php?page=' . $p . $urlext . '">' . $p . '</a>';
            }
        }
        ?>
        <a href="./classlist.php?page=<?= $next . $urlext ?>" class="layui-laypage-next">下一页</a>
    </div>

    <table class="layui-table  classlist">
      <colgroup>
        <col>
      </colgroup>
      <thead>
        <tr>
          <th>ID</th>
          <th>班级名称</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($classlist as $key => $cll) {
            echo '<tr>
              <th>' . $cll['cid'] . '</th>
              <th>' . str_replace($cname, '<span class="H">' . $cname . '</span>', $cll['cname']) . '</th>
              <th><A href="###" class="delcll" data-cid="' . $cll['cid'] . '">删除</A> | 
              <a href="./updatecll.php?cid=' . $cll['cid'] . '">修改</a>
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

</script>