<!-- author:ASentry -->
<!-- date of build:2017-5-25 -->
<?php
//设置编码格式
header("Content-type:text/html;charset=utf-8");

//定义数据库主机地址
$host = "localhost";

//定义mysql数据库登录用户名
$user = "root";

//定义mysql数据库登录密码
$pwd = "";

$db = "mybbs";
//链接数据库
$conn = mysqli_connect($host, $user, $pwd);
mysqli_select_db($conn, $db);
//对连接进行判断
if (!$conn) {
	die("false" . mysqli_error());
}
?>