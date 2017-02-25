
// $('.power_station_monitor_power').text("123");
calculateHeight();


getFirstLineData();

getPowerEnergy();


function calculateHeight(){
    var height = $(".right_d").outerHeight()-$(".right1_d").outerHeight()-$(".right2_d").outerHeight();
    $(".right3_d").height(height); 

    // console.log(height);
}

function getFirstLineData(){
    var tmpdata=[];
    $.ajax({
        type: "POST",
        url: "power_energy_monitor_firstLine",
        toServerData: "",
        async:false,
        success:function(data){
            // console.log(data[0]['powerstation_num']);
            if(data!=null){
                $(".right1_right_span1_1").text(data[0]['powerstation_num']);
                $(".right1_right_span1_2").text(data[0]['install_num_total']);
                $(".right1_right_span1_3").text(data[0]['electricity_total']);
                $(".right1_right_span1_4").text(data[0]['co2_reduction']);
            }
            
        }
    }
    );
}

function getPowerEnergy(){
    var line_chart2_ele = document.getElementById('line_chart2');
    
    //用于使chart自适应高度和宽度,通过窗体高宽计算容器高宽
    var resizeWorldMapContainer = function () {
        line_chart2_ele.style.width = $(".right3_div1_whitebg").width()+"px";
        line_chart2_ele.style.height = $(".right3_div1_whitebg").height()+"px";
        // console.log($("#line_chart1").width);
        // console.log($("#line_chart1").height);
        // console.log( line_chart2_ele.style.height);
        // console.log(line_chart2_ele.style.width);
    }
    //设置容器高宽
    resizeWorldMapContainer();

    var myChart = echarts.init(line_chart2_ele);


    var dataPower=[];
    var dataEnergy=[];
    var date=[];

    for(var j=6;j<22;j++){
        for(var i=0;i<60;i++){
            if(j<10&&i<10){
                date.push("0"+j+":"+"0"+i);
            }else if(j<10&&i>=10){
                date.push("0"+j+":"+i);
            }else if(j>=10&&i<=10){
                date.push(j+":"+"0"+i);
            }else{
                date.push(j+":"+i);
            }
        }
    }
    date.push('18:00');

    $.ajax({
        type: "POST",
        url: "power_energy_monitor_chart",
        data: "",          //发送到服务器的数据
        async:false,       //是否异步处理
        success:function(data){
            // console.log(data);
            if(data!=null){


                for(var i=0;i<data.length;i++){
                    //console.log(data[i]['power']);
                    dataPower.push(data[i]['power']);

                    dataEnergy.push(data[i]['energy']);
                }
                // console.log(data[0]['power']);
            }
        }
    });


    //更新矩形图里的功率 发电量数据
    // console.log(dataPower.length);
    // $('.power_station_monitor_power').text("123");
    $(".power_station_monitor_power").text(dataPower[dataPower.length-1]);
    $('.power_station_monitor_dayenergy').text(dataEnergy[dataEnergy.length-1]);

/*
var data1=[];
for (var u=0;u<621;u++){
    data1.push(u);
}
for (var u=0;u<100;u++){
    data1.push('-');
}


for (var u=0;u<621;u++){
    data2.push(u+20);
}
for (var u=0;u<100;u++){
    data2.push('-');
}
*/
option = {
    title: {
        text: '    功率趋势图',
    },
    backgroundColor: '#FFFFFF',    
    tooltip: {
        trigger: 'axis'         //提示触发为x轴

    },
    legend: {              //上方可选择显示的 可点击的标题
        right: 80,
        textStyle: {
            fontSize:15,
        },
        data:['实发功率','发电量']
    },
    grid: {             //图表与周围div的间隔
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis:  {
        type: 'category',       //类目轴，即离散值
        boundaryGap: false,
        // silent: false,
        // axisTick: {
        //  show: false
        // }
        axisLabel: {
            interval:59,  //数据间隔显示
        },
        splitLine: {
            show: false
        },
        data:date,
        axisLine: {
            lineStyle:{
                // color:'#D3D3D3',
                opacity:0.5  //透明度 0时不绘制
            }
        }

    },
    yAxis: [{
        type: 'value',
        name: 'W',
        splitLine: {
            show: false
        },
        min: 0,
    },
    {
        type: 'value',
        name: 'Wh',
        splitLine: {
            show: false
        },
        min: 0,          
        // interval: 100,   //数据间隔
    }
    ],
    color:['#DD6460','#F1B25A'],
    series: [
    {
        name:'实发功率',
        type:'line',
        data:dataPower,
        symbol: 'none',
        lineStyle: {
            normal: {
                width: 1
            }
        },
    },
    {
        name:'发电量',
            yAxisIndex:1,  //将第二条线与右边的y轴相关联
            type:'line',
            data:dataEnergy,
            symbol: 'none',  //没有网格线 
            lineStyle: {            //折线宽度
                normal: {
                    width: 1
                }
            },
            
        }

        ]
    };

                // 使用刚指定的配置项和数据显示图表。
                myChart.setOption(option);
                //用于使chart自适应高度和宽度
                window.onresize = function () {
                //重置容器高宽
                resizeWorldMapContainer();
                myChart.resize();
            };
}
               

// getPowerEnergy();