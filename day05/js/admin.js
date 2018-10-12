window.onload = function () {
    addstu();
    updatestu();
    delstu();

    //抽选学生
    rand();

    //上传图片
    uploadimg();
}
function uploadimg() {
    let myheader = document.querySelector('.myheader'); 
    if(!myheader) return ;
    let headerimg = document.querySelector('.header img'); 
    //事件处理
    myheader.onchange = function(){
        console.log(this.files[0]);
        //把文件上传到服务器 AJAX 然后服务器返回一个图片地址
        let xhr = new XMLHttpRequest();
        xhr.open('POST', './uploads.php');
        //创建一个表单数据对象
        let formdata = new FormData();  //类似于写了一个表单  <form></form>
        formdata.append('myheader', this.files[0]);//<input name="myheader" type="file" files="this.files[0]">
        formdata.append('username', '沈斌');
        xhr.send(formdata);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let data = JSON.parse(xhr.responseText);
                console.log(data);
                headerimg.src = data.path;
            }
        }


    }
}

function rand(params) {
    let start = document.querySelector('.rand'); 
    let mydiv = document.querySelector('.mydiv'); 
    if(!start) return ;

    start.onclick = ()=>{
        let n = 0;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', './getstus.php');
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let data = JSON.parse(xhr.responseText);
                console.log(data);
                let sid = setInterval(function(){
                    //随机一个下边，需要向下取整
                    let ind = Math.floor(Math.random()*data.length);
                    // 改变一个盒子的内容
                    mydiv.innerHTML = data[ind].sname;
                    n++;
                    n == 10 && clearInterval(sid);
                }, 300);
            }
        }
    }
}
//添加学生信息  js
function updatestu() {
    //事件源
    let updatestu = document.querySelector('.updatestu');
    if (!updatestu) return;

    //事件三要素
    updatestu.onclick = function () {
        // 要提交的数据
        let data = 'sid=' + document.querySelector('input[name="sid"]').value;
        //姓名必填 2-4汉字
        let sname = document.querySelector('input[name="sname"]');
        let reg_sname = /^[\u4e00-\u9fa5]{2,4}$/;
        if (!reg_sname.test(sname.value)) {
            sname.parentNode.nextElementSibling.classList.add('H');
            sname.focus();
            return false;
        } else {
            sname.parentNode.nextElementSibling.classList.remove('H');
            data += '&sname=' + sname.value;
        }

        //序号必填 6位
        let snum = document.querySelector('input[name="snum"]');
        let reg_snum = /^\d{6}$/;
        if (!reg_snum.test(snum.value)) {
            snum.parentNode.nextElementSibling.classList.add('H');
            snum.focus();
            return false;
        } else {
            snum.parentNode.nextElementSibling.classList.remove('H');
            data += '&snum=' + snum.value;

        }

        // 手机号必填 6位
        let tel = document.querySelector('input[name="tel"]');
        let reg_tel = /^1[3-9]\d{9}$/;
        if (!reg_tel.test(tel.value)) {
            tel.parentNode.nextElementSibling.classList.add('H');
            tel.focus();
            return false;
        } else {
            tel.parentNode.nextElementSibling.classList.remove('H');
            data += '&tel=' + tel.value;
        }

        //班级和性别
        data += '&cid=' + document.querySelector('select[name="cid"]').value;
        data += '&gender=' + document.querySelector('input[name="gender"]:checked').value;

        //ajax操作：把数据提交到服务器
        //第一步：创建一个XHR对象
        let xhr = new XMLHttpRequest();
        // 第二步：建立对服务器的请求
        xhr.open('POST', './updatestusubmit.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //第三步：发送请求
        xhr.send(data);
        //监听状态改变
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let data = JSON.parse(xhr.responseText);
                console.log(data);
                if (data.r == 'ok') {
                    layer.confirm('修改成功', {
                        btn: [ '回到管理页面']
                    }, function (index) {
                        window.location.href = './stulist.php';
                    });
                } else {
                    alert('失败，请刷新后重新操作');
                }
            }

        }
    }
}


//添加学生信息  js
function addstu() {
    //事件源
    let addstu = document.querySelector('.addstu');
    if (!addstu) return;

    //事件三要素
    addstu.onclick = function () {
        // 要提交的数据
        let data = '';
        //姓名必填 2-4汉字
        let sname = document.querySelector('input[name="sname"]');
        let reg_sname = /^[\u4e00-\u9fa5]{2,4}$/;
        if (!reg_sname.test(sname.value)) {
            sname.parentNode.nextElementSibling.classList.add('H');
            sname.focus();
            return false;
        } else {
            sname.parentNode.nextElementSibling.classList.remove('H');
            data = 'sname=' + sname.value;
        }

        //序号必填 6位
        let snum = document.querySelector('input[name="snum"]');
        let reg_snum = /^\d{6}$/;
        if (!reg_snum.test(snum.value)) {
            snum.parentNode.nextElementSibling.classList.add('H');
            snum.focus();
            return false;
        } else {
            snum.parentNode.nextElementSibling.classList.remove('H');
            data += '&snum=' + snum.value;

        }

        // 手机号必填 6位
        let tel = document.querySelector('input[name="tel"]');
        let reg_tel = /^1[3-9]\d{9}$/;
        if (!reg_tel.test(tel.value)) {
            tel.parentNode.nextElementSibling.classList.add('H');
            tel.focus();
            return false;
        } else {
            tel.parentNode.nextElementSibling.classList.remove('H');
            data += '&tel=' + tel.value;
        }

        //班级和性别
        data += '&cid=' + document.querySelector('select[name="cid"]').value;
        data += '&pid=' + document.querySelector('select[name="pid"]').value;
        data += '&gender=' + document.querySelector('input[name="gender"]:checked').value;
        console.log(12);
        //ajax操作：把数据提交到服务器
        //第一步：创建一个XHR对象
        let xhr = new XMLHttpRequest();
        // 第二步：建立对服务器的请求
        xhr.open('POST', './addstusubmit.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //第三步：发送请求
        xhr.send(data);
        //监听状态改变
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let data = JSON.parse(xhr.responseText);
                console.log(data);
                if (data.r == 'ok') {
                    layer.confirm('添加成功', {
                        btn: ['继续添加', '回到管理页面']
                    }, function (index, layero) {
                        window.location.reload();
                    }, function (index) {
                        window.location.href = './stulist.php';
                    });
                } else {
                    alert('失败，请刷新后重新操作');
                }
            }

        }





    }
}


//  删除学生信息
function delstu() {
    let delstu = document.querySelector('.classlist tbody');
    if(!delstu) return;
    delstu.onclick = function (e) {
        //判断当前点击的是 .delstu
        if (e.target.classList.contains('delstu')) {
            layer.confirm('是否确定删除？', {
                btn: ['确定', '取消']
            }, function (index, layero) {
                //获取自定义属性值得方法
                let sid = e.target.dataset.sid;
                let xhr = new XMLHttpRequest();
                xhr.open('GET', './delstu.php?sid=' + sid);
                xhr.send();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        let data = JSON.parse(xhr.responseText);
                        if (data.r1 == 'ok') {
                            window.location.reload();
                        }
                    }
                }
            }, function (index) {});
        }
    }

}