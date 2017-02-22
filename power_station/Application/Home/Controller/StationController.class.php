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
    public function power_energy(){
        $chart=new model('pe20161101-20161122');
       // $condition='2016-11-01 05:01:00';
        $map['time'] = array('between',array('2016-11-01 06:00:00','2016-11-01 18:00:00'));
        $result=$chart->where($map)->select();
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
    public function overview(){
        $this->display();
    }
}