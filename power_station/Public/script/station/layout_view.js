($(function(){
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
    //客户端排序示例

	$('.cop').tooltip();
	$('.cop').click(function(){
		$('#ZL').css('display','none');
		$('.biaoge2').css('display','block');
		console.log($(this).attr('data-original-title'));
		$.ajax({
		        type: "POST",
		        url: "zl_info",
		        data: {'title':$(this).attr('data-original-title')
				},
		        async:false,
		        success:function(data){
		            if(data!=null){
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
		            $('#table3-1').mmGrid({
						cols: cols3,
						items: items,
				        sortName: 'bianhao',
				        sortStatus: 'asc',
				        height:'100%',
				        fullWidthRows:true
  				    });
		        }
    	});
	});
	$('.b_back').click(function(){
		$('#ZL').css('display','block');
		$('.biaoge2').css('display','none');
	})

}));
