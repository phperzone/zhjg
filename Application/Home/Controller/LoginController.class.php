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
		C('TOKEN_ON',false);
	}
	public function index(){
		if(IS_POST){
			$this->login();
		}else{
			$this->assign('trades',$this->trades);
			$this->assign('expert',$this->expert);
			$this->assign('register_url',U('Login/register'));
			$this->assign('login_url',U('Login/login'));
			$this->display('login/login');
		}
	}
	public function login(){
		$User = D("User"); // 实例化User对象
		 // 手动进行令牌验证
		 if (!$User->autoCheckToken($_POST)){
		 // 令牌验证错误
		 	$_d['accessGranted'] = false;
		 	$this->ajaxReturn($_d);
		 }
		 $username = I('post.username');
		 $pwd = I('post.passwd');
		 if($username && $pwd){
		 	$userinfo = $User->checkuser($username,$pwd);
		 	print_r($userinfo);
		 	if($userinfo){
		 		$this->success('登陆成功',U('Index/index'));
// 				$data['status'] = 1;
// 				$data['url'] = U('Index/index');
				
		 	}else{
// 		 		$data['status'] = 0 ;
// 		 		$data['url'] = U('Login');
// 		 		$this->error('登陆信息有误，请重新填写',U('Login/index'));
		 	}
// 		 	$this->ajaxReturn($data);
		 }
		
	}
	public function register(){
		if(IS_POST){
// 			print_r($_POST);
			$User = D("User"); // 实例化User对象
			#create 方法自动校验
// 			if (!$User->autoCheckToken($_POST)){ 
// 				$this->error('令牌错误'); 
// 			}
			if (!$User->create()){ // 创建数据对象     // 如果创建失败 表示验证没有通过 输出错误提示信息    
				 exit($User->getError());
			}else{     // 验证通过 写入新增数据
				$User->salt = generate_rand(6);   
				 $User->passwd = md5(md5($User->passwd).$User->salt);
				 if($User->add()){
				 	$this->success('注册成功',U('Login/index'));
				 }
			}
		}else{
			$this->display('login/register');
		}
	}
}