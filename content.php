<!-- author:ASentry -->
<!-- date of build:2017-5-25 -->
<?php
//���ñ����ʽ
header("Content-type:text/html;charset=utf-8");

//�������ݿ�������ַ
$host = "localhost";

//����mysql���ݿ��¼�û���
$user = "root";

//����mysql���ݿ��¼����
$pwd = "";

$db = "mybbs";
//�������ݿ�
$conn = mysqli_connect($host, $user, $pwd);
mysqli_select_db($conn, $db);
//�����ӽ����ж�
if (!$conn) {
	die("false" . mysqli_error());
}
?>