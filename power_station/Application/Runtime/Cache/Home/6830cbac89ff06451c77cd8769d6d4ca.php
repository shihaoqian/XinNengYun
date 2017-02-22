<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="image/x-icon" rel="shortcut icon" href="/XinNengYun/power_station/Public/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/style/main.css">
	<link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/Static/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/Static/sweetalert-master/dist/sweetalert.css">
	<title>新能源系统登陆</title>
</head>
<body style="background-image:url(/XinNengYun/power_station/Public/images/loginBg.jpg)">
	<div style="width:100%" class="container">
		<div style="width: 40%;margin: 0 auto;height: 80px;margin-top: 5%">
			<img alt="" src="/XinNengYun/power_station/Public/images/solwayCloud.png" style="width: 100%">
		<!--
		 <p style="font-size: 18px;color: white;font-family: '黑体';text-align: center;margin-top: 10px">创维互联光伏电站智能运营云平台</p>
		-->
 		</div>
 		<div style="width:40%;margin:0 auto;margin-top:5%;background-color:white">
 			<div style="width:90%;margin:0 auto;padding-top:25px">
 				<p style="font-size:22px;color:#666666">登陆</p>
 				<form id="user_login" name="login" class="form-validation" method="post" action="user_login">
 					<table style="width: 100%">
						<tbody>
							<tr style="height: 15px">
								<td style="width: 10%">
								<img id="userImage" alt="" src="/XinNengYun/power_station/Public/images/username.png" style="transform: scale(0.8);">
								</td>
								<td style="width:70%">
									<input type="text" id="login_username" name="id" placeholder="用户名" class="form-control no-border" ng-model="user.email" required="">
								</td>
								<td style="width: 20%">
								</td>
							</tr>
						</tbody>
					</table>
					<hr style="margin-top: 5px;margin-bottom: 5px;">
					<table style="width: 100%">
						<tbody>
							<tr style="height: 15px">
								<td style="width: 10%">
									<img id="passwordImage" alt="" src="/XinNengYun/power_station/Public/images/password.png" style="transform: scale(0.8);">
								</td>
								<td style="width:70%">
									<input id="login_pass" type="password" name="password"  placeholder="密码" class="form-control no-border" ng-model="user.password" required="">
								</td>
								<td style="width: 20%">
								<a onclick="forgetPwd();" style="font-size: 15px;color: #118C8E;text-align: center;">忘记密码?</a>
								</td>
							</tr>
						</tbody>
					</table>
					<hr style="margin-top: 5px;margin-bottom: 5px;">
					<div style="width: 40%;margin: 0 auto;margin-top: 20px;">
						<button id="loginBtn" style="height: 45px;background-color:#00838F;border-color: #00838F;" type="button" class="btn btn-lg btn-primary btn-block" ng-disabled="form.$invalid">登  录</button>
					</div>
					<a class="pull-right" style="margin-top:-20px;font-size: 15px;color: #118C8E;cursor:pointer" onclick="RegistPage()">注册新用户</a>
					<div style="height: 20px">
					</div>
 				</form>
 			</div>
 			
 		</div>
	</div>
</body>
<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/Jquery/jquery.min.js"></script>
<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/Jquery/jquery.form.js"></script>
<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/sweetalert-master/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/sweetalert-master/dist/sweetalert-dev.js"></script>
<script type="text/javascript" src="/XinNengYun/power_station/Public/script/Login.js"></script>
</html>