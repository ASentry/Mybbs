<?php
header("Content-type:text/html;charset=UTF-8");
$flag=false;
include_once 'content.php';
if (isset($_REQUEST['Code'])) {
	session_start();
	if (strtolower($_REQUEST['Code']==$_SESSION['authcode'])) {
		$flag=true;		
	}else{
	  echo "<script language=\"javascript\">";
      echo "alert('验证码输入错误,请重新输入');";
      echo "document.location=\"./regsiter.html\"";
      echo "</script>";
	}
}
if (isset($_REQUEST['passWord'])) {
	if ($_REQUEST['passWord']==$_REQUEST['besurepwd']) {
		$flag=true;
	}else{
		echo "<script language=\"javascript\">";
      echo "alert('两次密码输入不相同,请重新输入');";
      echo "document.location=\"./regsiter.html\"";
      echo "</script>";	
	}
}
if (isset($_REQUEST['postbox'])) {
	$mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
	if (preg_match($mode,$_REQUEST['postbox'])) {
		$flag=true;	
	}else{
		echo "<script language=\"javascript\">";
      echo "alert('邮箱格式不正确，请重新输入');";
      echo "document.location=\"./regsiter.html\"";
      echo "</script>";	
	}
}
$username=$_POST['userName'];
$sql= "select user_id from login where user_name='".$username."' ";
$query= mysqli_query($conn,$sql);
$res=mysqli_num_rows($query);
if ($res==0) {
	$flag=true;
}else{
	echo "<script language=\"javascript\">";
      echo "alert('用户名已存在，请重新输入');";
      echo "document.location=\"./regsiter.html\"";
      echo "</script>";
}
if ($flag) {
     define("PWD_add", "as123");
$regusername = addslashes($_POST['userName']);
$regpwd = addslashes(md5($_POST['passWord'] . PWD_add));
$mail=$_POST['postbox'];
$query_a=mysqli_query($conn,"select count(*) from login");
$res_a=mysqli_fetch_row($query_a);
$grant_id=$res_a[0]++;
echo"$grant_id";
$sql_b="select * from login where user_id='".$grant_id."'";
$query_b=mysqli_query($conn,$sql_b);
$res_b=mysqli_num_rows($query_b);
if ($res_b) {
	$grant_id++;
}
$sql = "insert into login(user_id,user_name,user_pwd,safemail) values ('$grant_id','$regusername','$regpwd','$mail')";
$query = mysqli_query($conn, $sql);

if ($query) {
	echo "<script language=\"javascript\">";
      echo "alert('注册成功!');";
      echo "document.location=\"./login.html\"";
      echo "</script>";
}
}


?>