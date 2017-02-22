var myChart = echarts.init(document.getElementById('line_chart2'));
            

var data1=[];
var data2=[];
var date1=[];

    $.ajax({
        type: "POST",
        url: "http://localhost:8080/hahaha/thinkphp/Home/Station/power_energy",
        data: "",
        async:false,
        success:function(data){
            //console.log(data);
            if(data!=null){
                for(var j=6;j<22;j++){
                    for(var i=0;i<60;i++){
                        if(j<10&&i<10){
                            date1.push("0"+j+":"+"0"+i);
                        }else if(j<10&&i>=10){
                            date1.push("0"+j+":"+i);
                        }else if(j>=10&&i<=10){
                            date1.push(j+":"+"0"+i);
                        }else{
                            date1.push(j+":"+i);
                        }
                    }
                }
                date1.push('18:00');
                for(var i=0;i<data.length;i++){
                    //console.log(data[i]['power']);
                    data1.push(data[i]['power']);
                    data2.push(data[i]['energy']);
                }
            }
        }
    });


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
        // 	show: false
        // }
        axisLabel: {
            interval:59,  //数据间隔显示
        },
        splitLine: {
                show: false
            },
        data:date1,
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
            data:data1,
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
            data:data2,
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