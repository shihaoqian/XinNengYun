<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class ManagementController extends Controller {
	public function get_station_name(){
		session_start();
        echo $_SESSION['station_name'];
    }
}