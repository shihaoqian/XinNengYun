<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class AnalysisViewController extends Controller {

    public function power_energy_month() {
        $chart = M("pe20161101-20161122");
        $days = '2016-11-';
        for($i=1; $i<23; $i++) {
            $day = '';
            if($i < 10) {
                $day = $days.'0'.$i;
            } else {
                $day = $days.$i;
            }
            $map['time'] = array('between',array($day.' 05:00:00',$day.' 19:00:00'));
            //echo($chart->where($map)->sum('power'));
            $power_result_month[$i] = $chart->where($map)->sum('power');
            $energy_result_month[$i] = $chart->where($map)->sum('energy');
        } 
        $result = [$power_result_month,$energy_result_month];
        $this->ajaxReturn($result);
    }
    public function trouble_times() {
        $chart_name = 'trouble_copy';
        $chart = M($chart_name);
        $days = "2016-11-";
        for ($i=1; $i < 23; $i++) { 
            $day = '';  
            if (i < 10) {
                $day = $days.'0'.$i;
            } else {
                $day = $days.$i;
            }
            $map['start_time'] = array("between",array($day.' 05:00:00',$day.' 19:00:00'));
            $map['t_level'] = "故障";
            $map['_logic'] = 'and';
            $trouble[$i]['trouble'] = $chart->where($map)->select();
            // $trouble_times[$i]['trouble'] = $chart->where($map)->count('t_level');
            $map['t_level'] = "报警";
            $trouble[$i]['warning'] = $chart->where($map)->select();
            // $trouble_times[$i]['warning'] = $chart->where($map)->count('t_level');
        }
        
        //dump($trouble_times);
        //$this->ajaxReturn($trouble_times);
        $this->ajaxReturn($trouble);

    }
  
    public function get_station_name(){
        session_start();
        echo $_SESSION['station_name'];
    }      
}
