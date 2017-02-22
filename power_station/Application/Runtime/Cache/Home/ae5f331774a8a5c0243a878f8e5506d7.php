<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新能云</title>
     <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Static/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/sidebar-menu.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/menu.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/app-hmx.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/analyData.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/main.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/layout_view.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/list_view.css">

    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/trouble_alarm.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/running_log.css">

    <link rel="stylesheet" type="text/css" href="http://localhost:8080/hahaha/thinkphp/Public/style/station/jquery.datetimepicker.css">
  </head>
  <body>
    
    <!-- 顶部菜单栏 -->
     <div id="topbar">
      <nav class="navbar navbar-default" rol="navigation" style="height: 50px; background-color: rgb(255,255,255);">
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

    <!-- 左侧菜单栏 -->
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

    <div id="right">
      <div class="container-fluid no-padding">

        <!-- 主内容标题栏 -->
        <div class="col-sm-12 overview-title">
          <div class="pull-left overview-title-font">
            <span>龙游瑞源光伏电站</span>
          </div>
        </div>

        <div id="main-content" class="col-sm-12 main-padding">
          
          <!-- 面板 -->
          <div class="row padding-left-right cp">
            <div class="col-sm-12 no-padding no-margin panel">
              
              <!-- 天气 -->
              <div class="col-sm-3 no-padding">
                <img class="img" src="http://localhost:8080/hahaha/thinkphp/Public/images/any.png">
                <div class="anaWea">
                  <div class="text-center" style="margin-top: 26px;">
                    <img src="http://localhost:8080/hahaha/thinkphp/Public/images/sun-icon.png">
                  </div>
                  <p class="text-center sunny-days">晴天数14</p>
                  <div class="clearfix">
                    <div class="pull-left" style="padding: 0px 15px;">
                      辐射总量
                      <span class="ng-binding">49.89</span>
                      <span class="unit-font">
                        kwh/m
                        <sup>2</sup>
                      </span>
                    </div>
                    <div class="pull-right sunny-time" style="padding: 0px 15px;">
                      日照小时
                      <span>105.8</span>
                      <span class="unit-font">h</span>
                    </div>
                  </div>
                </div>
                <ul class="weather-paracon">
                  <li class="weather-para">
                    <span>
                      <img src="http://localhost:8080/hahaha/thinkphp/Public/images/1.png">
                    </span>
                    <span class="weather">晴</span>
                    <span class="num">14</span>
                  </li>
                  <li class="weather-para">
                    <span>
                      <img src="http://localhost:8080/hahaha/thinkphp/Public/images/2.png">
                    </span>
                    <span class="weather">阴</span>
                    <span class="num">14</span>
                  </li>
                  <li class="weather-para">
                    <span>
                      <img src="http://localhost:8080/hahaha/thinkphp/Public/images/3.png">
                    </span>
                    <span class="weather">雨</span>
                    <span class="num">14</span>
                  </li>
                  <li class="weather-para">
                    <span>
                      <img src="http://localhost:8080/hahaha/thinkphp/Public/images/4.png">
                    </span>
                    <span class="weather">雪</span>
                    <span class="num">14</span>
                  </li>
                  <li class="weather-para">
                    <span>
                      <img src="http://localhost:8080/hahaha/thinkphp/Public/images/5.png">
                    </span>
                    <span class="weather">霾</span>
                    <span class="num">14</span>
                  </li>
                  <li class="weather-para">
                    <span>
                      <img src="http://localhost:8080/hahaha/thinkphp/Public/images/6.png">
                    </span>
                    <span class="weather">其他</span>
                    <span class="num">14</span>
                  </li>
                </ul>
              </div>

              <div class="col-sm-9 up-right">
                <div class="col-sm-12 no-padding">
                  
                  <!-- 右侧面板：PBA -->
                  <div class="col-sm-3 text-center">
                    <div class="col-sm-12 item">
                      <span class="no-padding col-sm-12">PBA</span>
                      <div id="PBA" class="col-sm-12 no-padder" style="margin-top: 20px;"></div>
                    </div>
                  </div>
                  
                  <!-- 右侧面板：PR -->
                  <div class="col-sm-3 text-center">
                    <div class="col-sm-12 item">
                      <span class="no-padding col-sm-12">PR</span>
                      <div id="PR" class="col-sm-12 no-padder" style="margin-top: 20px;"></div>
                    </div>
                  </div>

                  <!-- 右侧面板：故障损失 -->
                  <div class="col-sm-3">
                    <div class="col-sm-12 item">
                      <div class="row-sm-6 below">
                        <p class="text-center right-title">故障损失</p>
                        <p class="right-font no-margin">故障率</p>
                        <p class="right-num red no-margin">0</p>
                      </div>
                      <div class="row-sm-6">
                        <p class="right-font no-margin">损失电量</p>
                        <p class="right-num red no-margin" style="padding-bottom: 20px;">0度</p>
                        <div class="rows">
                          <div class="col-sm-6 text-left no-padding">MTTR -h</div>
                          <div class="col-sm-6 text-right no-padding">MTBF -h</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 右侧面板：发电情况 -->
                  <div class="col-sm-3">
                    <div class="col-sm-12 item">
                      <div class="row-sm-6 below">
                        <p class="text-center right-title">发电情况</p>
                        <p class="right-font no-margin">发电量</p>
                        <p class="right-num green no-margin">43.34万度</p>
                      </div>
                      <div class="row-sm-6">
                        <p class="right-font no-margin">发电小时数</p>
                        <p class="right-num green no-margin" style="padding-bottom: 20px;">43.3h</p>
                        <div class="rows">
                          <div class="col-sm-6 text-left no-padding">总装机容量</div>
                          <div class="col-sm-6 text-right no-padding">10MW</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="below"></div>

          <!-- 图表 -->
          <div class="row row-xs">
            <div class="col-sm-12 panel no-margin" style=" min-height: 450px; height: 100%;">
              <div id="powerEfficId" style="padding: 15px;">
                <div id="kwhChart" >
                  <span style="font-size: 14px;">发电量分析</span>
                  <span class="pull-right">
                    <span class="m-r-xs">
                      <i class="fa fa-circle m-r-xs" style="color:#fe9700"></i>
                      实际发电量
                    </span>
                    <span class="m-r-xs">
                      <i class="fa fa-circle m-r-xs" style="color:#ffc400"></i>
                      应发电量
                    </span>
                    <span class="m-r-xs">
                      <i class="fa fa-minus m-r-xs" style="color:#6b008e"></i>
                      月计划完成率
                    </span>
                    <button id="kwhChartBtn" class="btn btn-sm btn-info">数据表格 ></button>
                  </span>
                  <div id="kwhTotalMReport" style="width: 100%;height:440px;"></div>
                </div>
                <div id="kwhTable" class="hidden">
                  <span style="font-size: 14px;">发电量分析</span>
                  <span class="pull-right">
                    <button id="kwhTableBtn" class="btn btn-sm btn-info">数据图表 ></button>
                  </span>
                  <table class="table table-striped b-light">
                    <thead>
                      <tr>
                        <th class="text-center">日期</th>
                        <th class="text-center">实际发电量(kwh)</th>
                        <th class="text-center">应发电量(kwh)</th>
                        <th class="text-center">月累计发电量(kwh)</th>
                        <th class="text-center">计划发电量(kwh)</th>
                        <th class="text-center">计划完成率(%)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">2017-02-01</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                      </tr>
                      <tr>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                      </tr>
                      <tr>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                      </tr>
                      <tr>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                      </tr>
                      <tr>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                        <td class="text-center">4487</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>

      </div>
    </div>
   <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script> 
    <script src="http://localhost:8080/hahaha/thinkphp/Public/script/station/bootstrap.min.js"></script>
    <script src="http://localhost:8080/hahaha/thinkphp/Public/script/station/sidebar-menu.js"></script>
    <script type="text/javascript" src="http://localhost:8080/hahaha/thinkphp/Static/echarts/dist/echarts.js"></script>
    <script type="text/javascript">
      //日期
      var days = ['01','02','03','04','05','06','07','08','09','10',
                  '11','12','13','14','15','16','17','18','19','20'];

      //实际发电量
      var actualPower = ['4487','10159.2','15034','11245.8','8222.7','33451.9','19669.1',
                        '5487','13159.2','5034','11245.8','8222.7','33451.9','19669.1',
                        '4487','10159.2','15034','11245.8','8222.7','33451.9'];

      //应发电量
      var demandPower = ['4493.1','9462.3','13765.9','9980.8','3487.6','30393.8','18741.2',
                        '5493.1','12462.3','3765.9','9980.8','3487.6','30393.8','18741.2',
                        '4493.1','9462.3','13765.9','9980.8','3487.6','30393.8'];

      //月计划完成率
      var monthCompleteness = ['0','0','0','0','0','0','0','0','0','0','0','0','0','0','0',
      '0','0','0','0','0','0',];

      var kwhTotalMReport = echarts.init(document.getElementById('kwhTotalMReport'));
      var option = {
        tooltip : {
          trigger: 'axis',
          axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'line',// 默认为直线，可选为：'line' | 'shadow'
            lineStyle: {
               color: '#c3c3c3',
            }
          }
        },
        grid: {
          left: 60,
          right: 60,
          botton: 0,
        },
        xAxis: {
          type: 'category',
          data: days,
          axisLine: {
            lineStyle: {
              color: '#C2C2C2'
            }
          },
          axisTick: [{
              show: 'false',
              alignWithLabel: 'true'
          }]
        },
        yAxis: [
          {
            type: 'value',
            name: 'kWh',
            min: '0',
            max: '40000',
            axisLine: {
              lineStyle: {
                color: '#C2C2C2'
              }
            },
            axisTick: [{
              show: 'false',
              alignWithLabel: 'true'
            }],
            splitLine: [{
              show: 'false',
            }],

          },
          {
            type: 'value',
            name: '%',
            min: '0',
            max: '5',
            axisLine: {
              lineStyle: {
                color: '#C2C2C2'
              }
            },
            axisTick: [{
              show: 'false',
              alignWithLabel: 'true'
            }],
            splitLine: [{
              show: 'false',
            }],

          },
        ],
        series: [
          {
              name: '实际发电量',
              type: 'bar',
              barWidth: '15px',
              data: actualPower,
              itemStyle:{  
                normal:{color:'#fe9700'},
                emphasis:{color:'#feb64c'}  
              }  
          },
          {
              name: '应发电量',
              type: 'bar',
              barWidth: '15px',
              barGap: '0',
              data: demandPower,
              itemStyle:{  
                normal:{color:'#ffc400'},
                emphasis:{color:'#ffd54c'}  
              } 
          },
          {
              name: '月计划完成率',
              type: 'line',
              yAxisIndex: 1,
              data: monthCompleteness,
              itemStyle:{  
                normal:{color:'#9565aa'},  
              }
          }
        ]
      };

      // 使用刚指定的配置项和数据显示图表。
      kwhTotalMReport.setOption(option);

      setTimeout(function (){
        window.onresize = function () {
            kwhTotalMReport.resize();
        }
      },200)
    </script>
    <script src="http://localhost:8080/hahaha/thinkphp/Public/script/station/radialIndicator.js"></script>
    <script type="text/javascript">
      //进度条
      $('#PBA').radialIndicator({
        barColor: '#87CEEB',
        barWidth: 10,
        initValue: 40,
        percentage: true,
        radius:65,
        barColor:'#52b4fb',
        barBgColor:'#CCCCCC',
        fontSize: 25
      });
      $('#PR').radialIndicator({
        barColor: '#87CEEB',
        barWidth: 10,
        initValue: 80,
        percentage: true,
        radius:65,
        barColor:'#52b4fb',
        barBgColor:'#CCCCCC',
        fontSize: 25
      });

      //图表切换
      $("#kwhTableBtn").click(function() {
        $("#kwhTable").addClass('hidden');
        $("#kwhChart").removeClass("hidden");
      });
      $("#kwhChartBtn").click(function() {
        $("#kwhTable").removeClass('hidden');
        $("#kwhChart").addClass("hidden");
      });
    </script>
  </body>

</html>