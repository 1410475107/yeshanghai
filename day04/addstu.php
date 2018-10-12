<?php
    require './top.php';
    $sql = 'SELECT cid, cname FROM classlist WHERE status = 1';
    $r = $mysql->query($sql);
    $classlist = $r->fetch_all(MYSQLI_ASSOC);
?>

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
                <form class="layui-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">姓名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="sname" placeholder="请输入姓名" autocomplete="off" class="layui-input">
                        </div><div class="layui-form-mid layui-word-aux">*必填</div>
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
                            <button class="layui-btn addstu" type="button">添加</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <?php require './bottom.php';?>