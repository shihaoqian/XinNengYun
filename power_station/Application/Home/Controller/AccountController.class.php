<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class AccountController extends Controller {
    public function get_station_name(){
        echo $_SESSION['station_name'];
    }
}
