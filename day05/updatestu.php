<?php
    require './top.php';
    $sql = 'SELECT cid, cname FROM classlist WHERE status = 1';
    $r = $mysql->query($sql);
    $classlist = $r->fetch_all(MYSQLI_ASSOC);

    //获取原始信息
    $sid = (int)$_GET['sid'];
    $sql = 'SELECT * FROM students WHERE status = 1 AND sid = ' . $sid;
    $r = $mysql->query($sql);
    $stu = $r->fetch_array(MYSQLI_ASSOC);
    foreach ($stu as $key => $value) {
        $$key = $value;
    }
    // var_dump($stu);
?>

        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">
                <span class="layui-breadcrumb">
                    <a href="">首页</a>
                    <a href="">教务系统</a>
                    <a href="">学生管理</a>
                    <a><cite>修改学生</cite></a>
                </span>
                <hr>
                <form class="layui-form">
                <input type="hidden" name="sid" value="<?=$sid?>">
                    <div class="layui-form-item">
                        <label class="layui-form-label">姓名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="sname" placeholder="请输入姓名" value="<?=$sname?>" autocomplete="off" class="layui-input">
                        </div><div class="layui-form-mid layui-word-aux">*必填</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">头像</label>
                        <div class="layui-input-inline">
                                <label class="header" for="header">
                                        <img src="./img/header.jpg" alt="">
                                </label>
                                <input type="file" name="header" id="header" class="myheader">
                                
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">学号</label>
                        <div class="layui-input-inline">
                            <input type="text" name="snum" placeholder="请输入学号"
                                autocomplete="off" class="layui-input" value="<?=$snum?>">
                        </div>
                        <div class="layui-form-mid layui-word-aux">*必填</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号</label>
                        <div class="layui-input-inline">
                            <input type="text" name="tel" placeholder="请输入手机号" autocomplete="off" class="layui-input" value="<?=$tel?>">
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
                                        echo '<option value="'.$value['cid'].'"'.($value['cid']==$cid?' selected':'').'>'.$value['cname'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">单选框</label>
                        <div class="layui-input-block">
                            <input type="radio" name="gender" value="1" title="男"<?=$gender==1?' checked':''?>>
                            <input type="radio" name="gender" value="2" title="女"<?=$gender==2?' checked':''?>>
                        </div>
                    </div>
                    
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn updatestu" type="button">修改</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <?php require './bottom.php';?>