<?php
//直接嵌入
require "./conn.php"//连接数据库
//检查登录状态
if(isset($_COOKIE['USERID'])){
    die "<script>alert('你已经登录了，请勿重复注册！');window.location.href='./index.php';</script>";
}

$pwd = md5($_POST['pwd']);
$usr = $_POST['usr'];
//检查是否已有同账户名用户
$check = "SELECT * from accounts where username=$usr";
if($check->num_rows>0){
    die "<script>alert('已存在该用户名，请勿重复注册！');window.location.href='./index.php';</script>";
}else
$sql = "INSERT into accounts(title,content) values($title,$content)";
//设置用户为登录状态
setcookie('USERID',$pwd,time()+7200);

?>