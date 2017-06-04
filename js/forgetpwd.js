// author:ASentry
// data of bulid:2017-5-27

//载入调用
function checkurl()
{
	var url=location.search;
	var Requset=new Object();
	var s="bGpwMTIz";
	if(url.indexOf("?")!=-1)
	{
		var str=url.substr(1);
		strs=str.split("&");
		for(var i=0;i<strs.length;i++)
		{
			Request[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
		}
		if(Request["id"]==s)
		{

		}
		else 
		{
			alert("出错！");
			window.location.href="forgetpwdfirst.html";
		}
	}
	else
	{
		alert("出错！");
		window.location.href="forgetpwdfirst.html";
	}
}
//邮箱检查
function sendmailcheck(obj)
{
	var s=document.forgetpwdform.forgetsafemail.value;
	var url="sendmailcheck.php?forgetsafemail="+s;
	var ajax=false;
	if(window.XMLHttpRequest)
	{
		ajax=new XMLHttpRequest();
	}
	else ajax=new ActiveXObject("Microsoft.XMLHTTP");
	if(!ajax)
	{
		window.alert("不能创建XMLHttpRequset！");
		return false;
	}
	ajax.open("GET",url);
	ajax.send();
	ajax.onreadystatechange=function()
	{
		if(ajax.readyState==4&&ajax.status==200)
		{		
		}
		else{
			return settime(obj);
		}		
	}
}
//按钮信息修改
var countdown=60;
var t;
function settime(val)
{
	if (countdown == 0) { 
		val.removeAttribute("disabled"); 
		val.value="获取验证码"; 
		countdown = 60; 
		clearTimeout(t);
		return;
	} else { 
		val.setAttribute("disabled", true); 
		val.value="重新发送(" + countdown + ")"; 
		countdown--; 
	} 
	t=setTimeout(function() {settime(val)},1000) 
}
