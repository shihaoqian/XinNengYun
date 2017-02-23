<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class UserController extends Controller{
	public function index(){
		//echo// "sdfsd";
		//$this->display('./Application/Home/View/User/index.html');
		$this->display();
	}
	public function test(){
		echo "uesr";
	}
	public function Register(){
		$this->display();
	}
	public function model(){
		mysql_query("SET NAMES 'utf8'");
		//创建model基类，传递test_user表
		//$user=new model('test_user','','mysql://root:sjc528@localhost/test');
		$user=new model('test_user');
		// dump($user->select());
		//$t = $user->select();
		// echo $t[0]['passwd'];

		//$this->assign('a', $t[0]['passwd']);
		//return $this->display('Index/index');
		//dump($user->select());

		//原生sql
		//var_dump($user->query("select * from test_user where id='1'"));  //读操作
		//var_dump($user->execute("update test_user set password='fjfkj' where id='1'"));  //写操作
		//tp查询,字符串方式  (安全性不高)
		//var_dump($user->where('id="1" AND 。。。。')->select());

		//tp查询，数组，安全度高点
		/*
		$condition['id']="1";
		$condition['password']="三等分角";
		$condition['_logic']='OR';
		var_dump($user->where($condition)->select());
		*/
		//tp查询，对象方法
		/*
		$condition=new \stdClass();  //命名空间设为 根目录
		$condition->id='1';
		$condition->-logic='OR';
		var_dump($user->where($condition)->select());
		*/
	
		//表达式查询    (=，》，《。。。。)
		//$map['id']=array('eq','1');   // =
		//$map['id']=array('neq','1');   // !=
		//$map['id']=array('egt','1');    //>=
		//$map['id']=array('lt','1');   // <
		//$map['id']=array('elt','1');   // <=
		//$map['id']=array('[not]like','%1%');    //模糊查询
		//$map['id']=array('[not] between','1,3');
		//$map['id']=array('[not] in','1,2,3,4');
		//$map['id']=array('exp','=1');
		//$map['id']=array('exp','in(1,2,3)');
		//var_dump($user->where($map)->select());
		

		//组合查询
		/*
		$map['id']=array('eq','1');
		$map['_query']='password=ds&email=dfkdk&_logic=OR';
		$map['_logic']='OR';
		var_dump($user->where($map)->select());
		*/
	
		//统计查询
		//var_dump($user->count('id'));
		//var_dump($user->max('id'));
		//var_dump($user->min('id'));
		//var_dump($user->avg('id'));
		

		//动态查询
		//var_dump($user->getFieldBypassword('ggg','id'));  //找到ggg的id
	}
	public function user_login(){
		$user=new model('test_user');
		$data['id']=$_POST['id'];
		$data['password']=$_POST['password'];
		//dump($user->create($data));
		if($data['id']==''){
			//echo "用户名不能为空";
			echo "user_empty";
			return ;
		}
		if($data['password']==''){
			//echo "密码不能为空";
			echo "password_empty";
			return ;
		}
		//$result=($user->where($data['id'])->select());
		$result_id = ($user->query("select * from test_user where id='".$data['id']."'"));
		//$result="select * from test_user where id =$data['id']";
		if(sizeof($result_id)==0){
			//echo "用户名不存在";
			echo "user_not_exist";
		}
		if (sizeof($result_id)==1) {
			$result_password=$user->where("id='".$data['id']."'")->getField('password');
			if ( $result_password==$data['password']) {
			 	//echo "登陆成功";
			 	session_start();
				$_SESSION["id"]=$data['id'];
				$_SESSION["id_temp"]=$data['id'];
				echo "success";
				return ;
			}
			else{
				//echo "密码输入错误";
				echo "password_wrong";
				return ;
			}
		}
	}
	public function user_register(){
		$user=new model('test_user');
		$data['phone']=$_POST['phone'];
		$data['id']=$_POST['id'];
		$data['password']=$_POST['password'];
		
		if($data['phone']==''){
			//echo "手机号不能为空";
			echo "phone_empty";
			return ;
		}
		if($data['id']==''){
			//echo "用户名不能为空";
			echo "user_empty";
			return ;
		}
		if($data['password']==''){
			//echo "密码不能为空";
			echo "password_empty";
			return ;
		}
		if (strlen($data['phone'])!=11) {
			//手机号长度有误
			echo "phone_wrong";
			return ;
		}
		$result_phone = ($user->query("select * from test_user where phone='".$data['phone']."'"));
		//$result="select * from test_user where id =$data['id']";
		if(sizeof($result_phone)!=0){
			//echo "该手机号已存在";
			echo "user_phone_exist";
			return ;
		}


		if (sizeof($result_phone)==0) {
			$result_id = ($user->query("select * from test_user where id='".$data['id']."'"));
			if(sizeof($result_id)!=0){
				//echo "用户名已存在";
				echo "user_has_exist";
				return;
			}
			else{
				$User_add=array(
					'phone'=>$data['phone'],
					'id'=>$data['id'],
					'password'=>$data['password']
				);
				if($user->add($User_add)){
					//注册成功
					echo "register_success";
					return ;
				}
			}
		}
	}
	public function company_register(){
		$company_user=new model('test_company');
		$data['company_name']=$_POST['company_name'];
		$data['company_phone']=$_POST['company_phone'];
		$data['id']=$_POST['id'];
		$data['password']=$_POST['password'];

		if($data['company_name']==''){
			//echo "公司名称不能为空";
			echo "company_name_empty";
			return ;
		}
		if($data['company_phone']==''){
			//echo "管理员电话不能为空";
			echo "company_phone_empty";
			return ;
		}
		if($data['id']==''){
			//echo "用户名不能为空";
			echo "user_empty";
			return ;
		}
		if($data['password']==''){
			//echo "密码不能为空";
			echo "password_empty";
			return ;
		}
		if (strlen($data['company_phone'])!=11) {
			//管理员手机号长度有误
			echo "company_phone_wrong";
			return ;
		}

		$result_phone = ($company_user->query("select * from test_user where phone='".$data['company_phone']."'"));
		//$result="select * from test_user where id =$data['id']";
		if(sizeof($result_phone)!=0){
			//echo "该手机号已存在";
			echo "company_phone_exist";
			return ;
		}
		if (sizeof($result_phone)==0) {
			$result_id = ($company_user->query("select * from test_company where id='".$data['id']."'"));
			if(sizeof($result_id)!=0){
				//echo "用户名已存在";
				echo "user_has_exist";
				return;
			}
			else{
					$user=new model('test_user');
					$User_add=array(
						'phone'=>$data['company_phone'],
						'id'=>$data['id'],
						'password'=>$data['password']
					);
					$Company_add=array(
						'company_name'=>$data['company_name'],
						'company_phone'=>$data['company_phone'],
						'id'=>$data['id'],
						'password'=>$data['password']
					);
					if($user->add($User_add)&&$company_user->add($Company_add)){
						//注册成功
						echo "register_success";
						return ;
				}
			}
		}
	}
}
