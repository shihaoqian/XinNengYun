<?php if (!defined('THINK_PATH')) exit();?><!Doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/Static/font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/Static/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/style/main.css">
	<link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/Static/sweetalert-master/dist/sweetalert.css">
	<link type="image/x-icon" rel="shortcut icon" href="/XinNengYun/power_station/Public/images/favicon.ico">

	<title>新能云</title>
</head>
<body>
	<div id="div1">
		<img src="/XinNengYun/power_station/Public/images/bg.jpg">
	</div>
	<div id="div2">
		<span>新能云集中监控系统</span>
	</div>
	<!--map-->
	<div id="main"></div>
	
	<!--map click-->
	<div id="map_pop">
		<div class="dianzhan_content">
			<div class="content_header">
				<button type="button" class="close_icon" onclick="close_dianzhan()">×</button>
				<span class="content-title" id="dianzhan_name">苏州1#发电站</span>
				<span  id="go_to" style="font-size:14px;color:#04B1B0;margin-left:15px;cursor:pointer;box-sizing:border-box"><a style="color:#04B1B0" href="../Station/power_station_monitor">进入电站>></a></span>
			</div>
			<div  class="content_body">
				<div style="height:100px">
					<img src="/XinNengYun/power_station/Public/images/dailybg.jpg" style="height:100%;width:100%">
				</div>
				<div style="line-height:40px;border-bottom:1px solid rgba(0,0,0,4)">
					<span style="margin-right:5px">运行状态</span>
					<span style="color:#66f74b;font-size:13px">
						<i class="fa fa-circle"></i>
						"正常运行"
					</span>
				</div>
				<div style="line-height:40px;padding: 0px">
					<span style="font-size:16px">实时功率</span>
					<span  style="font-size:18px;color:orange;margin-left:20px">-</span>
				</div>
				<div class="content_data">
					<span style="position:relative;width:33.333%;float:left">
						<div >日发电量</div>
						<div style="color: #1caf9a;font-size:18px;font-weight:bold">100度</div>
					</span>
					<span style="position:relative;width:33.333%;float:left">
						<div >月发电量</div>
						<div style="color: #21a5dc;font-size:18px;font-weight:bold">100度</div>
					</span>
					<span style="position:relative;width:33.333%;float:left">
						<div >年发电量</div>
						<div style="color:#f1b900;font-size:18px;font-weight:bold">1000度</div>
					</span>

				</div>
			</div>
		</div>
	</div>



	<!--left-->
	<div class="mapleft">
		<div class="left1">
			<div style="width:200px;height:60px;position:absolute;left:50%;top:50%;margin:-30px 0 0 -100px">
				<img id="logo_left" src="/XinNengYun/power_station/Public/images/pc_header_logo.png">
				<span style="font-size:20px;text-align:center;margin-left:22px;margin-top:21px;float:left">新能源演示</span>
			</div>
		</div>

		<div class="left2">
			<div>
				<p class="left2_p1 my_h4" style="background: url(/XinNengYun/power_station/Public/images/ico_poweNum.png) no-repeat left center;">电站数量</p>
				<span id="station_number" ng-bind="MonitorData.powerStationNum|dataNullFilter" class="my_h2 ng-binding">18</span>
				<p style="margin-top:5px">
					<span  class="my_h4">总装机量</span>
					<span id="total_installed_capacity" ng-bind="MonitorData.installedCapacity[0]|dataNullFilter" class="my_h4">6.773</span>
					<span ng-bind="MonitorData.installedCapacity[1]|dataNullFilter" class="ng-binding my_h5">MW</span>
				</p>
			</div>
		</div>

		<div class="left3">
			<div>
				<p class="my_h4"><img src="/XinNengYun/power_station/Public/images/blok1.png" width="25">  实时功率</p>
				<div style="margin-top:5px">
					<span id="real_time_power" class="my_h2">0</span> <span class="my_h5">kW</span>
					<span class="my_h5" style="margin-left:160px">0%</span>
				</div>
			</div>
		</div>

    	<div class="left4 clearfix">
    		<div style="background-color: rgba(28, 175, 154, .8);border-radius:5px;">
    			<p>日发电量</p>
    			<div style="text-align:center;margin-top:8px">
    				<span id="daily_output" class="my_h3">2793.2</span>度
    			</div>
    			<div style="text-align:center;margin-top:10px">
    				<span style="font-size:16px;font-family: Arial,'Times New Roman','Microsoft YaHei',SimHei; letter-spacing:2px;">¥--</span>
    			</div>
    		</div>
    	
    		<div style="background-color: rgba(66, 139, 202, .8);border-radius:5px;margin-left:6px">
    			<p>月发电累计量</p>
    			<div style="text-align:center;margin-top:8px">
    				<span id="monthly_output" class="my_h3">27.2</span>万度
    			</div>
    			<div style="text-align:center;margin-top:10px">
    				<span style="font-size:16px;font-family: Arial,'Times New Roman','Microsoft YaHei',SimHei; letter-spacing:2px;">¥--</span>
    			</div>
    		</div>

    		<div style="background-color: rgba(53, 75, 168, .8);border-radius:5px">
    			<p>年发电累计量</p>
    			<div style="text-align:center;margin-top:8px">
    				<span id="yearly_output" class="my_h3">603.1</span>万度
    			</div>
    			<div style="text-align:center;margin-top:10px">
    				<span style="font-size:16px;font-family: Arial,'Times New Roman','Microsoft YaHei',SimHei; letter-spacing:2px;">¥--</span>
    			</div>
    		</div>
    		<div style="background-color:rgba(91, 69, 157, .8);border-radius:5px;margin-left:6px">
    			<p>累计发电量</p>
    			<div style="text-align:center;margin-top:8px">
    				<span id="total_output" class="my_h3">6032.1</span>万度
    			</div>
    			<div style="text-align:center;margin-top:10px">
    				<span style="font-size:16px;font-family: Arial,'Times New Roman','Microsoft YaHei',SimHei; letter-spacing:2px;">¥--</span>
    			</div>
    		</div>
    	</div>	

    	<div class="left5">
    			<div>
    				<P class="my_h4">碳累计减排</P>
    				<div class="jianpainum">
    				<span id="carbon_reduction" class="my_h2" style="display:inline-block;height:40px">94.8</span>    <span style="font-size:20px">吨</span>
    				</div>
    			</div>
    		
    	</div>	

    	<div class="left6">
    			<div>
    				<P class="my_h4">植树</P>
    				<div class="jianpainum">
    				<span id="tree_planted" class="my_h2" style="display:inline-block;height:40px">9425.9</span>      <span style="font-size:20px">棵</span>
    				</div>
    			</div>
    		
    	</div>	
	</div>



	<!--head-->
	<ul class="map_header list-inline">
		<li>
			<i class="expendScreen" style="background-image: url(/XinNengYun/power_station/Public/images/ico_fullScreen.png);"></i>
			<i id="resize-small" class="fa fa-compress text-active" style="vertical-align: middle;display:none"> </i>
		</li>
		<li>
			<i class="lockScreen" style="background-image: url(/XinNengYun/power_station/Public/images/ico_lockScreen.png)"></i>
		</li>
		<li>
			<i class="ico_power" style="background-image: url(/XinNengYun/power_station/Public/images/ico_power.png)"></i>
			<span class="qihuan">切换</span>
		</li>
		<li class="dropdown">
			<i class="ico_user" style="background-image: url(/XinNengYun/power_station/Public/images/ico_user.png)"></i>
			<span class="yanshi" style="text-align:center">演示用户</span>
			<b class="down"></b>
			<ul class="dropdown_menu">
				<li class="down_li" style="background-color:rgba(236,240,241,1)">新能源演示</li>
				<li style="height:1px;margin:9px 0px;overflow:hidden;background-color: #e5e5e5;"></li>
				<li id="li_manage" class="down_li col">电站管理</li>
				<li id="li_person" class="down_li col">个人信息</li>
				<li id="li_pass" class="down_li col">修改密码</li>
				<li style="height:1px;margin:9px 0px;overflow:hidden;background-color: #e5e5e5;"></li>
				<li id="exit_system" class="down_li col">退出系统</li>
			</ul>
		</li>
	</ul>
    
    <!-- 个人信息-->
    <div id="person_pop">
	<div ng-controller="UpdateUserInfoCtrl" class="modal fade ng-scope in"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;">
   <div class="modal-dialog row" id="person_panel">
      <div class="modal-content ">
		<div class="modal-body wrapper-lg">
			<div class="row">
    			<div class="col-sm-12">
            		<h3 class="m-t-none m-b font-thin">个人信息</h3>
     				 <div class="panel-body">
          				<form class="bs-example form-horizontal ng-pristine ng-valid" action="http://necloud.solway.cn:80/AdminUser/updateDataSelective.htm" method="post" id="editFormForUserMod" name="editFormForUserMod" novalidate="novalidate">
         					
           
          						<div class="form-group">
             						<label class="col-lg-2 control-label">用户名</label>
              						<div class="col-lg-4">
              							<input type="text" readonly="readonly" id="userName" name="userName" class="form-control formData">
              						</div>
              						<label class="col-lg-2 control-label">手机号码</label>
              							<div class="col-lg-4">
               								<input type="text" id="phone_number" name="realName" readonly="readonly" class="form-control formData">
              							</div>
            					</div>
          					</form>
       					</div>
    				</div>
  				</div>
			</div>
		</div>
	</div>
	</div>
	</div>

	
	<!-- 密码修改-->
	<div id="change_pass">
	<div class="modal-dialog row" id="pass_panel">
		<div class="modal-content ">
			<div class="modal-body wrapper-lg">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="m-t-none m-b font-thin" id="myModalLabel">用户密码修改</h3>
							<div class="panel-body">
								<form class="bs-example form-horizontal ng-pristine ng-valid" id="passform" name="userPasswordChangeModelForm">
									<input type="hidden" name="userId" value="" id="userId" class="formData">
									<div class="form-group">
										<label class="col-lg-3 control-label">旧密码</label>
											<div class="col-lg-8">
												<input autocomplete="off" type="password" id="oldpwd" name="oldpwd" class="form-control formData">
											</div>
									</div>	
									<div class="form-group">
										<label class="col-lg-3 control-label">新密码</label>
											<div class="col-lg-8">
												<input autocomplete="off" type="password" id="newpwd" name="newpwd" class="form-control formData" placeholder="请输入新密码">
											</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">确认密码</label>
											<div class="col-lg-8">
												<input autocomplete="off" type="password" id="newpwdconfirm" name="newpwdconfirm" class="form-control formData" placeholder="再次输入密码">
											</div>
									</div>
									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10"> 
											<!--
											<button type="button" id="cancel_button" class=" m-l-sm pull-right btn m-b-xs w-xs btn-default" data-dismiss="modal"><strong>取 消</strong></button>
											-->
											<button type="button"  id="changePasswordButton" class="pull-right btn m-b-xs w-xs btn-info"><strong>修 改</strong></button>
										</div>
									</div>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
    <!-- head click-->
    <!--切换面板-->
	<div ng-controller="switchPowerCtrl" class="modal fade ng-scope in" id="switchPowerModal" aria-hidden="false" style="display: none;   background-color: rgba(28, 43, 54,0.9)">
		<div class="modal-dialog" style="width: 50%;min-width: 670px;">
			<div class="modal-content" style="background-color: rgba(42, 58, 71, .9);font-size: 14px;">
				<a class="glyphicon glyphicon-remove modelCloseBtn " data-dismiss="modal" style="color: rgb(6 , 190, 189);"></a>
				<div class="modal-body">
					<div style="color: #fff;">
						<div class="switch_bar">
							<span class="h4 mr20">选择分类</span>
							<ul class="list-inline inline tabNav">
								<li class="active">按部门</li>
								<!--<li>自定义</li>-->
							</ul>
							<!-- <div class="pageWrap pull-right">
								<i id="prev" class="arrowbtn disabled mr10">&lt;</i>
								<span id="curPage">1</span>/<span id="pageNums">2</span>
								<i id="next" class="arrowbtn ml10">&gt;</i>
							</div> -->
						</div>
						<div class="tabCon">
							<div class="row">
								<!-- <button class="allBtn disabled"  ng-click="toMonitoring()">全部</button> -->
							</div>
							<dl class="row ng-scope" ng-repeat="station in stationGroup" style="margin-bottom: 2px;">
								<dt class="col-sm-12 level0">
									<span class="cp ng-binding" ng-bind="station.name" ng-class="{'disabled': !station.isDisplay}" ng-click="switchStation($event, station.id, station.stFlag, station.name)">创维演示</span>
								</dt>
								<!-- ngRepeat: stationList in station.children -->
							</dl>
							<dl id="append_show" class="row ng-scope" ng-repeat="station in stationGroup" style="margin-bottom: 2px;">
								<!--
								<dt class="col-sm-12 level1">
									<span class="cp ng-binding" ng-bind="station.name" ng-class="{'disabled': !station.isDisplay}" ng-click="switchStation($event, station.id, station.stFlag, station.name)">全国分公司</span>
								</dt>
								-->
								<!--
								
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">清华附中朝阳分校</span>
								</dd> 
								<-->
							</dl><!-- end ngRepeat: station in stationGroup -->
							<!--
							<dl class="row ng-scope" ng-repeat="station in stationGroup" style="margin-bottom: 2px;">
								<dt class="col-sm-12 level1">
									<span class="cp ng-binding" ng-bind="station.name" ng-class="{'disabled': !station.isDisplay}" ng-click="switchStation($event, station.id, station.stFlag, station.name)">江苏分公司</span>
								</dt>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">苏州4#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">苏州5#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">苏州1#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">苏州2#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">苏州3#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">无锡1#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">无锡2#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">无锡3#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">无锡4#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">无锡5#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">无锡6#电站</span>
								</dd>
							</dl>
							<dl class="row ng-scope" ng-repeat="station in stationGroup" style="margin-bottom: 2px;">
								<dt class="col-sm-12 level1">
									<span class="cp ng-binding" ng-bind="station.name" ng-class="{'disabled': !station.isDisplay}" ng-click="switchStation($event, station.id, station.stFlag, station.name)">上海分公司</span>
								</dt>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">上海1#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">上海2#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">上海3#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">上海4#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">上海5#电站</span>
								</dd>
								<dd class="col-sm-3 level2 ellipse" ng-repeat="stationList in station.children">
									<span ng-class="{'disabled': !stationList.isDisplay}" ng-bind="stationList.name" class="cp ng-binding" ng-click="switchStation($event, stationList.id, stationList.stFlag,stationList.name)">上海6#电站</span>
								</dd>
							</dl>
						-->
						</div>
						<div class="tabCon none">
							<div class="row">
								<!-- <button class="allBtn" ng-click="toMonitoring()">全部</button> -->
							</div>
							<!-- ngRepeat: station in stationGroupDefined -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- 电站管理-->
	<div id="station_manage">
		<div class="modal fade" tabindex="-1" role="dialog" id="myModel">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h3 class="modal-title" style="text-align:center">电站管理</h3>
        				<div class="clearfix nav-col">
        					<div class="pull-left check-box">
        						<input id="choose_all" type="checkbox" ng-model="groupSelectAll" class="ng-pristine ng-valid ng-touched">
        						<span>全选</span>
        					</div>
        					<div class="pull-left"><a class="delete-all" >删除</a></div>
        					<div class="pull-left"><span class="add-group" ><img src="/XinNengYun/power_station/Public/images/add-group.png"></span><span>添加电站</span></div>
        				</div>
     			 	</div>
      				<div class="modal-body" >
        				<ul class="group-list" id="add_group" style="height:200px">
        					<!--
        					<li class="clearfix">
        						<div class="pull-left" style="width:3%;"><input type="checkbox" name="groupCheckList" value="64"></div>
        						<span class="station-name">上海分组</span>
        					</li>
        					-->
        				</ul>
      				</div>
    			</div>
			</div>
		</div>

		<div class="modal-dialog row" id="add_panel" style="display:none">
			<div class="modal-content ">
				<div class="modal-body wrapper-lg">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="m-t-none m-b font-thin" id="myModalLabel">添加电站</h3>
								<div class="panel-body">
									<form class="bs-example form-horizontal ng-pristine ng-valid" id="passform" name="userPasswordChangeModelForm">
										<input type="hidden" name="userId" value="" id="userId" class="formData">
										<div class="form-group">
											<label class="col-lg-3 control-label" style="font-weight:600;padding-left:20px;width:300px;text-align:left">电站名称</label>
												<div class="col-lg-8" style="margin-top:10px;width:538px">
													<input autocomplete="off" type="text" id="new_name" name="new_name" class="form-control formData" placeholder="请输入电站名称">
												</div>
										</div>	
										<div class="form-group">
											<label class="col-lg-3 control-label" style="font-weight:600;padding-left:20px;width:300px;text-align:left">电站地理坐标: 格式形如[120.50,31.50]</label>
												<div class="col-lg-8" style="margin-top:10px;width:538px">
													<input autocomplete="off" type="text" id="new_location" name="new_location" class="form-control formData" placeholder="请输入电站地理坐标">
												</div>
										</div>
										
										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-10"> 
												<button type="button"  id="add_new_station" class="pull-left btn m-b-xs w-xs btn-info" style="margin-left:260px"><strong>添加</strong></button>
												<button type="button"  id="cancel_new_station" class="pull-right btn m-b-xs w-xs btn-info"><strong>取消</strong></button>
											</div>
										</div>
									</form>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!--bottom-->
    <div class="map_buttom">
    	<ul class="list-inline" style="color:#fff">
    		<li>
    			<i class="glyphicon glyphicon-stop mr5"></i>地面电站
    		</li>
    		<li>
    			<i class="fa fa-circle mr5"></i>分布式电站
    		</li>
    		<li>
    			<i class="fa fa-play mr5" style="transform:rotate(30deg);vertical-align:middle"></i>用户电站
    		</li>
    	</ul>
    	<div class="dianzhan_status">
    		<button class="btn" style="background-color:#3f4c57">全部 10</button>
    		<button class="btn" style="background-color:#1f5c34">正常 10</button>
    		<button class="btn" style="background-color:#472c34">故障 0</button>
    		<button class="btn" style="background-color:#4b6b3f">报警 0</button>
    		<button class="btn" style="background-color:#4f6d7a">中断 0</button>
    	</div>
    </div>


	<!--
	<script type="text/javascript" src="angular.min.js"></script>
	<script type="text/javascript" src="angular-animate.js"></script>
	-->
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/Jquery/jquery.min.js"></script>

	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/dist/echarts.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/china.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/北京.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/江苏.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/安徽.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/澳门.js"></script>

	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/福建.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/甘肃.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/广东.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/广西.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/贵州.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/海南.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/河北.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/河南.js"></script>

	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/黑龙江.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/湖北.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/湖南.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/吉林.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/江西.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/辽宁.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/内蒙古.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/宁夏.js"></script>

	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/青海.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/山东.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/山西.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/山西1.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/上海.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/四川.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/台湾.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/天津.js"></script>

	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/西藏.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/香港.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/新疆.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/云南.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/浙江.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/echarts/province/重庆.js"></script>

	<script type="text/javascript" src="/XinNengYun/power_station/Public/script/test_map.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/script/event.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/bootstrap-3.3.0-dist/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/sweetalert-master/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="/XinNengYun/power_station/Public/Static/sweetalert-master/dist/sweetalert-dev.js"></script>
</body>
</head>