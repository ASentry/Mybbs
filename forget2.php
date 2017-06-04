<!-- author:ASentry -->
<!-- date of build：2017-5-56 -->
<!-- last of revise:2017-5-30 -->
<?php
//引入数据库文件
include_once "content.php";
//得到传递的account值，作为中继传递
$account = $_GET['account'];
$safemail = addslashes($_POST['forgetsafemail']);
$safenum = $_POST['forgetsafemailnum'];
$pid = base64_encode(3);
//获取当前时间，设置验证码时效
$time = time();
$sql = "select safenumtime from login where safemail='" . $safemail . "'";
$query = mysqli_query($conn, $sql);
if ($res = mysqli_fetch_array($query)) {
	//判断验证码是否失效
	if ($res[0] + 600 > $time) {
		$sql = "select user_id from login where safemail='" . $safemail . "' and safenum='" . $safenum . "'";
		$query = mysqli_query($conn, $sql);
		if ($rse = mysqli_fetch_array($query)) {
			header("location:forgetpwddeal.php?account=" . $account . "&pid=" . $pid . "");
			exit;
		} else {
			echo '<script type="text/javascript">alert("安全邮箱或验证码不正确！")；window.location.href="forgetpwdfirst.html";</script>';
		}
	} else {
		echo '<script type="text/javascript">alert("验证码超时！");window.location.href="forgetpwdfirst.html"</script>';
	}
}
?>