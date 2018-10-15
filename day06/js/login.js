window.onload = function(){
    document.querySelector('.login').onclick = function(){
        //账号密码必填
        // 参考添加学生信息

        // 使用ajax进行数据提交
        let xhr = new XMLHttpRequest();
        xhr.open('POST', './loginsubmit.php');
        let formdata = new FormData();
        formdata.append('username', document.querySelector('input[name="username"]').value);
        formdata.append('passwd',   document.querySelector('input[name="passwd"]').value);
        xhr.send(formdata);

        //接收服务器端返回的数据
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200){
                let result = JSON.parse(xhr.responseText);
                if(result.r == 'username_not_exist'){
                    document.querySelector('.utip').innerHTML = '账号不存在';
                    document.querySelector('.utip').classList.add('H');
                    return ;
                }

                if(result.r == 'passwd_err'){
                    document.querySelector('.ptip').innerHTML = '密码错误';
                    document.querySelector('.ptip').classList.add('H');
                    return ;
                }

                if(result.r == 'ok'){
                    window.location.href = './stulist.php';
                }

            }
        }
    }
}