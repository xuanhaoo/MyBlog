<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 前台首页
 */
class IndexController extends Controller {
    public function index(){
       $this->display();
    }
}