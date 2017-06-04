<!-- author:Asentry -->
<!-- date of build:2017-6-1 -->
<?php
//引入连接数据库的文件
include_once 'content.php';
//对密码加盐处理
define("PWD_add", "as123");
//执行查询
$adminaccount = addslashes($_POST['adminaccount']);
$adminpwd = addslashes(md5($_POST['adminpwd'] . PWD_add));
$sql = "select ad_user_id from admin where ad_account='" . $adminaccount . "' or ad_name='" . $adminaccount . "' and ad_pwd='" . $adminpwd . "'";
$query = mysqli_query($conn, $sql);
//判断及跳转
if (mysqli_num_rows($query) == 1) {
	header("location:index.html");
	exit;
} else {
	echo '<script type="text/javascript">alert("账号或密码不正确！");window.location.href="admin.html";</script>';
}
?>