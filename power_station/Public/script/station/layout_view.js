($(function(){
	var title;
	var s_color;
	var post_url;
	var hh=$('.lv_content1').height()-50-$('#b').height();
    //console.log(hh);
	var items = new Array();

	//$('.zhenlie').height()*0.30+'px'
	$('.cop').css('font-size',$('.zhenlie').height()*0.19+'px');
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
    var grid1=$('#table3-1').mmGrid({
		cols: cols3,
		//items: items,
		lockDisplay:false,
	    sortName: 'bianhao',
	    sortStatus: 'asc',
	    height:hh,
	    autoLoad:false,
	   fullWidthRows:true,
	});
    var grid2=$('#table3-2').mmGrid({
		cols: cols4,
		//items: items,
		lockDisplay:false,
	    sortName: 'bianhao',
	    sortStatus: 'asc',
	    height:hh,
	    autoLoad:false,
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
		if(s_color=='rgb(0, 128, 0)'){
	    	$('#b3').text("表格视图");
	    }
	    else{
	    	$('#b3').text("显示故障信息");
	    }
		$('#r_ul').css('visibility','hidden');
		$('.lv_a1').css('visibility','hidden');
		show_chart();
	});
	//
	//折线图显示
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
	                    if(data[i]['time']>='2016-11-01 09:00:00'&&data[i]['time']<='2016-11-01 13:00:00'&&data[i]['power']==0){
	                    	dataPower.push('');
	                    	dataEnergy.push('');
	                    	continue;
	                    }
	                    dataPower.push(data[i]['power']);
	                    dataEnergy.push(data[i]['energy']);
	                }
	            }
	        }
	    });

		option = {
		    title: {
		        text: '  '+title+'功率发电趋势图',
		    },
		    backgroundColor: '#FFFFFF',    
		    tooltip: {
		        trigger: 'axis',       //提示触发为x轴
		        formatter:function(params){
		        	//console.log(params);
		        	var status;
		        	if(params[0].name>'08:00'&&params[0].name<'17:30'&&params[0].data==0){
		        		return params[0].name+'&nbsp&nbsp&nbsp&nbsp'+' 状态： '+'<i class="fa fa-circle mr5" style="color:red"></i>'+'故障'+'<br>'+'<i class="fa fa-circle mr5" style="color:#DD6460"></i>'+'实发功率 : '+params[0].data+'<br>'+'<i class="fa fa-circle mr5" style="color:#F1B25A"></i>'+'实发电量 : '+params[1].data;
		        	}
		        	else{
		        		return params[0].name+'&nbsp&nbsp&nbsp&nbsp'+' 状态： '+'<i class="fa fa-circle mr5" style="color:#00acac"></i>'+'正常'+'<br>'+'<i class="fa fa-circle mr5" style="color:#DD6460"></i>'+'实发功率 : '+params[0].data+'<br>'+'<i class="fa fa-circle mr5" style="color:#F1B25A"></i>'+'实发电量 : '+params[1].data;
		        	}
		        }
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
		        itemStyle:{
		        	normal:{
		        		width:2
		        	}
		        },
		        lineStyle: {
		            normal: {
		                width:2
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
		                	
		                    width: 2
		                }
		            },
		            
		        }

		        ]
	    };


	    charts_g.setOption(option);
	    console.log(option.tooltip);
	    //用于使chart自适应高度和宽度
	    window.onresize = function () {
    		charts_g.resize(); //使第一个图表适应
		}
	}
	//表格显示
	function show_table(){
		if(s_color=='rgb(0, 128, 0)'){
	    	post_url="zl_info";
	    	$('.mmGrid').eq(0).css('display','block');
	    	$('.mmGrid').eq(1).css('display','none');
	    }
	    else{
	    	post_url="trouble_copy";
	    	$('.mmGrid').eq(0).css('display','none');
	    	$('.mmGrid').eq(1).css('display','block');
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
		                	grid1.load(items);
		            	}
		            	else{
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
		                	grid2.load(items);
		            	}	
		            }
		        }
    	});
	}
	//返回布局视图
	$('#b1').click(function(){
		$('#ZL').css('display','block');
		$('.biaoge2').css('display','none');
		$('.biaoge3').css('display','none');
		$('#b').css('display','none');
		$('#r_ul').css('visibility','visible');
		$('.lv_a1').css('visibility','visible');
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
	//控制界面显示，全选，正常，故障等
	var iszhengchang=2;
	var isquanxuan=2;
	var isguzhang=2;
	var isbaojing=2;
	var iszhongduan=2;
	var isyinyingzhedang=2;

	$('#quanxuan').click(function(){
		if(isquanxuan==2){
			isquanxuan=1;
			$('#quanxuan1').css('display','inline-block');
			$('#quanxuan2').css('display','none');
			iszhengchang=1;
			$('#zhengchang1').css('display','inline-block');
			$('#zhengchang2').css('display','none');
			isguzhang=1;
			$('#guzhang1').css('display','inline-block');
			$('#guzhang2').css('display','none');
			isbaojing=1;
			$('#baojing1').css('display','inline-block');
			$('#baojing2').css('display','none');
			iszhongduan=1;
			$('#zhongduan1').css('display','inline-block');
			$('#zhongduan2').css('display','none');
			isyinyingzhedang=1;
			$('#yinyingzhedang1').css('display','inline-block');
			$('#yinyingzhedang2').css('display','none');

			$('[class="glyphicon glyphicon-th cop"]').css('visibility','hidden');
			
		}else{
			isquanxuan=2;
			$('#quanxuan1').css('display','none');
			$('#quanxuan2').css('display','inline-block');
			iszhengchang=2;
			$('#zhengchang1').css('display','none');
			$('#zhengchang2').css('display','inline-block');
			isguzhang=2;
			$('#guzhang1').css('display','none');
			$('#guzhang2').css('display','inline-block');
			isbaojing=2;
			$('#baojing1').css('display','none');
			$('#baojing2').css('display','inline-block');
			iszhongduan=2;
			$('#zhongduan1').css('display','none');
			$('#zhongduan2').css('display','inline-block');
			isyinyingzhedang=2;
			$('#yinyingzhedang1').css('display','none');
			$('#yinyingzhedang2').css('display','inline-block');

			$('[class="glyphicon glyphicon-th cop"]').css('visibility','visible');
			
		}
	});
	$('#zhengchang').click(function(){
		if(iszhengchang==2){
			iszhengchang=1;
			$('#zhengchang1').css('display','inline-block');
			$('#zhengchang2').css('display','none');
			isquanxuan=1;
			$('#quanxuan1').css('display','inline-block');
			$('#quanxuan2').css('display','none');

			$('[class="glyphicon glyphicon-th cop"][name!="fault"]').css('visibility','hidden');
			
		}else{
			iszhengchang=2;
			$('#zhengchang1').css('display','none');
			$('#zhengchang2').css('display','inline-block');
			if(iszhengchang==2&&isguzhang==2&&isbaojing==2&&iszhongduan==2&&isyinyingzhedang==2){
				isquanxuan=2;
				$('#quanxuan1').css('display','none');
				$('#quanxuan2').css('display','inline-block');
			};

			$('[class="glyphicon glyphicon-th cop"][name!="fault"]').css('visibility','visible');
			
		}
	});
	$('#guzhang').click(function(){
		if(isguzhang==2){
			isguzhang=1;
			$('#guzhang1').css('display','inline-block');
			$('#guzhang2').css('display','none');
			isquanxuan=1;
			$('#quanxuan1').css('display','inline-block');
			$('#quanxuan2').css('display','none');

			$('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','hidden');
			
		}else{
			isguzhang=2;
			$('#guzhang1').css('display','none');
			$('#guzhang2').css('display','inline-block');
			if(iszhengchang==2&&isguzhang==2&&isbaojing==2&&iszhongduan==2&&isyinyingzhedang==2){
				isquanxuan=2;
				$('#quanxuan1').css('display','none');
				$('#quanxuan2').css('display','inline-block');
			};
			$('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','visible');
			
		}
	});
	$('#baojing').click(function(){
		if(isbaojing==2){
			isbaojing=1;
			$('#baojing1').css('display','inline-block');
			$('#baojing2').css('display','none');
			isquanxuan=1;
			$('#quanxuan1').css('display','inline-block');
			$('#quanxuan2').css('display','none');

			// $('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','hidden');
			
		}else{
			isbaojing=2;
			$('#baojing1').css('display','none');
			$('#baojing2').css('display','inline-block');
			if(iszhengchang==2&&isguzhang==2&&isbaojing==2&&iszhongduan==2&&isyinyingzhedang==2){
				isquanxuan=2;
				$('#quanxuan1').css('display','none');
				$('#quanxuan2').css('display','inline-block');
			};
			// $('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','visible');
			
		}
	});
	$('#zhongduan').click(function(){
		if(iszhongduan==2){
			iszhongduan=1;
			$('#zhongduan1').css('display','inline-block');
			$('#zhongduan2').css('display','none');
			isquanxuan=1;
			$('#quanxuan1').css('display','inline-block');
			$('#quanxuan2').css('display','none');

			// $('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','hidden');
			
		}else{
			iszhongduan=2;
			$('#zhongduan1').css('display','none');
			$('#zhongduan2').css('display','inline-block');
			if(iszhengchang==2&&isguzhang==2&&isbaojing==2&&iszhongduan==2&&isyinyingzhedang==2){
				isquanxuan=2;
				$('#quanxuan1').css('display','none');
				$('#quanxuan2').css('display','inline-block');
			};
			// $('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','visible');
			
		}
	});
	$('#yinyingzhedang').click(function(){
		if(isyinyingzhedang==2){
			isyinyingzhedang=1;
			$('#yinyingzhedang1').css('display','inline-block');
			$('#yinyingzhedang2').css('display','none');
			isquanxuan=1;
			$('#quanxuan1').css('display','inline-block');
			$('#quanxuan2').css('display','none');

			// $('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','hidden');
			
		}else{
			isyinyingzhedang=2;
			$('#yinyingzhedang1').css('display','none');
			$('#yinyingzhedang2').css('display','inline-block');
			if(iszhengchang==2&&isguzhang==2&&isbaojing==2&&iszhongduan==2&&isyinyingzhedang==2){
				isquanxuan=2;
				$('#quanxuan1').css('display','none');
				$('#quanxuan2').css('display','inline-block');
			};
			// $('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','visible');
			
		}
	});
}));
