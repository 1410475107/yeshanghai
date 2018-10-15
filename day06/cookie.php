<?php
phpinfo();
echo '123';
// php里面创建cookie
setcookie('name', '张计荣', time() + 30*24*3600);

echo $_COOKIE['name'];

