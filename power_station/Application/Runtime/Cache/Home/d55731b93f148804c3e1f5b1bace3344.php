<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>数据可视化</title>

    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Static/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Static/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/main.css">

    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/sidebar-menu.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/menu.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/pp-hmx.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/analyData.css">

    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/operational_expenses.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/mmGrid.css">
    <link type="image/x-icon" rel="shortcut icon" href="http://localhost:8080/hahaha/thinkphp/Public/images/favicon.ico">
  </head>
  <body>
  	
    <!-- 顶部导航条 -->
    <div id="topbar">
      <nav class="navbar navbar-default" rol="navigation" style="height: 50px; background-color: rgb(255,255,255);">
        <div class="container-fluid" style="text-align: center;">
          <span style="line-height: 50px; font-size: 25px; color:black;">数据可视化中心</span>
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
             <p style="margin-top:-2px"><img alt="brand" style="width:25px;height:25px" src="http://localhost:8080/hahaha/thinkphp/Public/images/pc_header_logo.png" > &nbsp;新能云</p>
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
                    <i class="icon-user" style="vertical-align: middle;color:black;cursor:pointer"></i>
                    <span class="yanshi" style="text-align:center;color:black;cursor:pointer">演示用户</span>
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
      <aside class="main-sidebar">
      <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="treeview">
              <a href="#">
                <span>消息中心</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="http://localhost:8080/hahaha/thinkphp/Home/Station/news_list"><span class="glyphicon glyphicon-calendar"></span> &nbsp;消息列表</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <span>监控视图</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="http://localhost:8080/hahaha/thinkphp/Home/Station/power_station_monitor"><span class="glyphicon glyphicon-eye-open"></span> &nbsp;电站监控</a></li>
                <li><a href="http://localhost:8080/hahaha/thinkphp/Home/Station/layout_view"><span class="glyphicon glyphicon-th"></span> &nbsp;布局视图</a></li>
                <li><a href="http://localhost:8080/hahaha/thinkphp/Home/Station/list_view"><span class="glyphicon glyphicon-align-justify"></span> &nbsp;列表视图</a></li>
                <li><a href="http://localhost:8080/hahaha/thinkphp/Home/Station/trouble_alarm"><span class="glyphicon glyphicon-bell"></span> &nbsp;故障报警</a></li>
                <li><a href="http://localhost:8080/hahaha/thinkphp/Home/Station/running_log"><span class="glyphicon glyphicon-list"></span> &nbsp;运行日志</a></li>
                <li><a href="http://localhost:8080/hahaha/thinkphp/Home/Station/history_data_query"><span class="glyphicon glyphicon-repeat"></span> &nbsp;历史数据查询</a></li>
                <li><a href="http://localhost:8080/hahaha/thinkphp/Home/Station/power_station_trend"><span class="glyphicon glyphicon-text-height"></span> &nbsp;电站功率曲线</a></li>
                <li><a href="http://localhost:8080/hahaha/thinkphp/Home/Station/device_power_trend"><span class="glyphicon glyphicon-text-height"></span> &nbsp;设备功率曲线</a></li>
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
    </div>

    <!-- 主要内容 -->
    <div id="right" >
    <div class="right_m">
    	<div>
            <div class="right-top">
                <span class="text-top" style="padding-left: 10px;">龙游瑞源光伏电站</span>
                <span style="cursor:pointer;color: #428bca;">[切换]</span>
            </div>   
            <div style="padding:10px">
                <div class="panel" style="border-color:#dee5e7;border-radius: 2px;margin-bottom: 15px;">
                    <div class="col-sm-12 panel" style="padding-left:0px;padding-right:0px">
                        <div class="row" style="padding:15px">
                            <div class="col-sm-4" style="width:155px;margin-bottom:5px;margin-right:10px">
                                <button class="btn btn-sm btn-in">新增</button>
                                <button class="btn btn-sm btn-on">批量删除</button>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-sm-9">
                                    <div class="input-group" style="padding-right:10px">
                                        <input type="text" id="keyWords" class="input-sm form-control" style="width:159px;" placeholder="关键字">
                                        <span class="input-group-btn">
                                           <button class="btn btn-sm btn-in" id="searchBtn" type="button">查询</button>         
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 pull-right">
                                <div class="col-sm-12 no-padder" style="min-width: 375px;">
                                    <ul class="pull-right pagination pagination-sm no-padder m-n bg-white2" style="background-color: transparent!important;padding:0px;margin:0px">
                                        <li >
                                            <a style="height:28px;border-radius:4px;margin-right:3px"><i class="fa fa-angle-left"></i></a>
                                        </li>
                                        <!-- <li ng-repeat="page in pages" ng-class="{active: isActive(page)}">
                                            <a ng-click="selectPage(page)"><span ng-bind="page"></span></a>
                                        </li> -->
                                        <li>
                                            <input class="form-control pull-left text-center ng-pristine ng-untouched ng-valid" ng-model="goPageNum" style="width: 40px;height: 28px;padding: 0 5px;display: inline-block;" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                            <a class="btn" ng-click="goPage()" style="width: 35px;padding: 5px 3px;margin-left:5px;height:28px;background-color: #1caf9a;color:#fff">跳转</a>
                                        </li>
                                        <li>
                                            <a style="height:28px;border-radius:4px;margin-left:5px;"><i class="fa fa-angle-right"></i></a>
                                        </li>
                                    </ul>
                                    <span class="note_task">
                                        <span class=" pull-right">
                                            <small style="float: left;margin-top:8px;margin-right:5px;" class="text-muted m-l-xs m-r-xs font-h6">每页显示 :</small>
                                            <select id="pageSizeSelect" style="float: left;width:45px;height:30px;padding:0px;margin-right:8px;" class="form-control ng-pristine ng-untouched ng-valid" >
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                            <small class="text-muted inline m-b-sm m-l-sm m-r-sm font-h6" style="margin-top:8px;margin-right:8px">
                                            页数<span ng-bind="currentPage" class="ng-binding">0</span> / <span ng-bind="totalPage" class="ng-binding">0</span>
                                                    <!-- <span ng-bind="total"></span>条记录) -->
                                            </small>
                                        </span>
                                    </span>
                                </div>
                            </div>    
                        </div>

                        <table id="result_table" class="table table-striped b-t b-light">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">
                                        <label class="i-checks m-b-none">
                                            <input type="checkbox" id="all" style="display:none"><i></i>
                                        </label>
                                    </th>
                                    <th>电站名称</th>
                                    <th style="text-align: center;">支出单号</th>
                                    <th style="text-align: center;">支出项目</th>
                                    <th style="text-align: right;">支出时间</th>
                                    <th style="text-align: right;">结算金额（元）</th>
                                    <th>支出人</th>
                                    <th>操作</th> 
                                </tr>
                            </thead>
                            <tbody>
                <!-- ngRepeat: vo in data -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://localhost:8080/hahaha/thinkphp/Public/script/station/bootstrap.min.js"></script>
    <script src="http://localhost:8080/hahaha/thinkphp/Public/script/station/sidebar-menu.js"></script>
    <script src="http://localhost:8080/hahaha/thinkphp/Public/script/station/header_public.js"></script>
        <script>
      $.sidebarMenu($('.sidebar-menu'))
    </script>
    <script src="http://localhost:8080/hahaha/thinkphp/Public/script/station/mmGrid.js"></script>
    <script src="http://localhost:8080/hahaha/thinkphp/Public/script/station/listview_table.js"></script>
  </body>
</html>