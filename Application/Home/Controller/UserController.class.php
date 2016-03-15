<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
//        echo 'user.index';
//        $this->success('成功跳转',U('User/login'),2);
//        $this->ajaxReturn(getData(),'json');
       dump(I('server.HTTP_HOST')) ;
    }
    public function edit(){
        echo 'user.edit';
    }
    public function login(){
        echo 'user.login';
    }
}