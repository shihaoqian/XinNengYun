<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class StationController extends Controller {
    public function power_station_monitor(){
        $this->display();
    }
    public function device_power_trend(){
        $this->display();
    }
    public function layout_view(){
        $this->display();
    }
    public function list_view(){
        $this->display();
    }
    public function trouble_alarm(){
        $this->display();
    }
    public function running_log(){
        $this->display();
    }
    public function history_data_query(){
        $this->display();
    }
    public function power_station_trend(){
        $this->display();
    }
    public function news_list(){
        $this->display();
    }
    public function electricity_bill(){
        $this->display();
    }
    public function operational_expenses(){
        $this->display();
    }
    public function power_energy_monitor_chart(){
        $chart=new model("pe20161101-20161122");
       // $condition='2016-11-01 05:01:00';
        $map['time'] = array('between',array('2016-11-01 06:00:00','2016-11-01 18:00:00'));
        $result=$chart->where($map)->select();
        // $my = new Model();
        // $result=$my->query("select * from component");
        // file_put_contents('D:/php_log.txt',print_r($result,1),FILE_USE_INCLUDE_PATH,null);
        // error_log(print_r($result,1), 3, 'D:/php_log.txt');
        $this->ajaxReturn($result);
    }
    public function power_energy_monitor_firstLine(){
        // file_put_contents('D:/php_log.txt',print_r($result,1),FILE_USE_INCLUDE_PATH,null);
        // file_put_contents('D:/php_log.txt',"hello22",FILE_USE_INCLUDE_PATH,null);
        $data=new model("power_station_monitor_total");
        // $maxId=$data->max("id");
        // $map["id"]=$maxId;
        // $result=$data->where($map)->select();
        $result=$data->order('id desc')->limit(1)->select();          //limit(10,25)  查询从第10行开始的25条数据
        
        $this->ajaxReturn($result);
    }

    public function list_view_table(){
        $selected_value = $_POST['sel_val'];  //每页显示几条数据
        $needPageNum = $_POST['pageNum'];
        $device_name = $_POST['name'];
        // file_put_contents('D:/php_log.txt',print_r($selected_value,1),FILE_USE_INCLUDE_PATH,null);
        // file_put_contents('D:/php_log2.txt',print_r($needPageNum,1),FILE_USE_INCLUDE_PATH,null);
        if($device_name==null){  //$device_name=''  也是 null
            // file_put_contents('D:/php_log.txt',print_r("1",1),FILE_USE_INCLUDE_PATH,null);
            $data = new model("list_view_table");
            $result = $data->limit($selected_value * ($needPageNum-1), $selected_value)->select();
            // $result = $data->limit(10,10)->select();
            
        }else{
            // file_put_contents('D:/php_log.txt',print_r("2",1),FILE_USE_INCLUDE_PATH,null);
            $map['bianhao'] = $device_name;
            // file_put_contents('D:/php_log3.txt',print_r($device_name,1),FILE_USE_INCLUDE_PATH,null);
            // $map['bianhao'] = "2#7A逆变器";
            $data = new model("list_view_table");
            $result = $data->where($map)->limit($selected_value * ($needPageNum-1), $selected_value)->select();
            file_put_contents('D:/php_log.txt',print_r($result,1),FILE_USE_INCLUDE_PATH,null);
            file_put_contents('D:/php_log3.txt',print_r("1111",1),FILE_USE_INCLUDE_PATH,null);
            if($result==null){
                file_put_contents('D:/php_log2.txt',print_r("22",1),FILE_USE_INCLUDE_PATH,null);
                $map2['mingcheng'] = $device_name;
                $data = new model("list_view_table");
                $result = $data->where($map2)->limit($selected_value * ($needPageNum-1), $selected_value)->select();

            }
        }
        $this->ajaxReturn($result);
        
    }

    public function listview_totalPageNum(){
        $data = new model("list_view_table");
        $result = $data->count();
        $this->ajaxReturn($result);
    }
    
    public function zl_info(){
        $chart=new model('panelstate');
       // $condition='2016-11-01 05:01:00';
        $map['time'] = array('between',array('2016-11-01 05:00:00','2016-11-01 19:00:00'));
       // $map['panelName']=$_POST['title'];
        $map['panelName']=$_POST['title'];
        //echo $map['panelName'];
       $result=$chart->where($map)->select();
       $this->ajaxReturn($result);
    }
    //模拟故障信息折线图
    public function test_trouble(){
        $chart=new model('trouble');
        $map['time'] = array('between',array('2016-11-01 05:00:00','2016-11-01 19:00:00'));
       // $map['panelName']=$_POST['title'];
        //echo $map['panelName'];
        $result=$chart->where($map)->select();
        $this->ajaxReturn($result);

    }
    //模拟故障信息表格
    function trouble_copy(){
        $chart=new model('trouble_copy');
       // $map['panelName']=$_POST['title'];
        //echo $map['panelName'];
        $result=$chart->select();
        $this->ajaxReturn($result);
    }
    public function station_name(){
        session_start();
        $_SESSION['station_name']=$_POST["station_name"];  
    }
    public function get_station_name(){
        echo $_SESSION['station_name'];
    }
    public function overview(){
        $this->display();
    }
}