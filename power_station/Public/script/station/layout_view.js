($(function(){
	var title;
	var s_color;
	var post_url;
	var hh=$('.lv_content1').height()-50-$('#b').height();
    //console.log(hh);
	var items = new Array();
	var fixed2 = function(val){
        return val.toFixed(2);
    }
    //加百分号
    var fixed2percentage = function(val){
        return fixed2(val)+'%';
    }
    //高亮
    var highliht = function(val){
        return '<span style="color: #428bca">' + val+ '</span>';
    };

    var cols3 = [
        { title:'状态', name:'zhuangtai' , align:'center', sortable: true, sortName:'secu_code'},
        { title:'编号', name:'bianhao' , align:'center',type:'number', sortable: true, sortName:'secu_abbr'},
        { title:'名称', name:'mingcheng' , align:'center', sortable: true ,sortName:'secu_mingcheng',renderer: highliht},
        { title:'时间', name:'shijian' , align:'center', sortable: true,sortName:'secu_shijian'},
        { title:'DC功率(W)', name:'DCgonglv' , align:'center',type:'number', sortable: true, renderer: fixed2},
        { title:'DC发电量(Wh)', name:'DCdianliang' , align:'center',type:'number', sortable: true, renderer: fixed2}
    ];
    var cols4 = [
        { title:'发生时间', name:'start_time' , align:'center', sortable: true, sortName:'secu_code'},
        { title:'结束时间', name:'end_time' , align:'center', sortable: true, sortName:'secu_abbr'},
        { title:'名称', name:'mingcheng' , align:'center', sortable: true ,sortName:'secu_mingcheng',renderer: highliht},
        { title:'故障级别', name:'t_level' , align:'center', sortable: true,sortName:'secu_shijian'},
        { title:'故障描述', name:'t_description' , align:'center',sortable: true},
        { title:'人工处理状态', name:'solve_state' , align:'center', sortable: true}
    ];
    //客户端排序示例
     var grid=$('#table3-1').mmGrid({
		cols: cols3,
		//items: items,
	    sortName: 'bianhao',
	    sortStatus: 'asc',
	    height:hh,
	    fullWidthRows:true,

	});
    //console.log(grid.opts.cols);

	$('.cop').tooltip();
	$('.cop').click(function(){
		title=$(this).attr('data-original-title');
		s_color=$(this).css('color');
		//console.log(s_color);
		$('#ZL').css('display','none');
		$('.biaoge2').css('display','none');
		$('.biaoge3').css('display','block');
		//console.log($(this).attr('data-original-title'));
		$('#b').css('display','block');
		$('#b1').css('display','block');
		$('#b2').css('display','none');
		$('#b3').css('display','block');
		show_chart();
	});
	//
	//柱状图显示
	function show_chart(){
		var charts_g = echarts.init(document.getElementById('line_chart'));
		var dataPower=[];
	    var dataEnergy=[];
	    var date=[];
	    for(var j=5;j<19;j++){
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
	    date.push('19:00');
	    if(s_color=='rgb(0, 128, 0)'){
	    	post_url="zl_info";
	    }
	    else{
	    	post_url="test_trouble";
	    }
	    $.ajax({
	        type: "POST",
	        url: post_url,
		    data: {'title':title
			},     //发送到服务器的数据
	        async:false,       //是否异步处理
	        success:function(data){
	            // console.log(data);
	            if(data!=null){
	                for(var i=0;i<data.length;i++){
	                    //console.log(data[i]['power']);
	                    dataPower.push(data[i]['power']);
	                    dataEnergy.push(data[i]['energy']);
	                }
	            }
	        }
	    });


		option = {
		    title: {
		        text: '  '+title+'功率趋势图',
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
	    charts_g.setOption(option);
	                //用于使chart自适应高度和宽度
	    window.onresize = function () {
    		charts_g.resize(); //使第一个图表适应
		}
	}
	//表格显示
	function show_table(){
		if(s_color=='rgb(0, 128, 0)'){
	    	post_url="zl_info";
	    }
	    else{
	    	post_url="trouble_copy";
	    }
		$.ajax({
		        type: "POST",
		        url: post_url,
		        data: {'title':title
				},
		        async:false,
		        success:function(data){
		            if(data!=null){
		            	items=[];
		            	if(post_url=="zl_info"){
		            		grid.opts.cols=cols3;
		            		for(var i=0;i<data.length;i++){
			                //console.log(data[i]);
				                items[i]={};
				                items[i].zhuangtai="正常";
				                items[i].bianhao=i+1;
				                items[i].mingcheng =data[i]['panelName'];
				                items[i].shijian=data[i]['time'];
				                items[i].DCgonglv=Number(data[i]['power']);
				                items[i].DCdianliang=Number(data[i]['energy']);
		                	}
		            	}
		            	else{
		            		grid.opts.cols=cols4;
		            		for(var i=0;i<data.length;i++){
			                //console.log(data[i]);
				                items[i]={};
				                items[i].start_time=data[i]["start_time"];
				                items[i].end_time=data[i]["end_time"];
				                items[i].mingcheng =title;
				                items[i].t_level=data[i]['t_level'];
				                items[i].t_description=data[i]['t_description'];
				                items[i].solve_state=data[i]['solve_state'];
		                	}
		            	}
		            }
		         grid.load(items);
		     }
    	});
	}
	//返回布局视图
	$('#b1').click(function(){
		$('#ZL').css('display','block');
		$('.biaoge2').css('display','none');
		$('.biaoge3').css('display','none');
		$('#b').css('display','none');
	})
	//显示折线视图
	$('#b2').click(function(){
		$('#ZL').css('display','none');
		$('.biaoge2').css('display','none');
		$('.biaoge3').css('display','block');
		$('#b1').css('display','block');	
		$('#b2').css('display','none');
		$('#b3').css('display','block');
		show_chart();
	});
	//显示表格视图
	$('#b3').click(function(){
		$('#ZL').css('display','none');
		$('.biaoge2').css('display','block');
		$('.biaoge3').css('display','none');
		$('#b1').css('display','block');	
		$('#b2').css('display','block');
		$('#b3').css('display','none');
		show_table();
	});

}));
