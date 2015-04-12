<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$this->show("<h2> hello world !!!</h2>");
    }
}