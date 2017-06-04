<!-- author:Asentry -->
<!-- date of bulid:2017-5-25 -->
<!-- last of revise:2017-6-3 -->
<?php
//引入数据库文件
include_once 'content.php';
//引入获取ip的文件
include_once 'getip.php';
//开启一个回话
session_start();
//加盐
define("PWD_add", "as123");
$loginaccount = addslashes($_POST['loginaccount']);
$loginpwd = addslashes(md5($_POST['loginpwd'] . PWD_add));
//获得ip
$loginip = getIp();
//验证身份
$sql = "select user_id ,user_name from login where user_account='" . $loginaccount . "' or user_name='" . $loginaccount . "' and user_pwd='" . $loginpwd . "'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) == 1) {
	//记住我控制
	if (isset($_POST['remember-me'])) {
		$row = mysqli_fetch_array($query);
		$sql = "update login set user_ip='" . $loginip . "' where user_account='" . $loginaccount . "'";
		$up = mysqli_query($conn, $sql);
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_name'] = $row['user_name'];
		$_SESSION['user_ip'] = $loginip;
		setcookie('user_id', $row['user_id'], time() + (60 * 30));
		setcookie('user_name', $row['user_name'], time() + (60 * 30));
		setcookie('user_ip', $loginip, time() + (60 * 30));
	}
	header("location:index.html");
	exit;
} else {
	echo '<script type="text/javascript">alert("账号或密码不正确！");window.location.href="login.php";</script>';
}
?>