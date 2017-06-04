<!-- author:ASentry -->
<!-- last of revise:2017-5-29 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>重置密码</title>
	<link rel="stylesheet" type="text/css" href="css/forgetpwdsecond.css">
	<script type="text/javascript" src="./js/forgetpwd.js"></script>
</head>
<body onload="checkurl();">
	<div class="header">
		<div>
			<div class="header_title">
				<h1>重置密码</h1>
			</div>
			<div class="login">
				<a href="login.html">登录</a>
			</div>
		</div>
	</div>
	<div class="section_nav">
		<ul class="ulsection_nav">
			<li class="text">
				<div>
					<i>1</i>
					<p>填写账号</p>
				</div>
				<i></i>
			</li>
			<li class="idsure">
				<div>
					<i>2</i>
					<p>身份验证</p>
				</div>
				<i></i>
			</li>
			<li class="repwd">
				<div>
					<i>3</i>
					<p>修改密码</p>
				</div>
				<i></i>
			</li>
			<li class="comp">
				<div>
					<i>4</i>
					<p>完成</p>
				</div>
				<i></i>
			</li>
		</ul>
	</div>
	<div class="section_main">
		<form method="post" name="forgetpwdform" onsubmit="return check();" action="forget2.php?account=<?php echo $_GET['account']; ?>">
			<table class="accountcheck">
				<tr>
					<td><span>安全邮箱：</span></td>
				</tr>
				<tr>
					<td><input type="text" name="forgetsafemail" placeholder="请输入安全邮箱" style="width:264px"></td>
					<td>
						<div class="tips-error-text">
							<span>不能为空</span>
						</div>
					</td>
				</tr>
				<tr>
					<td><span>验证码：</span></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="forgetsafemailnum" placeholder="请输入验证码" style="width:150px">
						<input type="button" name="btforget" value="获取验证码 " onclick="sendmailcheck(this);" >
					</td>
					<td>
						<div class="tips-error-text">
							<span>不能为空</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submitforget" value="确定  ">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>