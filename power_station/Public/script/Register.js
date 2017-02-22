($(function(){
	$('#company').click(function(){
		$('#caret_company').css('display','inline');
		$('#company').css('background-color','#22c1aa').css('color','#fff');
		$('#caret_person').css('display','none');
		$('#person').css('background-color','#f2f2f2').css('color','#000');
		$('#reg_person_form').css('display','none');
		$('#reg_company_form').css('display','block');
	});
	$('#person').click(function(){
		$('#caret_person').css('display','inline');
		$('#person').css('background-color','#22c1aa').css('color','#fff');
		$('#caret_company').css('display','none');
		$('#company').css('background-color','#f2f2f2').css('color','#000');
		$('#reg_company_form').css('display','none');
		$('#reg_person_form').css('display','block');
	});
	var options1={
		success:function(data){
			//alert(data);
			switch(data){
				case 'register_success':
					//swal("恭喜","登陆成功","success");
					//window.location.href="lg"; 
					swal({
						  title: "恭喜",
						  text: "注册成功!",
						  type: "success",
						  //showCancelButton: true,
						  //confirmButtonColor: "#DD6B55",
						  //confirmButtonText: "Yes, delete it!",
						  //closeOnConfirm: false,
						  //
						  //html: false
						}, function(){
						  window.location.href="index"; 
						});
					break;
				case 'phone_empty':
					swal("OMG","手机号不能为空","error");
					break;
				case 'user_empty':
					swal("OMG","用户名不能为空","error");
					break;
				case 'password_empty':
					swal("OMG","密码不能为空","error");
					break;
				case 'phone_wrong':
					swal("OMG","手机号长度有误","error");
					break;
				case 'user_phone_exist':
					swal("OMG","手机号已存在","error");
					break;
				case 'user_has_exist':
					swal("OMG","用户名已存在","error");
					break;
				default:
			}			
		}
	};
	var options2={
		success:function(data){
			switch(data){
				case 'register_success':
					//swal("恭喜","登陆成功","success");
					//window.location.href="lg"; 
					swal({
						  title: "恭喜",
						  text: "注册成功!",
						  type: "success",
						  //showCancelButton: true,
						  //confirmButtonColor: "#DD6B55",
						  //confirmButtonText: "Yes, delete it!",
						  //closeOnConfirm: false,
						  //
						  //html: false
						}, function(){
						  window.location.href="index"; 
						});
					break;
				case 'company_name_empty':
					swal("OMG","公司名称不能为空","error");
					break;
				case 'company_phone_empty':
					swal("OMG","管理员电话不能为空","error");
					break;
				case 'user_empty':
					swal("OMG","用户名不能为空","error");
					break;
				case 'password_empty':
					swal("OMG","密码不能为空","error");
					break;
				case 'company_phone_wrong':
					swal("OMG","手机号长度有误","error");
					break;
				case 'company_phone_exist':
					swal("OMG","管理员手机号已存在","error");
					break;
				case 'user_has_exist':
					swal("OMG","用户名已存在","error");
					break;
				default:
			}			
		}
	};
	$('#reg_person_submit').click(function () {
            $("#reg_person_form").ajaxSubmit(options1);
    });
    $('#reg_company_submit').click(function () {
            $("#reg_company_form").ajaxSubmit(options2);
    });
}))