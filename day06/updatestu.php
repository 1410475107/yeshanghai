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

    $hobbyA = explode(',', $hobby);
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
                                        <img src="<?=$head ? $head : './img/header.jpg'?>" alt="">
                                </label>
                                <input type="file" name="header" id="header" class="myheader">
                                <!-- 默认值设置 -->
                                <input type="hidden" name="head" value="<?=$head?>">
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
                        <label class="layui-form-label">性别</label>
                        <div class="layui-input-block">
                            <input type="radio" name="gender" value="1" title="男"<?=$gender==1?' checked':''?>>
                            <input type="radio" name="gender" value="2" title="女"<?=$gender==2?' checked':''?>>
                        </div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">爱好</label>
                        <div class="layui-input-block">
                        <input type="checkbox" name="hobby[]" value="读书" title="读书" <?=in_array('读书', $hobbyA)?' checked':''?>>
                        <input type="checkbox" name="hobby[]" value="写代码" title="写代码" <?=in_array('写代码',$hobbyA)?' checked':''?>> 
                        <input type="checkbox" name="hobby[]" value="做运动" title="做运动" <?=in_array('做运动',$hobbyA)?' checked':''?>> 
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">简介</label>
                        <div class="layui-input-block">
                        <div id="editor">
                            <p><?=$info?></p>
                        </div>

                        <textarea name="info" id="info" cols="30" rows="10" class="hide"><?=$info?></textarea>

                        <!-- <div id="editor1">
                        <p>上海</p>
                        </div> -->

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
        <!-- 引入编辑器的js -->
        <script src="http://unpkg.com/wangeditor/release/wangEditor.min.js"></script>
        <script>
        var E = window.wangEditor;
        // 创建一个编辑器
        var editor = new E('#editor');
        // 配置服务器端地址
        editor.customConfig.uploadImgServer = './editorupload.php?from=pc';
        //服务器端接收的文件名称
        editor.customConfig.uploadFileName = 'images[]';
        //内容同步
        var $text1 = document.querySelector('#info')
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            // $text1.val(html);
            $text1.value = html;
        }


        editor.create();
        // 再创建一个编辑器
        // var editor1 = new E('#editor1')
        // editor1.create();


        </script>                    
        <?php require './bottom.php';?>