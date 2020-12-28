<?php
header()；
require "./conn.php";//连接数据库
//检查登录状态
if(!$pwd=isset($_COOKIE['USERID'])){
    $query = "SELECT username from accounts where password=$pwd;";
    $result = $conn->query($query);//看一下具体的数据是什么
    while($row = $result->fetch_assoc()){
        $username = $row['username'];
    }
}

$pwd = md5($_POST['pwd']);
$usr = $_POST['usr'];

//登录控制面板
$query = "SELECT password from accounts where username=$usr;";
if($conn->query($query)==$usr){
    echo "
    <a hreaf='./publish.php'>发布文章</a>
    <a hreaf='./renew.php'>修改文章</a>
    <a id='quit'>退出</a>
    ";
}else{
    echo "<script>alert('登录失败，请检查用户名或密码！');window.location.href='./index.php'</script>";
}

//文章展示
$articles = $conn->query("SELECT title,createTime from posts limit 10 order by createTime desc");

if($articles->num_rows>0){
    while($row = $articles->fetch_assoc()) {
        echo $row["title"].'    '.date("Y-m-d",$row["createTime"])."<br>";
    }
}else{
    echo '还没有文章哦';
}
?>