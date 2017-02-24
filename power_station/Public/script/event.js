var checkbox_value =new Array();      //用来保存chechbox的值，设计为电站的名称，方便接下来的删除功能

function close_dianzhan(){
	$('#map_pop').css('display','none');
}
//显示用户名
function show_name(){
	$.ajax({
				type: "POST",
				url: "user_name",
				async:false,
				success:function(data){
					 $('.yanshi').html(data);
				}
			});

}
show_name();
//ajax动态更新页面数据
function update_overview_info(){
	//console.log(1);
	$.ajax({
		type: "POST",
		url: "station_overview",
		data: "",
		success:function(data){
			//console.log(JSON.stringify(data[0]['station_number']));
			//console.log(JSON.stringify(data[0]['carbon_reduction']));
			//console.log(typeof(JSON.stringify(data[0]['station_number'])));
			var a=JSON.stringify(data[0]['station_number']);
			$('#station_number').html(a.substring(1,a.length-1));

			var b=JSON.stringify(data[0]['total_installed_capacity']);
			$('#total_installed_capacity').html(b.substring(1,b.length-1));

			var c=JSON.stringify(data[0]['real_time_power']);
			$('#real_time_power').html(c.substring(1,c.length-1));

			var d=JSON.stringify(data[0]['daily_output']);
			$('#daily_output').html(d.substring(1,d.length-1));

			var e=JSON.stringify(data[0]['monthly_output']);
			$('#monthly_output').html(e.substring(1,e.length-1));

			var f=JSON.stringify(data[0]['yearly_output']);
			$('#yearly_output').html(f.substring(1,f.length-1));

		    var g=JSON.stringify(data[0]['total_output']);
			$('#total_output').html(g.substring(1,g.length-1));

			var h=JSON.stringify(data[0]['carbon_reduction']);
			$('#carbon_reduction').html(h.substring(1,h.length-1));

			var i=JSON.stringify(data[0]['tree_planted']);
			$('#tree_planted').html(i.substring(1,i.length-1));
		}
	});
}

//每隔2000ms刷新一次页面数据
window.setInterval(update_overview_info,10000);

($(function(){

		$('#go_to').click(function(){
			$.ajax({
				type: "POST",
				url: "../Station/station_name",
				async:false,
				data:{'station_name':$('#dianzhan_name').text()},
				success:function(data){
				}
			});
		})

		//退出全屏
		$('.expendScreen').click(function(){
			//alert(1);
			var docElm = document.documentElement;
			 docElm.webkitRequestFullScreen(); 
			 $('#resize-small').css('display','inline-block').css('cursor','pointer');
			 $('.expendScreen').css('display','none');
		});
		$(document).keyup(function(event){
			 switch(event.keyCode) {
			 	case 27:
			 	$('#resize-small').css('display','none');
				$('.expendScreen').css('display','inline-block');
			 }
		});
		$('#resize-small').click(function(){
			document.webkitCancelFullScreen(); 
			$('#resize-small').css('display','none');
			$('.expendScreen').css('display','inline-block');
		});

		//mouseover
		$('.down_li.col').mouseover(function(){
			$(this).css('background-color','rgba(236,240,241,1)')
		});
		$('.down_li.col').mouseout(function(){
			$(this).css('background-color','transparent')
		});



		$('.ico_user,.down,.yanshi').click(function(e){
			$('.dropdown_menu').css('display','block');
			//console.log(1);
			
			e.stopPropagation();
		});		
		$('.dropdown_menu').click(function(e){
			//$('.dropdown_menu').css('display','block');
			e.stopPropagation();
		});	
		$('body').click(function(){
			if($('.dropdown_menu').css('display')!='none'){
				$('.dropdown_menu').css('display','none');
			}
		});

		//点击切换按钮显示电站面板
		$('.qihuan').click(function(){
			$('#switchPowerModal').css('display','block');
			$.ajax({
				type: "POST",
				url: "map_info",
				async:false,
				success:function(data){
					$('#append_show').empty();
					$('#append_show').append("<dt class='col-sm-12 level1'><span class='cp text-ellipsis ng-binding'>全国分公司</span></dt>");
					if(data!=null){
               			for(var i=0;i<data.length;i++){
               				//console.log(data[i]['station_name']);
               				$('#append_show').append("<dd class='col-sm-3 level2'><span class='cp text-ellipsis ng-binding '>"+data[i]['station_name']+"</span></dd>");
                		}
                	}
				}
			});



		})

		//关闭选择部门按钮
		$('.modelCloseBtn').click(function(){
			$('#switchPowerModal').css('display','none');
		})


		//部门切换 按部门和自定义
		$($('.tabNav').find('li').eq(0)).click(function(){
			if($('.tabNav').find('li').eq(0).hasClass('active')!=true){
				$('.tabNav').find('li').eq(0).addClass('active');
				$('.tabNav').find('li').eq(1).removeClass('active');
			}
		});
		$($('.tabNav').find('li').eq(1)).click(function(){
			if($('.tabNav').find('li').eq(1).hasClass('active')!=true){
				$('.tabNav').find('li').eq(1).addClass('active');
				$('.tabNav').find('li').eq(0).removeClass('active');
			}
		})
	
		//锁屏按钮事件
		$('.lockScreen').click(function(){
			window.location.href="lockScreen";
		})

		//点击显示个人信息
		$('#li_person').click(function(){
			$.ajax({
				type: "POST",
				url: "per_info",
				data: "",
				success:function(data){
					$('#userName').attr('value',data[0]['id']);
					$('#phone_number').attr('value',data[0]['phone']);
				}
			});
			$('.dropdown_menu').css('display','none');
			$('#person_pop').css('display','block');
		})
		$('#person_panel').click(function(e){
			//$('.dropdown_menu').css('display','block');
			e.stopPropagation();
		});
		$('body').click(function(){
			//关闭个人信息界面
			if($('#person_pop').css('display')!='none'){
				$('#person_pop').css('display','none');
			}
			//关闭密码修改界面
			if($('#change_pass').css('display')!='none'){
				$('#change_pass').css('display','none');
			}
			//关闭电站管理界面
			if($('#station_manage').css('display')!='none'){
				$('#station_manage').css('display','none');
			}
		});


		//点击显示修改密码界面
		$('#li_pass').click(function(){
			$('.dropdown_menu').css('display','none');
			$('#change_pass').css('display','block');
		})
		//阻止时间冒泡
		$('#pass_panel').click(function(e){  
			//$('.dropdown_menu').css('display','block');
			e.stopPropagation();
		});

		//点击修改按钮进行密码修改并返回结果
		$('#changePasswordButton').click(function(){
			var oldpwd=$('#oldpwd').val();
			var newpwd=$('#newpwd').val();
			var newpwdconfirm=$('#newpwdconfirm').val();		
			$.ajax({
				type: "POST",
				url: "change_passwd",
				data: {'oldpwd':oldpwd,
						'newpwd':newpwd,
						'newpwdconfirm':newpwdconfirm
				},
				success:function(data){
					if (data==-1) {
						swal("OMG","前后密码输入不一致","error");
						document.getElementById("passform").reset();
					}
					if (data==0) {
						swal("OMG","旧密码输入不正确","error");
						document.getElementById("passform").reset();
						//$('#passform').reset();
					}
					if (data==1){
						swal({
						  title: "恭喜",
						  text: "修改成功!",
						  type: "success",
						}, function(){
						  $('#change_pass').css('display','none');
						});
						document.getElementById("passform").reset();
					}
				}
			});
		})
		//电站管理
		//叉号关闭界面
		$('.close').click(function(){
			$('#station_manage').css('display','none');
		})
		//显示个人电站信息
		$('#li_manage').click(function(){
			$.ajax({
				type: "POST",
				url: "map_info",
				async:false,
				success:function(data){
					$('#add_group').empty();
					if(data!=null){
               			for(var i=0;i<data.length;i++){
               				$('#add_group').append("<li class='clearfix'><div class='pull-left' style='width:3%;'><input type='checkbox' name='groupCheckList' value='"+data[i]['station_name']+"'></div><span class='station-name'>"+data[i]['station_name']+"</span></li>");
                		}
                		
                	}
				}
			});
			$('#station_manage').css('display','block');
			$('.modal-dialog').click(function(e){
				e.stopPropagation();
			});
			$('#myModel').modal();
		})
		//$('#add_group').append("<li class='clearfix'><div class='pull-left' style='width:3%;'><input type='checkbox' name='groupCheckList' value='64'></div><span class='station-name'>上海分组</span></li>");
		//控制全选按钮
		$('#choose_all').click(function(){
			if($('#choose_all').is(':checked')){
    			$("[name = groupCheckList]:checkbox").prop("checked", true);
			}
			if(!$('#choose_all').is(':checked')){
    			$("[name = groupCheckList]:checkbox").prop("checked", false);
			}
		})
		//设置删除事件
		$('.delete-all').click(function(){
			$('input[type="checkbox"][name="groupCheckList"]').each(
                function(){
                	if($(this).is(':checked')){
                		//console.log($(this).val());  
                		checkbox_value.push($(this).val());   //保存待删除电站的名字
                	}
                }
            );
            //console.log(checkbox_value);
            $.ajax({
            	type: "POST",
            	url: "delete_station",
            	data: {'station_name':checkbox_value},
            	success:function(data){
            		if (data==1) {
            			swal("恭喜","数据删除成功","success");
            		};
            		if (data==-1) {
            			swal("OMG","数据删除失败","error");
            		};
            	}
            });
		})

		//设置添加电站事件
		
		//显示添加界面
		$('.add-group').click(function(){
			$('#add_panel').css('display','block');
			$('#myModel').css('display','none');
		})

		//点击添加添加电站
		$('#add_new_station').click(function(){
			var new_name=$('#new_name').val();
			var new_location=$('#new_location').val();
			$.ajax({
				type: "POST",
				url: "add_station",
				data:{
						'new_name':new_name,
						'new_location':new_location
				},
				success:function(data){
					if (data==1) {
						swal("恭喜","电站添加成功","success");
					};
					if (data==-1) {
            			swal("OMG","电站添加失败","error");
            		};
				}
			});
		})


		//点击退出添加界面
		$('#cancel_new_station').click(function(){
			$('#add_panel').css('display','none');
			$('#myModel').css('display','block');
		})

		//退出系统，返回登陆界面
		$('#exit_system').click(function(){
			//销毁session
			$.ajax({
				type: "POST",
				url: "destroy_session",
				success:function(data){

				}
			});
			window.location.href="../User/index";
		})
}))