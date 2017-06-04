var flag=false;
function Focus(){
	document.regsiterform.userName.Focus();
}
//检查文本框是否为空
function check(element){
	var tmp=element.value;
	if (tmp!="") {
		flag=true;
	}

	else{
		alert("用户名或密码不能为空");
		document.regsiterform.element.Focus();
	}	
}
function notNull(){
	if (flag&&document.getElementById("post_isAgree").checked) {
		return true;
	}else{

		alert("你还未接受用户协议");
         return false;
	}
	

}