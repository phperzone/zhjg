<?php
namespace Home\Model;
use Think\Model;
class NavModel extends Model{
	protected $tableName = 'homemenu';
	public function navlist($pid = 0){
		$pid = intval($pid);
		$_r = $this->where(array('pid'=>$pid))->select();
		foreach ($_r as $key => $value) {
			$_z = $this->where(array('pid'=>$value['id']))->select();
			if($_z){
				//$_r[$key]['son'][] = $this->navlist($value['id']);
			}
		}
		return $_r;
	}
}