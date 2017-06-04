<!-- author:ASentry -->
<!-- date of bulid:2017-5-26 -->
<?php
//引入数据库文件
include_once "content.php";
//过滤斜杠等字符
$useraccount1 = addslashes($_POST['forgetaccount']);
//base64加密，保证url传递时的安全性
$useraccount2 = base64_encode(addslashes($_POST['forgetaccount']));
//下一页面的页号
$pid = base64_encode(2);
$sql = "select user_id from login where user_account='$useraccount1'";
$query = mysqli_query($conn, $sql);
if ($rse = mysqli_fetch_array($query)) {
	header("location:forgetpwddeal.php?account=" . $useraccount2 . "&pid=" . $pid . "");
	exit;
} else {
	echo '<script type="text/javascript">alert("帐号不正确！")；window.location.href="forgetpwdfirst.html";</script>';
}
?>