<!-- author:ASentry -->
<!-- date of build:2017-5-28 -->
<?php
//忘记密码跳转处理页面
$account = $_GET['account'];
$pid = base64_decode($_GET['pid']);
//访问控制
$id = base64_encode("as123");
switch ($pid) {
case 1:
	header("location:forgetpwdfirst.html");
	break;
case 2:
	header("location:forgetpwdsecond.php?account=" . $account . "&id=" . $id . "");
	break;
case 3:
	header("location:forgetpwdthird.php?account=" . $account . "&id=" . $id . "");
	break;
case 4:
	header("location:forgetpwdforth.html?id=" . $id . "");
	break;
default:
	# code...
	echo '<script type="text/javascript">alert("出现错误返回首页！")window.location.href="forgetpwdfirst.html";</script>';
	break;
}
?>