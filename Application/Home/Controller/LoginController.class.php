<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public $expert;#擅长领域
	public $trades;#工种
	function __construst(){
		parent::__construst();
		$this->expert = array(
			'1'=>'建筑工程',
			'2'=>'装修工程',
			'3'=>'电力工程',
			'4'=>'农林牧渔工程'
			);
		$this->trades = array(
			'1'=>'高级技工',
			'2'=>'中技工',
			'3'=>'技工',
			'4'=>'学工'
			);
	}
	public function index(){
		$this->assign('trades',$this->trades);
		$this->assign('expert',$this->expert);
		$this->display('login/login');
	}
	public function login(){
		$User = M("User"); // 实例化User对象
		 // 手动进行令牌验证
		 if (!$User->autoCheckToken($_POST)){
		 // 令牌验证错误
		 	$_d['accessGranted'] = false;
		 	$this->ajaxReturn($_d);
		 }
		 $username = I('post.username');
		 $pwd = I('post.pwd');
		 if($username && $pwd){
		 	$userinfo = $User->checkuser($username,$pwd);
		 }

	}
	public function register(){
		if(IS_POST){
			$username = I('post.username');
			if(1){

			}
		}else{
			$this->display('login/register');
		}
	}
}