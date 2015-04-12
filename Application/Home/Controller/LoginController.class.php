<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function index(){
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
			echo 'ok';
			$username = I('post.username');
			if(1){

			}
		}else{
			$this->display('login/register');
		}
	}
}