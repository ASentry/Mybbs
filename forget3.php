<!-- author:ASentry -->
<!-- date of build:2017-5-26 -->
<?php
//引入数据库文件
include_once "content.php";
//加盐
define("PWD_add", "as123");
$useraccount = base64_decode($_GET['account']);
$newpwd1 = addslashes(md5($_POST['forgetpwdsure1'] . PWD_add));
$newpwd2 = addslashes(md5($_POST['forgetpwdsure2'] . PWD_add));
$pid = base64_encode(4);
//判断密码吗是否相同
if ($newpwd1 != $newpwd2) {
	echo '<script type="text/javascript">alert("两次密码不相同！")；window.location.href="forgetpwdthird.php";</script>';
} else {
	$sql = "update login set user_pwd='" . $newpwd2 . "' where user_account='$useraccount'";
	$query = mysqli_query($conn, $sql);
	if (mysqli_affected_rows($conn) != 0) {
		header("location:forgetpwddeal.php?pid=" . $pid . "");
		exit;
	} else {
		echo '<script type="text/javascript">alert("更改失败！")；window.location.href="forgetpwdfirst.html";</script>';
	}
}
?>