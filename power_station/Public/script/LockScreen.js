($(function(){
	$('#unLockBtn').click(function(){
		var pwd=$('#lock_pwd').val();
		//console.log(pwd);
		$.ajax({
			type: "POST",
			url: "unlock",
			data:{'password':pwd},
			success:function(data){
				//console.log(data);
				if (data==1) {
					swal({
						  title: "恭喜",
						  text: "验证成功!",
						  type: "success",
						}, function(){
						  history.go(-1); 
						});
				}
				else{
					swal("OMG","密码输入错误","error");
				}
			}
		})
	});
}))