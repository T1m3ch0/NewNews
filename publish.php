<?php

//检查登录状态
if(isset($_COOKIE['USERID'])){
    die "<script>alert('你已经登录了，请勿重复注册！');window.location.href='./index.php';</script>";
}
require "./conn.php"//连接数据库
$title = $_POST['title'];
$content = $_POST['content'];
$sql = "INSERT into posts(title,content) values($title,$content)";

?>