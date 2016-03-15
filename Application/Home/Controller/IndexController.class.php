<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

//    public function _before_index(){
//        echo 'index.before<br>';
//    }
    public function index(){
        echo 'hello';
        $this->listActionsUrl();
    }

    private function listActionsUrl(){
        echo "当前模式：".C('URL_MODEL');
        echo "<hr>";

        echo "User控制器index操作方法到URL时：<a href = \"".U('Home/User/index')."\">".U('Home/User/index')."</a><hr>";
        echo "User控制器edit操作方法到URL时：<a href = \"".U('Home/User/edit')."\">".U('Home/User/edit')."</a><hr>";
        echo "User控制器login操作方法到URL时：<a href = \"".U('Home/User/login')."\">".U('Home/User/login')."</a><hr>";

    }

//    public function _after_index(){
//        echo 'index.after<br>';
//    }
}