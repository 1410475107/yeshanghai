<?php
    require('./common/mysql.php');
    $sql = 'SELECT cid, cname FROM classlist WHERE status = 1';
    $r = $mysql->query($sql);
    $classlist = $r->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加学生信息</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./css/my.css">
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">layui 后台布局</div>
            <!-- 头部区域（可配合layui已有的水平导航） -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item"><a href="">控制台</a></li>
                <li class="layui-nav-item"><a href="">商品管理</a></li>
                <li class="layui-nav-item"><a href="">用户</a></li>
                <li class="layui-nav-item">
                    <a href="javascript:;">其它系统</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">邮件管理</a></dd>
                        <dd><a href="">消息管理</a></dd>
                        <dd><a href="">授权管理</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                        贤心
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="">基本资料</a></dd>
                        <dd><a href="">安全设置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">退了</a></li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="test">
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">所有商品</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;">列表一</a></dd>
                            <dd><a href="javascript:;">列表二</a></dd>
                            <dd><a href="javascript:;">列表三</a></dd>
                            <dd><a href="">超链接</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">解决方案</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;">列表一</a></dd>
                            <dd><a href="javascript:;">列表二</a></dd>
                            <dd><a href="">超链接</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item"><a href="">云市场</a></li>
                    <li class="layui-nav-item"><a href="">发布商品</a></li>
                </ul>
            </div>
        </div>

        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">
                <span class="layui-breadcrumb">
                    <a href="">首页</a>
                    <a href="">教务系统</a>
                    <a href="">学生管理</a>
                    <a><cite>添加学生</cite></a>
                </span>
                <hr>
                <form class="layui-form" action="./addstusubmit.php" method="POST">
                    <div class="layui-form-item">
                        <label class="layui-form-label">姓名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="sname" placeholder="请输入姓名" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">*必填</div>
                    </div>


                    <div class="layui-form-item">
                        <label class="layui-form-label">学号</label>
                        <div class="layui-input-inline">
                            <input type="text" name="snum" placeholder="请输入姓名"
                                autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">*必填</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号</label>
                        <div class="layui-input-inline">
                            <input type="text" name="tel" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">*必填</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">班级</label>
                        <div class="layui-input-inline">
                            <select name="cid">
                                <option value="">请选择班级</option>
                                <?php
                                    foreach ($classlist as $key => $value) {
                                        echo '<option value="'.$value['cid'].'">'.$value['cname'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">单选框</label>
                        <div class="layui-input-block">
                            <input type="radio" name="gender" value="1" title="男">
                            <input type="radio" name="gender" value="2" title="女" checked>
                        </div>
                    </div>
                    
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="formDemo">添加</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            © 华清远见-上海中心 2018
        </div>
    </div>
    <script src="./layui/layui.all.js"></script>
    <script>
        ;
        ! function () {

        }();
    </script>
</body>

</html>