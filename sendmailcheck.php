<!-- author:ASentry -->
<!-- date of build:2017-5-30 -->
<?php
//引入数据库文件
include_once 'content.php';
$safemail = $_GET['forgetsafemail'];
$sql = "select user_id from login where safemail='$safemail'";
$query = mysqli_query($conn, $sql);
if ($res = mysqli_fetch_array($query)) {
	//生成随机的验证码
	function getRandomString($len, $chars = null) {
		if (is_null($chars)) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		}
		mt_srand(10000000 * (double) microtime());
		for ($i = 0, $str = '', $lc = strlen($chars) - 1; $i < $len; $i++) {
			$str .= $chars[mt_rand(0, $lc)];
		}
		return $str;
	}
	//验证码长度为6
	$safenum = getRandomString(6);
	//得到当时时间
	$time = time();
	//更新数据库
	$sql = "update login set safenum='" . $safenum . "', safenumtime='" . $time . "' where safemail='" . $safemail . "'";
	$query = mysqli_query($conn, $sql);
	//引入邮件文件
	require_once "email.class.php";
	//生成对象，并发送邮件
	$mail = new MySendMail();
	//设置smtp服务器，到服务器的SSL连接
	$mail->setServer("smtp.qq.com", "3117607808@qq.com", "jvattrdbpmozdfif", 465, true);
	//设置发件人
	$mail->setFrom("3117607808@qq.com");
	//	设置收件人，多个收件人，调用多次
	$mail->setReceiver($safemail);
	//设置邮件主题、内容
	$mail->setMail("验证信息", "<b>您的验证码为：" . $safenum . "</b>");
	//发送
	$state = $mail->sendMail();
	exit;
}
?>