// author:ASentry
// data of bulid:2017-5-26

//载入调用
function Focus(){
	document.loginform.loginaccount.focus();
}

//注册调用
function Regsiter()
{
	window.location.href="regsiter.html";
}

//账号与密码的非空判断
function NotNull()
{
	if(document.loginform.loginaccount.value=="")
	{
		alert("请输入账号！");
		document.loginform.loginpwd="";
		document.loginform.loginaccount.focus();
		return false;
	}
	if(document.loginform.loginpwd.value=="")
	{
		alert("请输入密码！");
		document.loginform.loginaccount="";
		document.loginform.loginaccount.focus();
		return false;
	}
}