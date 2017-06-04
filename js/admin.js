// author:ASentry
// data of bulid:2017-6-1

//载入调用
function Focus(){
	document.adminform.adminaccount.focus();
}

//注册调用
function Regsiter()
{
	window.location.href="regsiter.html";
}

//账号与密码的非空判断
function NotNull()
{
	if(document.adminform.adminaccount.value=="")
	{
		alert("请输入账号！");
		document.adminform.adminpwd="";
		document.adminform.adminaccount.focus();
		return false;
	}
	if(document.adminform.adminpwd.value=="")
	{
		alert("请输入密码！");
		document.adminform.adminaccount="";
		document.adminform.adminaccount.focus();
		return false;
	}
}