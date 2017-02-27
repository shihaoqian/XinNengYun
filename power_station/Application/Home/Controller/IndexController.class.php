<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    public function system_index(){
        $this->display();
    }
    public function index(){
		//$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	$this->display('system_index');
    }
    public function lockScreen(){
    	$this->display();
    }
    public function test(){
    	echo "fun";
    }
    //电站首页信息预览(地图左边)
    public function station_overview(){
    	//echo 1;
    	$overview=new model('station_overview');
    	$result=$overview->select();
    	//echo $result[0]['station_number'];
    	$this->ajaxReturn($result);
    	//return $result;
    }
    //地图信息预览(地图上)
    public function user_name(){
    	session_start();
    	echo $_SESSION["id"];
    	return ;
    }
    public function map_info(){
    	//获得用户的id，根据id绘制每个用户对应的电站信息(在地图上等)
    	 session_start();
    	// echo $_SESSION["id"];
    	$condition['user_id']=$_SESSION["id"];
    	$map=new model('station_info');
    	$result=$map->where($condition)->order("station_name")->select();
    	$this->ajaxReturn($result);
    }
    //验证密码是否解锁
    public function unlock(){
    	//echo $_POST['password'];
    	session_start();
    	$pass=new model('test_user');
    	$result_password=$pass->where("id='".$_SESSION["id_temp"]."'")->getField('password');
    	if ($result_password==$_POST['password']) {
    		$_SESSION["id"] = $_SESSION["id_temp"];
    		echo 1;
    		return ;
    	} 
    	else {
    		$_SESSION["id"]=NULL;
    		echo 0;
    		return ;
    	}	
    }
    //获取个人信息
    public function per_info(){
    	session_start();
    	// echo $_SESSION["id"];
    	$condition['id']=$_SESSION["id"];
    	$per=new model('test_user');
    	$result=$per->where($condition)->select();
    	$this->ajaxReturn($result);
    }
    //修改用户密码
    public function change_passwd(){
    	if ($_POST['newpwd']!=$_POST['newpwdconfirm']) {
    		echo -1;
    		return ;
    	}
    	session_start();
    	$pass=new model('test_user');
    	$result_password=$pass->where("id='".$_SESSION["id"]."'")->getField('password');
    	if ($result_password!=$_POST['oldpwd']) {
    		echo 0;
    		return ;
    	}
    	if ($result_password==$_POST['oldpwd']){
    		$modify['password']=$_POST['newpwd'];
    		$result=$pass->where("id='".$_SESSION["id"]."'")->save($modify);
    		echo 1;
    		return ;
    	}
    }
    //删除电站
    public function delete_station(){
		$delete=new model('station_info');
		
		for ($i=0; $i <sizeof($_POST['station_name']); $i++) { 
			$result=$delete->where("station_name='".$_POST["station_name"][$i]."'")->delete();
			break;
			if ($result==false) {
				break;
			}
		}
		if ($result==false) {
			echo -1;
			return ;
		}
		else{
			echo 1;
			return ;
		}
    }

    //增加电站
    public function add_station(){
    	session_start();
    	$add=new model('station_info');
    	$data['user_id']=$_SESSION["id"];
    	$data['station_name']=$_POST['new_name'];
    	$data['station_location']=$_POST['new_location'];
    	$result=$add->add($data);
    	if ($result==false) {
    		echo -1;
    		return ;
    	}
    	else{
    		echo 1;
			return ;
    	}

    }


    //销毁session
    public function destroy_session(){
    	session_unset();
		session_destroy();
    }
}