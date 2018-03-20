 function myCheck(){
         if(form.username.value==''){
           alert("账号不能为空");
           return false;
         }
          if(form.password.value==''){
          	alert("密码不能为空");
            return false;
          } 
          if(form.yzm.value==''){
          	alert("验证码不能为空");
          	return false;
          } 
          return true;      
      }
 function myCheckk(form){
    if(form1.username.value==''){
         alert('账号不能为空！');
          form1.username.focus();
          return false;
		}
	if(form1.username.value.length>8||form1.username.value.length<4){
		alert('账号只能为4-8位');
		form1.username.focus();
		return false;
		}
	if(form1.password.value==''||form1.yzmm.value==''){
		alert('密码不能为空！');
		form1.password.focus();
		return false;
	    }
	if(form1.password.value.length>9||form1.password.value.length<6){
		alert('密码只能为6-9位');
		form1.password.focus();
		return false;
	    }
	if(form1.password.value!=form1.yzmm.value) {
		alert('你两次输入的密码不一致，请重新输入！');
		form1.yzmm.focus();
		return false;
		}
		return true;
	}
// alert(window.innerHeight);   //360浏览器:509   谷歌浏览器:614
// alert(window.innerWidth);    //360浏览器:1166    谷歌浏览器:1280
 function change(ul){
 	 if(ul=='dv1'){
         document.getElementById("dv1-1").style.display="block";
         document.getElementById("dv2-2").style.display="none";
         document.getElementById("dv3-3").style.display="none";
         document.getElementById("dv4-4").style.display="none";
 	 }else if(ul=='dv2'){
         document.getElementById("dv1-1").style.display="none";
         document.getElementById("dv2-2").style.display="block";
         document.getElementById("dv3-3").style.display="none";
         document.getElementById("dv4-4").style.display="none";
 	 }else if(ul=='dv3'){
 	 	 document.getElementById("dv1-1").style.display="none";
         document.getElementById("dv2-2").style.display="none";
         document.getElementById("dv3-3").style.display="block";
         document.getElementById("dv4-4").style.display="none";
 	 }else if(ul=='dv4'){
 	 	 document.getElementById("dv1-1").style.display="none";
         document.getElementById("dv2-2").style.display="none";
         document.getElementById("dv3-3").style.display="none";
         document.getElementById("dv4-4").style.display="block";
 	 }
 }
