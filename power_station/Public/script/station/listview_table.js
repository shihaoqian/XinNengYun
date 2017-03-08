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
var name="";
var currentPageNum = 1;
var totalPageNum = 0;
var totalDataNum = 0;
var selected_value = $('#listview_select_id option:selected').val();

// var dataFromServe = null;

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
    if(turnPage<=totalPageNum){
        currentPageNum = turnPage;
        $('#listview_currentPage').text(currentPageNum);
        getTableData(currentPageNum,null);
    }
    console.log("turnPage="+turnPage);
}

function query_device(){
    var name = $('#input_listview_query_device').val();
    currentPageNum = 1;
    $('#listview_currentPage').text("1");
    getTableData(1,name);
}

function getTotalDataNum(){
    $.ajax({
        type: "POST",
        url: "listview_totalPageNum",
        data: "",
        async: false,
        success: function(data){
            if(data!=null){
                totalDataNum = data;
                // totalPageNum = parseInt(totalDataNum/selected_value)+1;
                // $('#listview_currentPage').text(currentPageNum);
                // $('#listview_totalPage').text(totalPageNum);
                
            }
            
            
        }
    });
}

function getTableData(cPageNum,name){

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
    // console.log("1");
    // currentPageNum = 1;
    selected_value = $('#listview_select_id option:selected').val();
    currentPageNum = cPageNum;
    totalPageNum = parseInt(totalDataNum/selected_value)+1

    // console.log("currentPageNum="+currentPageNum);
    // console.log("totalPageNum="+totalPageNum);
    console.log("name="+name);
    var items = [];
    
    $('#listview_currentPage').text(currentPageNum);
    $('#listview_totalPage').text(totalPageNum);
// console.log(selected_value);
$.ajax({
    type: "POST",
    url: "list_view_table",
    data: {'sel_val': selected_value, 'pageNum': currentPageNum, 'name':name},
    async: false,
    success: function(data){
            // dataFromServe = data;
            // console.log(data);
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
                var table = $('#table3-1').mmGrid({   //应该只会执行一次，在第一次加载页面的时候执行  后面不会再执行
                    cols: cols3,
                    items: items,    //这个数据第一次加载一定要给，后面的load函数 只是用来更新数据的
                    sortName: 'bianhao',
                    sortStatus: 'asc',
                    fullWidthRows:true,
                    height:'100%',
                    // nowrap: false
                });
                table.load(items);


            }
        }
    });
   

  
}


