<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>数据可视化</title>
    <link rel="stylesheet" type="text/css" href="/hahaha/thinkphp/Public/Static/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/hahaha/thinkphp/Public/Static/simple-line-icons-master/css/simple-line-icons.css" >
    <link rel="stylesheet" type="text/css" href="/hahaha/thinkphp/Public/style/main.css">
    <link rel="stylesheet" type="text/css" href="/hahaha/thinkphp/Public/Static/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/hahaha/thinkphp/Public/style/station/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/hahaha/thinkphp/Public/style/station/menu.css">
    <link rel="stylesheet" type="text/css" href="/hahaha/thinkphp/Public/style/station/power_station_monitor.css">
    <link type="image/x-icon" rel="shortcut icon" href="/hahaha/thinkphp/Public/images/favicon.ico">
  </head>
  <body>
  	
    <!-- 顶部导航条 -->
    <div id="topbar">
      <nav class="navbar navbar-default" rol="navigation" style="height: 50px; ">
  <div class="container-fluid" style="text-align: center;">
    <span style="line-height: 50px; font-size: 25px; color:#777;">数据可视化中心</span>
    <div class="navbar-header">
    <!--
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    -->
      <a class="navbar-brand" href="#">
        <p style="margin-top:-13px"><img alt="brand" src="http://localhost:8080/hahaha/thinkphp/Public/images/pc_header_logo.png" > &nbsp;新能云</p>
      </a>
    </div>

    <!-- 组件 -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float: right;">
      <ul class="map_header list-inline" style="top:10px" >
          <li>
              <i id="expendScreen" class="fa fa-expand text" style="vertical-align: middle;color:black;cursor:pointer"></i>
              <i id="resize-small" class="fa fa-compress text-active" style="vertical-align: middle;display:none;color:black;cursor:pointer"> </i>
          </li>
          <li>
              <i class="icon-lock-open" style="vertical-align: middle;color:black;cursor:pointer"></i>
          </li>
          <li>
              <i class="icon-bell fa-fw" style="vertical-align: middle;color:black"></i>
              
          </li>
          <li class="dropdown">
              <i class="icon-user" style="vertical-align: middle;color:black;"></i>
              <span class="yanshi" style="text-align:center;color:black">演示用户</span>
              <b class="down" style="color:black"></b>
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
    </div>
  </div>
</nav>
    </div>

   
    <!-- 顶部影藏信息-->
    <div id="person_pop">
    <div ng-controller="UpdateUserInfoCtrl" class="modal fade ng-scope in"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;">
       <div class="modal-dialog row" id="person_panel">
            <div class="modal-content ">
                <div class="modal-body wrapper-lg">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b font-thin">个人信息</h3>
                            <div class="panel-body">
                                <form >
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
                        <div class="pull-left"><span class="add-group" ><img src="http://localhost:8080/hahaha/thinkphp/Public/images/add-group.png"></span><span>添加电站</span></div>
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


    <!-- 左侧菜单栏 -->
     <div id="left">
     <!--
        <aside class="main-sidebar">
            <section class="sidebar">
              <ul class="sidebar-menu">
                <li class="treeview">
                  <a href="#">
                    <span>消息中心</span> <i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="news_list"><span class="glyphicon glyphicon-calendar"></span> &nbsp;消息列表</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <span>监控视图</span> <i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="power_station_monitor"><span class="glyphicon glyphicon-eye-open"></span> &nbsp;电站监控</a></li>
                    <li><a href="layout_view"><span class="glyphicon glyphicon-th"></span> &nbsp;布局视图</a></li>
                    <li><a href="list_view"><span class="glyphicon glyphicon-align-justify"></span> &nbsp;列表视图</a></li>
                    <li><a href="trouble_alarm"><span class="glyphicon glyphicon-bell"></span> &nbsp;故障报警</a></li>
                    <li><a href="running_log"><span class="glyphicon glyphicon-list"></span> &nbsp;运行日志</a></li>
                    <li><a href="history_data_query"><span class="glyphicon glyphicon-repeat"></span> &nbsp;历史数据查询</a></li>
                    <li><a href="power_station_trend"><span class="glyphicon glyphicon-text-height"></span> &nbsp;电站功率曲线</a></li>
                    <li><a href="Station/device_power_trend"><span class="glyphicon glyphicon-text-height"></span> &nbsp;设备功率曲线</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <span>分析视图</span> <i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="//127.0.0.1/dataweb/overview.php"><span class="glyphicon glyphicon-stats"></span> &nbsp;概览</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <span>管理视图</span> <i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><span class="glyphicon glyphicon-usd"></span> &nbsp;电费结算</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> &nbsp;运维支出</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-wrench"></span> &nbsp;生产计划</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <span>台帐视图</span> <i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span> &nbsp;电站台帐</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-cog"></span> &nbsp;运行配置</a></li>
                  </ul>
                </li>
              </ul>
            </section>
       </aside>
       -->
             <div id="sidebar">
        <ul class="sidebar-menu">
          <li class="treeview">
            <a class="treeview-item"href="#">
              消息中心
              <i class="fa fa-caret-right active-right"></i>
            </a>
            <ul class="treeview-menu none">
              <li><a href="#"><i class="fa fa-calendar icon"></i>消息列表</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a class="treeview-item"href="#">
              监控视图
              <i class="fa fa-caret-right active-right"></i>
            </a>
            <ul class="treeview-menu none"style="">
              <li><a href="power_station_monitor"><i class="fa fa-dashboard fa-fw icon"></i>电站监控</a></li>
              <li><a href="layout_view"><i class="fa fa-th-list fa-fw icon"></i>布局视图</a></li>
              <li><a href="list_view"><i class="fa fa-reorder fa-fw icon"></i>列表视图</a></li>
              <li><a href="trouble_alarm"><i class="fa fa-bell fa-fw icon"></i>故障报警</a></li>
              <li><a href="running_log"><i class="fa fa-list-ol fa-fw icon"></i>运行日志</a></li>
              <li><a href="history_data_query"><i class="fa fa-history fa-fw icon"></i>历史数据查询</a></li>
              <li><a href="power_station_trend"><i class="fa fa-area-chart fa-fw icon"></i>电站功率趋势图</a></li>
              <li><a href="device_power_trend"><i class="fa fa-line-chart fa-fw icon"></i>设备功率趋势图</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a class="treeview-item"href="#">
              分析视图
              <i class="fa fa-caret-right active-right"></i>
            </a>
            <ul class="treeview-menu none">
              <li><a href="<?php echo U('AnalysisView/overview');?>"><i class="fa fa-th-large fa-fw icon"></i>概览</a></li>
              <li><a href="<?php echo U('AnalysisView/powerGeneration');?>"><i class="fa fa-bar-chart-o fa-fw icon"></i>发电量</a></li>
              <li><a href="#"><i class="fa fa-tint fa-fw icon"></i>气象资讯</a></li>
              <li><a href="#"><i class="fa fa-wrench fa-fw icon"></i>故障统计</a></li>
              <li><a href="#"><i class="fa fa-cog fa-fw icon"></i>设备性能</a></li>
              <li><a href="#"><i class="fa fa-ge fa-fw icon"></i>综合评估</a></li>
              <li><a href="#"><i class="fa fa-sort-numeric-asc fa-fw icon"></i>排名</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a class="treeview-item"href="#">
              管理视图
              <i class="fa fa-caret-right active-right"></i>
            </a>
            <ul class="treeview-menu none">
              <li><a href="#"><i class="fa fa-yen fa-fw icon"></i>电费结算</a></li>
              <li><a href="#"><i class="fa fa-credit-card fa-fw icon"></i>运维支出</a></li>
              <li><a href="#"><i class="fa fa-cogs fa-fw icon"></i>生产计划</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a class="treeview-item"href="#">
              台帐视图
              <i class="fa fa-caret-right active-right"></i>
            </a>
            <ul class="treeview-menu none">
              <li><a href="#"><i class="fa fa-university fa-fw icon"></i>电站台帐</a></li>
              <li><a href="#"><i class="fa fa-anchor  fa-fw icon"></i>运行配置</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <!-- 主要内容 -->
    <div id="right" >
    <div class="right_d">
    	<!-- 电站监控的标题 -->
    	<div class="right1_d">
    		<div class="right1_left">
    			<ul class="right1_ul1">
    				<li >
    					<span style="background:#16da16;border-radius: 50%;width: 10px;height: 10px;display: inline-block;margin-right:5px;margin-top:8px;"></span>
    				</li>
    				<li >
    					<span style="font-size: 20px;color: #000000;">苏州4#电站</span>
    					<span>[切换]</span>
    				</li>
    				<li style="margin-left:20px;margin-top:6px">
    					<span>定位</span>
    				</li>
    				<li style="margin-left:20px;margin-top:6px">
    					<span>实景图</span>
    				</li>
    				
    			</ul>
            	<ul style="padding-left:20px;bottom:10px;">
    				<span>最后更新于 2016-11-29 15:24:42</span>
    			</ul>
    		</div>
 
    		<div class="right1_right">
    			<div class="right1_right_div">
    				<div style="padding-top:10px">
    					<span class="right1_right_span1">1</span>
    				</div>
    				<div>
    					<span class="right1_right_span2">电站数量</span>
    				</div>
    			</div>
    			<div class="right1_right_div">
    				<div style="padding-top:10px">
    					<span class="right1_right_span1">25</span>
    					<span class="right1_right_span3">kw</span>
    				</div>
    				<div >
    					<span class="right1_right_span2">总装机量</span>
    				</div>
    			</div>
    			<div class="right1_right_div">
    				<div style="padding-top:10px">
    					<span class="right1_right_span1">5.4299</span>
    					<span class="right1_right_span3">万度</span>
    				</div>
    				<div>
    					<span class="right1_right_span2">累计发电量</span>
    				</div>
    			</div>
    			<div class="right1_right_div">
    				<div style="padding-top:10px">
    					<span class="right1_right_span1">42.624</span>
    					<span class="right1_right_span3">吨</span>
    				</div>
    				<div>
    					<span class="right1_right_span2">二氧化碳减排</span>
    				</div>
    			</div>
    		</div>
    		
    	</div>

    	<!--  实时功率累计发电量的div  -->
    	<div class="right2_d" style="overflow:auto;">
    		<!--第1个矩形框-->
    		<div class="right2_div">
    			<div class="right2_div2_setbkcolor" style="background-color:#E74C3C;">
    				<div class="right2_div3">
    					<div class="right2_div5">
    						<img src="/hahaha/thinkphp/Public/images/right2_power.png" style="vertical-align: middle;width:100%;max-width:80px;padding-top:5px;">
    					</div>
    					<div class="right2_div6">
    						<div>
    							<span style="color:#FFFFFF;margin:0;padding:0;">实时功率</span>
    						</div>
    						<div style="padding:0;height:55px;">
    							<span style="font-size:42px;color:#FFFFFF;">9.8</span>
    							<span style="font-size:30px;color:#FFFFFF;padding:0;"">kw</span>
    						</div>
    					</div>
    				</div>
    				<div class="right2_div4">
    					<div class="right2_div8">
    						<span style="display:block;color:#FFFFFF;margin-top:20px;font-size:15px;">出力比</span>
    						<span style="display:block;color:#FFFFFF;font-size:18px;">45.2%</span>
    					</div> 
    					<div class="right2_div9">
    						<span style="display:block;color:#FFFFFF;margin-top:20px;font-size:15px;">光照强度</span>
    						<span style="display:block;color:#FFFFFF;font-size:18px;">608W/m2</span>
    					</div>
    				</div>
    			</div>
    		</div>
    		<!--第2个矩形框-->
    		<div class="right2_div">
    			<div class="right2_div2_setbkcolor" style="background-color:#1CAF9A;">
    				<div class="right2_div3">
    					<div class="right2_div5">
    						<img src="/hahaha/thinkphp/Public/images/right2_dayelec.png" style="vertical-align: middle;width:100%;max-width:80px;padding-top:5px;">
    					</div>
    					<div class="right2_div6">
    						<div>
    							<span style="color:#FFFFFF;margin:0;padding:0;">日发电量</span>
    						</div>
    						<div style="padding:0;height:55px;">
    							<span style="font-size:42px;color:#FFFFFF;">24.2</span>
    							<span style="font-size:30px;color:#FFFFFF;padding:0;"">度</span>
    						</div>
    					</div>
    				</div>
    				<div class="right2_div4">
    					<div class="right2_div8">
    						<span style="display:block;color:#FFFFFF;margin-top:20px;font-size:15px;">日辐射总量</span>
    						<span style="display:block;color:#FFFFFF;font-size:18px;">2.539kWh/m2</span>
    					</div> 
    					<div class="right2_div9">
    						<span style="display:block;color:#FFFFFF;margin-top:20px;font-size:15px;">日发电小时数</span>
    						<span style="display:block;color:#FFFFFF;font-size:18px;">1h</span>
    					</div>
    				</div>
    			</div>
    		</div>
    		<!--第3个矩形框-->
    		<div class="right2_div">
    			<div class="right2_div2_setbkcolor" style="background-color:#428BCA;">
    				<div class="right2_div3">
    					<div class="right2_div5">
    						<img src="/hahaha/thinkphp/Public/images/right2_monthelec.png" style="vertical-align: middle;width:100%;max-width:80px;padding-top:5px;">
    					</div>
    					<div class="right2_div6">
    						<div>
    							<span style="color:#FFFFFF;margin:0;padding:0;">月累计发电量</span>
    						</div>
    						<div style="padding:0;height:55px;">
    							<span style="font-size:42px;color:#FFFFFF;">1988.8</span>
    							<span style="font-size:30px;color:#FFFFFF;padding:0;"">度</span>
    						</div>
    					</div>
    				</div>
    				<div class="right2_div4">
    					<div class="right2_div8">
    						<span style="display:block;color:#FFFFFF;margin-top:20px;font-size:15px;">月辐射总量</span>
    						<span style="display:block;color:#FFFFFF;font-size:18px;">110.13kWh/m2</span>
    					</div> 
    					<div class="right2_div9">
    						<span style="display:block;color:#FFFFFF;margin-top:20px;font-size:15px;">月发电小时数</span>
    						<span style="display:block;color:#FFFFFF;font-size:18px;">79.6h</span>
    					</div>
    				</div>
    			</div>
    		</div>
    		<!--第4个矩形框-->
    		<div class="right2_div">
    			<div class="right2_div2_setbkcolor" style="background-color:#1D2939;">
    				<div class="right2_div3">
    					<div class="right2_div5">
    						<img src="/hahaha/thinkphp/Public/images/right2_yearelec.png" style="vertical-align: middle;width:100%;max-width:80px;padding-top:5px;">
    					</div>
    					<div class="right2_div6">
    						<div>
    							<span style="color:#FFFFFF;margin:0;padding:0;">年累计发电量</span>
    						</div>
    						<div style="padding:0;height:55px;">
    							<span style="font-size:42px;color:#FFFFFF;">2.7547</span>
    							<span style="font-size:30px;color:#FFFFFF;padding:0;"">万度</span>
    						</div>
    					</div>
    				</div>
    				<div class="right2_div4">
    					<div class="right2_div8">
    						<span style="display:block;color:#FFFFFF;margin-top:20px;font-size:15px;">年辐射总量</span>
    						<span style="display:block;color:#FFFFFF;font-size:18px;">1.5238MWh/m2</span>
    					</div> 
    					<div class="right2_div9">
    						<span style="display:block;color:#FFFFFF;margin-top:20px;font-size:15px;">年发电小时数</span>
    						<span style="display:block;color:#FFFFFF;font-size:18px;">1101.9h</span>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>

    	<!-- 功率曲线图的div  -->
    	<div class="right3_d"> 
    		<div id="line_chart1" class="right3_div1_whitebg">
    			<div id="line_chart2" style="top:20px;width:100%;height:100%;background-color: #FFFFFF;">
    			</div>
    		</div>
    		<div id="right_bottom">
    		</div>
      
    	</div>


    </div>
    </div>

    <script type="text/javascript" src="/hahaha/thinkphp/Public/Static/Jquery/jquery.min.js"></script>
    <script src="/hahaha/thinkphp/Public/script/station/echarts.js"></script>
    <script src="/hahaha/thinkphp/Public/script/station/bootstrap.min.js"></script>
    <script src="/hahaha/thinkphp/Public/script/station/sidebar.js"></script>
    <script src="/hahaha/thinkphp/Public/script/station/header_public.js"></script>
    <script src="/hahaha/thinkphp/Public/script/station/power_station_monitor.js"></script>
    
  </body>
</html>