($(function(){
	//console.log(1);
	
	var options={
		success:function(data){
			//alert(data);
			switch(data){
				case 'success':
					//swal("恭喜","登陆成功","success");
					//window.location.href="lg"; 
					swal({
						  title: "恭喜",
						  text: "登陆成功!",
						  type: "success",
						  //showCancelButton: true,
						  //confirmButtonColor: "#DD6B55",
						  //confirmButtonText: "Yes, delete it!",
						  //closeOnConfirm: false,
						  //
						  //html: false
						}, function(){
						  window.location.href=url; 
						  window.location.href="../Index/entrance"; 
						});
					break;
				case 'user_empty':
					swal("OMG","用户名不能为空","error");
					break;
				case 'password_empty':
					swal("OMG","密码不能为空","error");
					break;
				case 'user_not_exist':
					swal("OMG","用户不存在","error");
					break;
				case 'password_wrong':
					swal("OMG","密码错误","error");
					break;
				default:
			}			
		}
	};
	$("#loginBtn").click(function () {
            $("#user_login").ajaxSubmit(options);
    });

}));
function RegistPage(){
	window.location.href="Register"; 
}
