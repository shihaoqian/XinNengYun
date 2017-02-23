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
}