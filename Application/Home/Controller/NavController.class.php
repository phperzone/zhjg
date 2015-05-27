<?php
namespace Home\Controller;
use Think\Controller;
class NavController extends Controller {
    public function index(){
    	echo "string";
    	//$list = D('Nav')->navlist();
    	print_r($list);
    }
    public function test(){
    	echo "string";
    }
}