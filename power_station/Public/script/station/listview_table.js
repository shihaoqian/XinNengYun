 //保留两位小数
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
        // if(val > 0){
        //     return '<span style="color: #b00">' + fixed2(val) + '</span>';
        // }else if(val < 0){
        //     return '<span style="color: #0b0">' + fixed2(val) + '</span>';
        // }
        // return fixed2(val);
};

var cols3 = [
    { title:'状态', name:'zhuangtai' , align:'center', sortable: true, sortName:'secu_code'},
    { title:'编号', name:'bianhao' , align:'center',type:'number', sortable: true, sortName:'secu_abbr'},
    { title:'名称', name:'mingcheng' , align:'center', sortable: true ,sortName:'secu_mingcheng',renderer: highliht},
    { title:'时间', name:'shijian' ,width:180, align:'center', sortable: true,sortName:'secu_shijian'},
    { title:'DC电压(V)', name:'DCdianya' , align:'right',type:'number', sortable: true, renderer: fixed2},
    { title:'DC电流(A)', name:'DCdianliu' , align:'right',type:'number', sortable: true, renderer: fixed2},
    { title:'DC功率(kW)', name:'DCgonglv' , align:'right',type:'number', sortable: true, renderer: fixed2
        // function(val){
        //     return (val / 100).toFixed(2);
        // }
    },
    { title:'AC电压(V)', name:'ACdianya' , align:'right',type:'number', sortable: true, renderer: fixed2
    },
    { title:'AC电流(A)', name:'ACdianliu' , align:'right',type:'number', sortable: true, renderer: fixed2},
    { title:'AC功率(kW)', name:'ACgonglv', align:'right',type:'number', sortable: true, renderer: fixed2},
    { title:'温度(C)', name:'wendu' , align:'right',type:'number', sortable: true, renderer: fixed2},
    { title:'效率(%)', name:'xiaolv' , align:'right',type:'number', sortable: true, renderer: fixed2},
    { title:'频率(Hz)', name:'pinlv' , align:'right',type:'number', sortable: true, renderer: fixed2},
    { title:'功率因素', name:'gonglvyinsu' , align:'right',type:'number', sortable: true, renderer: fixed2},
    { title:'日发电量(kWh)', name:'rifadianliang' , align:'right',type:'number', sortable: true, renderer: fixed2},
    { title:'总发电量(kWh)', name:'zongfadianliang' , align:'right',type:'number', sortable: true, renderer: fixed2},
];



// var currentPageNum = 1;
var queryName="";
var currentPageNum = 1;
var totalPageNum = 0;
var totalDataNum = 0;
var selected_value = $('#listview_select_id option:selected').val();
var items = [];
var showingBianHao = [];
var autoInterval;

var table = $('#table3-1').mmGrid({   //应该只会执行一次，在第一次加载页面的时候执行  后面不会再执行
                cols: cols3,
                // items: items,    //这个数据第一次加载一定要给，后面的load函数 只是用来更新数据的
                sortName: 'bianhao',
                sortStatus: 'asc',
                fullWidthRows:true,
                height:'100%',
                // nowrap: false
                });


function selectOptionChange(){
    getTableData(1,null);
}

function previousPage(){
    if(currentPageNum>1){
        currentPageNum = currentPageNum - 1;
        $('#listview_currentPage').text(currentPageNum);
        getTableData(currentPageNum,null);
    }
}

function nextPage(){
    if(currentPageNum<totalPageNum){
        currentPageNum = currentPageNum + 1;
        $('#listview_currentPage').text(currentPageNum);
        getTableData(currentPageNum,null);
    }
}

function turnPage(){
    var turnPage = $('#listview_turnPageNum').val();
    // if(detectIsNum(turnPage)&&turnPage<=totalPageNum){
    //     console.log("22222");
    //     currentPageNum = turnPage;
    //     $('#listview_currentPage').text(currentPageNum);
    //     getTableData(currentPageNum,null);
    // }
     if(!detectIsNum(turnPage)&&turnPage<=totalPageNum&&turnPage>=1){
        console.log("22222");
        currentPageNum = turnPage;
        $('#listview_currentPage').text(currentPageNum);
        getTableData(currentPageNum,null);
        // $('#listview_turnPageNum').text("");
    }
    // console.log("turnPage="+turnPage);
}

function detectIsNum(num){
    var reNum=/\D/;    //匹配非数字
    return(reNum.test(num));   //只要在num中检测到非数字 返回true

}

function query_device(){
    queryName = $('#input_listview_query_device').val();
    currentPageNum = 1;
    $('#listview_currentPage').text("1");
    getTableData(1,queryName);
    getTotalDataNum();
    // $('#hanyuehui').html($('#input_listview_query_device').val());
}

function getTotalDataNum(){

    $.ajax({
        type: "POST",
        url: "listview_totalPageNum",
        data: {'queryName':queryName},
        async: true,
        success: function(data){
            if(data!=null){
                totalDataNum = data;
                selected_value = $('#listview_select_id option:selected').val();
                totalPageNum = parseInt(totalDataNum/selected_value)+1;
                $('#listview_totalPage').text(totalPageNum);
            }
            
        }
    });
    
}

function autoRefreshData(){
    autoInterval = setInterval("autoGetData()", 5000); //每隔5秒刷新
    // autoGetData();
}

function autoGetData(){
    showingBianHao = [];
    if(items!=null){
        for(var i=0;i<items.length;i++){
            showingBianHao.push(items[i]['bianhao']);
        }
        autoGetShowingData(showingBianHao);
        console.log("autogetData showingBianHao=");
        console.log(showingBianHao);

    }
}

function autoGetShowingData(showingBianHao){

    $.ajax({
        type: "POST",
        url: "list_view_table_autoGetData",
        data: {'showingBianHao':showingBianHao },
        async: true,                        //禁止异步，即同步，则再执行$.ajax({});这句话时，会锁死整个浏览器，只有这个函数执行完成，才能进行其他操作
                                            //如果是true的话，这个函数和其他函数没有顺序关系，但是如果这个函数进入执行，则后面的函数不会再执行。
        success: function(data){
            items = [];
            showingBianHao = [];
            if(data!=null){
                for(var i=0;i<data.length;i++){
                    var row={};
                    row.zhuangtai = data[i]['zhuangtai'];
                    row.bianhao = data[i]['bianhao'];
                    row.mingcheng = data[i]['mingcheng'];
                    row.shijian = data[i]['shijian'];
                    row.DCdianya = parseFloat(data[i]['DCdianya']);  //字符串转为float型
                    row.DCdianliu = parseFloat(data[i]['DCdianliu']);
                    row.DCgonglv = parseFloat(data[i]['DCgonglv']);
                    row.ACdianya = parseFloat(data[i]['ACdianya']);
                    row.ACdianliu = parseFloat(data[i]['ACdianliu']);
                    row.ACgonglv = parseFloat(data[i]['ACgonglv']);
                    row.wendu = parseFloat(data[i]['wendu']);
                    row.xiaolv = parseFloat(data[i]['xiaolv']);
                    row.pinlv = parseFloat(data[i]['pinlv']);
                    row.gonglvyinsu = parseFloat(data[i]['gonglvyinsu']);
                    row.rifadianliang = parseFloat(data[i]['rifadianliang']);
                    row.zongfadianliang = parseFloat(data[i]['zongfadianliang']);
                    items.push(row);
                }
            }else{
                items=[];
            }
            console.log("ajax2(auto) receive items="+items);
            table.load(items);

            
        }
    });
}

function getTableData(cPageNum,name){

    // document.write("22222222222222222222");

    // // //本地数据
    // var items = [
    // {
    //     zhuangtai:"待机",bianhao:1,mingcheng:"1#7A逆变器",shijian:"2017-02-05 23:03:07",DCdianya:0.10,DCdianliu:7.52,
    //     DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
    //     rifadianliang:565.70,zongfadianliang:12000
    // },{
    //     zhuangtai:"待机",bianhao:2,mingcheng:"1#8A逆变器",shijian:"2017-02-05 23:03:08",DCdianya:0.20,DCdianliu:7.33,
    //     DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
    //     rifadianliang:548.70,zongfadianliang:15000
    // }];
    // currentPageNum = 1;
    // var onChangeSelectName = $('#input_listview_query_device').val();
    name = queryName;
    selected_value = $('#listview_select_id option:selected').val();
    currentPageNum = cPageNum;
    totalPageNum = parseInt(totalDataNum/selected_value)+1;
    
    
    $('#listview_currentPage').text(currentPageNum);
    $('#listview_totalPage').text(totalPageNum);
    $.ajax({
        type: "POST",
        url: "list_view_table",
        data: {'sel_val': selected_value, 'pageNum': currentPageNum, 'name':name},
        async: true,                        //禁止异步，即同步，则再执行$.ajax({});这句话时，会锁死整个浏览器，只有这个函数执行完成，才能进行其他操作
                                            //如果是true的话，这个函数和其他函数没有顺序关系，但是如果这个函数进入执行，则后面的函数不会再执行。
        success: function(data){
            items = [];
            if(data!=null){
                for(var i=0;i<data.length;i++){
                    var row={};
                    row.zhuangtai = data[i]['zhuangtai'];
                    row.bianhao = data[i]['bianhao'];
                    row.mingcheng = data[i]['mingcheng'];
                    row.shijian = data[i]['shijian'];
                    row.DCdianya = parseFloat(data[i]['DCdianya']);  //字符串转为float型
                    row.DCdianliu = parseFloat(data[i]['DCdianliu']);
                    row.DCgonglv = parseFloat(data[i]['DCgonglv']);
                    row.ACdianya = parseFloat(data[i]['ACdianya']);
                    row.ACdianliu = parseFloat(data[i]['ACdianliu']);
                    row.ACgonglv = parseFloat(data[i]['ACgonglv']);
                    row.wendu = parseFloat(data[i]['wendu']);
                    row.xiaolv = parseFloat(data[i]['xiaolv']);
                    row.pinlv = parseFloat(data[i]['pinlv']);
                    row.gonglvyinsu = parseFloat(data[i]['gonglvyinsu']);
                    row.rifadianliang = parseFloat(data[i]['rifadianliang']);
                    row.zongfadianliang = parseFloat(data[i]['zongfadianliang']);
                    items.push(row);
                }
            }else{
                items=[];
            }
            console.log("ajax1 receive items="+items);

            // var table = $('#table3-1').mmGrid({   //应该只会执行一次，在第一次加载页面的时候执行  后面不会再执行
            //     cols: cols3,
            //     items: items,    //这个数据第一次加载一定要给，后面的load函数 只是用来更新数据的
            //     sortName: 'bianhao',
            //     sortStatus: 'asc',
            //     fullWidthRows:true,
            //     height:'100%',
            //     // nowrap: false
            //     });
            table.load(items);
            window.clearInterval(autoInterval);
            autoRefreshData();

        }
    });

    

}

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

        // $('[class="glyphicon glyphicon-th cop"]').css('visibility','hidden');
        
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

        // $('[class="glyphicon glyphicon-th cop"]').css('visibility','visible');
        
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

        // $('[class="glyphicon glyphicon-th cop"][name!="fault"]').css('visibility','hidden');
        
    }else{
        iszhengchang=2;
        $('#zhengchang1').css('display','none');
        $('#zhengchang2').css('display','inline-block');
        if(iszhengchang==2&&isguzhang==2&&isbaojing==2&&iszhongduan==2&&isyinyingzhedang==2){
            isquanxuan=2;
            $('#quanxuan1').css('display','none');
            $('#quanxuan2').css('display','inline-block');
        };

        // $('[class="glyphicon glyphicon-th cop"][name!="fault"]').css('visibility','visible');
        
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

        // $('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','hidden');
        
    }else{
        isguzhang=2;
        $('#guzhang1').css('display','none');
        $('#guzhang2').css('display','inline-block');
        if(iszhengchang==2&&isguzhang==2&&isbaojing==2&&iszhongduan==2&&isyinyingzhedang==2){
            isquanxuan=2;
            $('#quanxuan1').css('display','none');
            $('#quanxuan2').css('display','inline-block');
        };
        // $('[class="glyphicon glyphicon-th cop"][name="fault"]').css('visibility','visible');
        
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
