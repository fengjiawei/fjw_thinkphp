<?php
namespace qiantai\Controller;

use Think\Controller;


class CarController extends Controller
{
    //车源信息
    public function listcar()
    {
        $result = http_post_json(url . "unite/queryPublicCar.json", json_encode($_GET));
        if (json_decode($result)->result == 'success') {
            echo $result;
        }
    }

    public function lookgoods()
    {
        $result = http_post_json(url . "unite/queryPublicGoods.json", json_encode($_GET));
        if (json_decode($result)->result == 'success') {
            echo $result;
        }
    }

    //抢单报价
    public function quote()
    {
        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
            $_POST['carId'] = 0;
            $result = http_post_json(url . "unite/priceGoods.json", json_encode($_POST));
            echo $result;
        }
    }
    //推送货源的抢单报价
    public function priceGoodsMessage(){
        $_POST['session'] =  $_SESSION['session'];
//        echo json_encode($_POST);
        returnJson('message/priceGoodsMessage.json',$_POST);
    }
    //查看车源
    public function lookcar(){
        returnJson("unite/queryPublicCar.json", $_GET);
    }
    //订车列表
    public function rentalList(){
        $_GET['session'] = $_SESSION['session'];
        $_GET['mode'] = "";
        returnJson("rental/rentalList.json",$_GET);
    }
    //取消订车
    public function cancelCar(){
        $_POST['session'] = $_SESSION['session'];
//        echo json_encode($_POST);
        returnJson("rental/abortRental.json",$_POST);
    }
    //订车
    public function orderCarPush(){
        $_POST['session'] = $_SESSION['session'];
//        echo json_encode($_POST);
        returnJson("rental/rentalCar.json",$_POST);
    }

    //选取订车列表中的社会车辆运输
    public function appointOrder(){
        $_POST['session'] = $_SESSION['session'];
//        echo json_encode($_POST);
        returnJson("rental/appointOrder.json",$_POST);
    }
    //重新报价
    public function renewPrice(){
        $_POST['session'] = $_SESSION['session'];
        returnJson("unite/renewPrice.json",$_POST);
    }

    //我的报价
    public function myPrice()
    {
        $this->myCar();
        $this->display();

    }

    public function price()
    {
        $_GET['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/newCarList.json", json_encode($_GET));
        if (json_decode($result)->result == 'success') {
            echo $result;
        }
    }

    //获取推送货源信息
    public function goodsMessage()
    {
        $_GET['session'] = $_SESSION['session'];
        $_GET['mode'] = "";
//        echo json_encode($_GET);
        returnJson('message/goodsMessages.json', $_GET);
    }
    //通过id查看货源详情
    public function findGoodById(){
        returnJson('unite/queryGoodsInfo.json',$_POST);
    }

    //惊醒中订单

    public function order()
    {
        $_GET['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/currentCarList.json", json_encode($_GET));
        if (json_decode($result)->result == 'success') {
            echo $result;
        }
    }

    //回单（已完成订单—）

    public function receipt()
    {
        $_GET['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/finishedCarList.json", json_encode($_GET));
        if (json_decode($result)->result == 'success') {
            echo $result;
        }
    }

    //拒绝承运
    public function reply()
    {
        if ($_POST) {
            $_POST['reply'] = 'no';
            $_POST['session'] = $_SESSION['session'];
            $result = http_post_json(url . "unite/replyOrder.json", json_encode($_POST));
            echo $result;
        }
    }

    //接受实际运费
    public function replyCost()
    {
        if ($_POST) {
            $_POST['reply'] = 'yes';
            $_POST['session'] = $_SESSION['session'];
            $result = http_post_json(url . "unite/replyCost.json", json_encode($_POST));
            echo $result;
        }
    }

//    接受杂费
    public function replyExtras()
    {
        if ($_POST) {
            $_POST['reply'] = 'yes';
            $_POST['session'] = $_SESSION['session'];
            $result = http_post_json(url . "unite/replyExtras.json", json_encode($_POST));
            echo $result;
        }
    }

    // 接单
    public function orders()
    {
        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
            $_POST['price'] = "0";
//            echo json_encode($_POST);
            $result = http_post_json(url . "unite/selectCar.json", json_encode($_POST));
            echo $result;
        }
    }

    //我的车队
    public function car()
    {
        $params['indexId'] = 0;
        $params['direction'] = "";
        $params['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/queryOwnCar.json", json_encode($params));
        if (json_decode($result)->result == 'success') {
            //将子对象转化为数组
//            $list = json_decode(json_encode(json_decode($result)->list),true);
//            $this->assign('mycarresourelist',$list);
            $list = json_encode(json_decode($result)->list);
            echo $list;
        }
    }

    private function myCar()
    {
        $params['indexId'] = 0;
        $params['direction'] = "";
        $params['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/queryOwnCar.json", json_encode($params));
        if (json_decode($result)->result == 'success') {
            //将子对象转化为数组
            $list = json_decode(json_encode(json_decode($result)->list), true);
            $this->assign('mycarresourelist', $list);
        }
    }

    private function socialCar()
    {
        $params['indexId'] = 0;
        $params['direction'] = "";
        $params['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/queryOwnCar.json", json_encode($params));
        if (json_decode($result)->result == 'success') {
            //将子对象转化为数组
            $list = json_decode(json_encode(json_decode($result)->rows), true);
            $this->assign('socialCarList', $list);
        }
    }

    //创建车队
    public function createCar()
    {
        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
//            echo json_encode($_POST);
            $result = http_post_json(url . "unite/createCarUser.json", json_encode($_POST));
            echo $result;

        }
    }

    //修改车队信息
    public function updateCar()
    {
        $_POST['carSize'] = $_POST['len'];
        $_POST['carType'] = $_POST['type'];
        $_POST['carLoad'] = $_POST['load'];
        $_POST['session'] = $_SESSION['session'];
//        dump($_POST);
        $result = http_post_json(url . "unite/udpateCarUser.json", json_encode($_POST));
        echo $result;
    }

    //删除车队
    public function deleteCar()
    {
        $_POST['session'] = $_SESSION['session'];
//        dump($_POST);
        $result = http_post_json(url . "unite/deleteCarUser.json", json_encode($_POST));
        echo $result;
    }


    //账号管理
    public function manage()
    {
        $params['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/accountInformation.json", json_encode($params));
        if (json_decode($result)->result == 'success') {
//            //将子对象转化为数组
            $list = json_decode($result, true);
            $this->assign('list', $list);
        }
        $this->display();
    }

    public function safety()
    {
        $_POST['session'] = $_SESSION['session'];
//        print_r($_POST);
        $result = http_post_json(url . "unite/securityInformation.json", json_encode($_POST));
        if (json_decode($result)->result == 'success') {
//            //将子对象转化为数组
            $list = json_decode($result, true);
            $this->assign('list', $list);
//            $list = json_encode(json_decode($result)->list);
//            dump($list);
        }
        $this->display();
    }

    //密码修改
    public function resPw()
    {
        $_POST['session'] = $_SESSION['session'];
        $result = http_post_json(url . "user/password.json", json_encode($_POST));
        echo $result;

    }

    //提交认证消息
    public function authCompany()
    {
        $_POST['session'] = $_SESSION['session'];
//        print_r($_POST);
        $result = http_post_json(url . "unite/authTransport.json", json_encode($_POST));
        echo $result;
    }

    //认证信息
    public function authentication()
    {
        $params['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/transportAuthentication.json", json_encode($params));
        if (json_decode($result)->result == 'success') {
//            //将子对象转化为数组
            $list = json_decode($result, true);
            $this->assign('list', $list);
        }
        $this->display();
    }

    public function binding(){
        $params['account'] = $_SESSION['account'];
        $result = http_post_json(url . "user/queryBinding.json", json_encode($params));
        if(json_decode($result)->result == 'success'){
            $this->assign('info',json_decode($result, true));
        }

        $this->display();
    }
    public function bind(){
        returnJson('user/newBinding.json',$_POST);
    }


}