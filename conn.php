<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$database = "news";

// 创建连接
$conn = new mysqli($servername, $username, $password,$database);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

//MySQL初始化，运行一次后注释掉下面的内容
// 创建数据库
$sql = "CREATE DATABASE news";
if ($conn->query($sql) === TRUE) {
    echo "数据库创建成功";
} else {
    die "Error creating database: " . $conn->error;
}
//创建accounts表
$sql = "CREATE TABLE accounts(uid int primary key auto_increment,username varchar(10) not null unique,password varchar(32)) not null";
if ($mysqli->query($sql) === TRUE) {
    die "Table accounts successfully created.\n";
}
//创建posts表
$sql = "CREATE TABLE posts(pid int primary key auto_increment,title varchar(100) not null,content text not null,FOREIGN KEY(owner) REFERENCES accounts(uid),createTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
if ($conn->query($sql) === TRUE) {
    echo "数据表创建成功";
} die {
    echo "Error creating table: " . $conn->error;
}
?>