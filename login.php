<!-- author:Asentry -->
<!-- date of bulid:2017-5-25 -->
<!-- last of revise:2017-6-3 -->
<?php
session_start();
//引入数据库文件
include_once 'content.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_ip'])) {
	$sql = "select user_ip from login where user_name='" . $_SESSION['user_name'] . "' and user_id='" . $_SESSION['user_id'] . "'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	if ($row['user_ip'] == $_SESSION['user_ip']) {
		header('location:index.html');
	}
} else {
	header('location:login.html');
}
?>
