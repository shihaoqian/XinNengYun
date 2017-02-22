$(document).ready(function(){

    //本地数据
    var items = [

    {
        zhuangtai:"待机",bianhao:1,mingcheng:"1#7A逆变器",shijian:"2017-02-05 23:03:07",DCdianya:0.10,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:12000
    },{
        zhuangtai:"待机",bianhao:2,mingcheng:"1#8A逆变器",shijian:"2017-02-05 23:03:08",DCdianya:0.20,DCdianliu:7.33,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:548.70,zongfadianliang:15000
    },{
        zhuangtai:"待机",bianhao:3,mingcheng:"1#9A逆变器",shijian:"2017-02-05 23:03:00",DCdianya:3.33,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:14300
    },{
        zhuangtai:"待机",bianhao:4,mingcheng:"1#7B逆变器",shijian:"2017-02-06 23:03:07",DCdianya:0.10,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:13232
    },{
        zhuangtai:"待机",bianhao:5,mingcheng:"1#8B逆变器",shijian:"2017-02-06 10:03:07",DCdianya:0.10,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:11000
    },{
        zhuangtai:"待机",bianhao:6,mingcheng:"1#9B逆变器",shijian:"2017-02-05 21:03:07",DCdianya:0.10,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:12000
    },{
        zhuangtai:"待机",bianhao:7,mingcheng:"1#9B逆变器",shijian:"2017-02-05 21:03:07",DCdianya:0.10,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:12000
    },{
        zhuangtai:"待机",bianhao:8,mingcheng:"1#9B逆变器",shijian:"2017-02-05 21:03:07",DCdianya:0.10,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:12000
    },{
        zhuangtai:"待机",bianhao:9,mingcheng:"1#9B逆变器",shijian:"2017-02-05 21:03:07",DCdianya:0.10,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:12000
    },{
        zhuangtai:"待机",bianhao:10,mingcheng:"1#9B逆变器",shijian:"2017-02-05 21:03:07",DCdianya:0.10,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:12000
    },{
        zhuangtai:"待机",bianhao:11,mingcheng:"1#9B逆变器",shijian:"2017-02-05 21:03:07",DCdianya:0.10,DCdianliu:7.52,
        DCgonglv:9.34,ACdianya:33.4,ACdianliu:12.22,ACgonglv:20,wendu:21,xiaolv:98,pinlv:50.00,gonglvyinsu:0.99,
        rifadianliang:565.70,zongfadianliang:12000
    }

    ];
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
        { title:'状态', name:'zhuangtai' ,width:90, align:'center', sortable: true, sortName:'secu_code'},
        { title:'编号', name:'bianhao' ,width:70, align:'center',type:'number', sortable: true, sortName:'secu_abbr'},
        { title:'名称', name:'mingcheng' ,width:140, align:'center', sortable: true ,sortName:'secu_mingcheng',renderer: highliht},
        { title:'时间', name:'shijian' ,width:180, align:'center', sortable: true,sortName:'secu_shijian'},
        { title:'DC电压(V)', name:'DCdianya' ,width:100, align:'right',type:'number', sortable: true, renderer: fixed2},
        { title:'DC电流(A)', name:'DCdianliu' ,width:100, align:'right',type:'number', sortable: true, renderer: fixed2},
        { title:'DC功率(kW)', name:'DCgonglv' ,width:100, align:'right',type:'number', sortable: true, renderer: fixed2

        // function(val){
        //     return (val / 100).toFixed(2);
        // }
    },
        { title:'AC电压(V)', name:'ACdianya' ,width:100, align:'right',type:'number', sortable: true, renderer: fixed2
        },
        { title:'AC电流(A)', name:'ACdianliu' ,width:100, align:'right',type:'number', sortable: true, renderer: fixed2},
        { title:'AC功率(kW)', name:'ACgonglv',width:100, align:'right',type:'number', sortable: true, renderer: fixed2},
        { title:'温度(C)', name:'wendu' ,width:90, align:'right',type:'number', sortable: true, renderer: fixed2},
        { title:'效率(%)', name:'xiaolv' ,width:90, align:'right',type:'number', sortable: true, renderer: fixed2},
        { title:'频率(Hz)', name:'pinlv' ,width:90, align:'right',type:'number', sortable: true, renderer: fixed2},
        { title:'功率因素', name:'gonglvyinsu' ,width:100, align:'right',type:'number', sortable: true, renderer: fixed2},
        { title:'日发电量(kWh)', name:'rifadianliang' ,width:140, align:'right',type:'number', sortable: true, renderer: fixed2},
        { title:'总发电量(kWh)', name:'zongfadianliang' ,width:140, align:'right',type:'number', sortable: true, renderer: fixed2},

    ];
    //客户端排序示例
    $('#table3-1').mmGrid({
        cols: cols3,
        items: items,
        sortName: 'bianhao',
        sortStatus: 'asc',
        height:'100%'
            });
    //服务器端排序示例
    // $('#table3-2').mmGrid({
    //     cols: cols3,
    //     url: 'data/stockQuote.json',
    //     method: 'get',
    //     remoteSort:true ,
    //     sortName: 'SECUCODE',
    //     sortStatus: 'asc'
    // });



});
