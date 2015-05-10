<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	public $_salt = '';
	protected $_validate = array(    
// 			 array('verify','require','验证码必须！'), //默认情况下用正则进行验证     
// 			 array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一     
// 			 array('alipay',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内     
// 			 array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致     
// 			 array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式 
			   );
	protected $_auto = array (         
		array('status','1'),  // 新增的时候把status字段设置为1         
// 		array('passwd','createpasswd',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理     
// 		array('salt' , 'getsalt',3,'function'),    
// 		array('name','getName',3,'callback'), // 对name字段在新增和编辑的时候回调getName方法  
		array('create_time','time',1,'function'), // 对update_time字段在更新的时候写入当前时间戳      
	 	array('update_time','time',3,'function'), // 对update_time字段在更新的时候写入当前时间戳    
	  );
	public function checkuser($username,$pwd){
		$user = $this->where(array('username'=>$username))->find();
		if($user){
			if($user['passwd'] == md5(md5($pwd).$user['salt'])){
				session('userid',$user['user_id']);
				session('username',$user['username']);
				$this->where(array('user_id'=>$user['user_id']))->save(array('last_login'=>time()));
				return $user;
			}else{
				return 0;
			}

		}
	}

}
