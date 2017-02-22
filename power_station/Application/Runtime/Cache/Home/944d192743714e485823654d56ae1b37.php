<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>数据可视化</title>
    <link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/Static/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/Static/simple-line-icons-master/css/simple-line-icons.css" >
    <link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/style/main.css">
    <link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/Static/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/style/station/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/style/station/menu.css">
    <link rel="stylesheet" type="text/css" href="/XinNengYun/power_station/Public/style/station/power_station_monitor.css">
    <link type="image/x-icon" rel="shortcut icon" href="/XinNengYun/power_station/Public/images/favicon.ico">
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
    	<!-- 布局视图的标题 -->
    	<div class="lv_title1">
            <span style="color: #1e3e50;font-size: 16px;margin: 0;padding-left:10px;line-height:50px;">苏州4#电站</span>
            <span style="cursor:pointer;color:#428bca;">[切换]</span>
        
        </div>

        <div class="lv_content11" style="background-color: #F0F3F4;height:700px;">
            <div class="trouble_alarm_right2">
              <div class="anjibie">
                <div class="anjibie1">
                  <div style="padding-top:15px;">
                    <img src="/XinNengYun/power_station/Public/images/anjibie.png">
                  </div>
                  <span style="color:#ffffff;font-size:16px;">按级别</span>
                </div>
                <div class="anjibie2">
                  <span class="text_center">故障</span>
                  <span class="number">0</span>
                </div>
                <div class="anjibie3">
                  <span class="text_center">报警</span>
                  <span class="number">10</span>
                </div>
              </div>
              <div class="anshebei">
                <div class="anshebei1">
                  <div style="padding-top:15px;">
                    <img src="/XinNengYun/power_station/Public/images/anshebei.png">
                  </div>
                  <span style="color:#ffffff;font-size:16px;">按设备</span>
                </div>
                <div class="anshebei2">
                  <span class="text_center">汇流箱</span>
                  <span class="number">0</span>
                </div>
                <div class="anshebei3">
                  <span class="text_center">逆变器</span>
                  <span class="number">0</span>
                </div>
                <div class="anshebei4">
                  <span class="text_center">箱变</span>
                  <span class="number">0</span>
                </div>
                <div class="anshebei5">
                  <span class="text_center">其他</span>
                  <span class="number">0</span>
                </div>
              </div>
              <div class="anshijian">
                <div class="anshijian1">
                   <div style="padding-top:15px;">
                    <img src="/XinNengYun/power_station/Public/images/anshijian.png">
                  </div>
                  <span style="color:#ffffff;font-size:16px;">按时间</span>
                </div>
                <div class="anshijian2">
                  <span class="text_center">4小时以上</span>
                  <span class="number">0</span>
                </div>
                <div class="anshijian3">
                  <span class="text_center">2小时以上</span>
                  <span class="number">0</span>
                </div>
                <div class="anshijian4">
                  <span class="text_center">2小时以内</span>
                  <span class="number">0</span>
                </div>
              </div>
            </div>

            <div class="chaxun" style="padding:40px;">
                
                <div style="float:right;">
                    <ul class="list_view_ul">
                        <li>
                          <img style="cursor:pointer;" src="/XinNengYun/power_station/Public/images/button_left.png">
                        </li>
                        <li>
                          <input type="text" name="" class="listview_shuru2">
                        </li>
                        <li>
                          <a href="" class="listview_a">跳转</a>
                        </li>
                        <li>
                          <img style="cursor:pointer;" src="/XinNengYun/power_station/Public/images/button_right.png">
                        </li>
                    </ul>
                    <span style="float:right;">
                        <small class="meiyexianshi">每页显示:</small>
                        <select class="listview_select">
                          <option checked value="10">10</option>
                          <option value="20">20</option>
                          <option value="20">30</option>
                          <option value="20">50</option>
                          <option value="20">100</option>
                        </select>
                        <small class="meiyexianshi">页数1/1</small>

                    </span>
                </div>
            </div>
            <div class="trouble_alarm_table">
              <table id="troublealarm_table1" class="troublealarm_table1c">
                
              </table>
             
            </div>

             <!-- 在mmgrid.css设置样式，在listview_table.js中设置数据 -->
           <!--  <div class="biaoge">
              <div class="biaoge2">
                <table class="table_c" id="table3-1"></table> 
              </div>
            </div>
 -->
        </div>

        
          

        </div>

    </div>
    </div>

    <script type="text/javascript">
      function decodeMessage(){
      var tmp="";
      tmp+="<th class=\"th1\">设备名称</th><th class=\"th1\">故障类型</th><th class=\"th1\">设备类型</th><th class=\"th2\">故障发生时间</th><th class=\"th2\">故障描述</th><th class=\"th1\">持续时间</th>"
      for(j=0;j<=5;j++){
        tmp+="<tr>";
        
        tmp+= "<td>"+"WD02B-5-A-12"+"</td>"+
              "<td>"+"报警"+"</td>"+
              "<td>"+"汇流箱"+"</td>"+
              "<td>"+"2017-02-07 08:08:58"+"</td>"+
              "<td>"+"第15路电流异常"+"</td>"+
              "<td>"+"4小时以上"+"</td>";
      
        tmp+="<tr>";
      }
     
         document.getElementById("troublealarm_table1").innerHTML=tmp;
     }
     decodeMessage();
    </script> 
    <script type="text/javascript" src="/XinNengYun/power_station/Public/Static/Jquery/jquery.min.js"></script>
    <script src="/XinNengYun/power_station/Public/script/station/sidebar.js"></script>
    <script src="/XinNengYun/power_station/Public/script/station/bootstrap.min.js"></script>
    <script src="/XinNengYun/power_station/Public/script/station/mmGrid.js"></script>
    <script src="/XinNengYun/power_station/Public/script/station/listview_table.js"></script>
    <script src="/XinNengYun/power_station/Public/script/station/header_public.js"></script>
  </body>
</html>