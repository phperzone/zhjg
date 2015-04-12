<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	public funcfion checkuser($username,$pwd){
		$user = $this->where(array('name'=>$username))->find();
		if($user){
			if($pwd == md5(md5($pwd).$user['salt'])){
				
			}else{
				echo;
			}

		}
	}
}
