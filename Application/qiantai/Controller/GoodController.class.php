<?php
/**
 * Created by PhpStorm.
 * User: fengjiawei
 * Date: 15/8/5
 * Time: 下午4:39
 */

namespace qiantai\Controller;


use Think\Controller;
use Think\Page;

class GoodController extends Controller
{


    public function goodinfo()
    {
        $this->display();
    }

    public function good()
    {
        $result = http_post_json(url . "unite/queryPublicGoods.json", json_encode($_GET));
        if (json_decode($result)->result == 'success') {
            echo $result;
        }
    }

    /**
     * 我的货源
     */
    public function listMyGood()
    {
        $_GET['session'] = $_SESSION['session'];
//        $result = http_post_json(url . "unite/newGoodsList.json", json_encode($_GET));
//
//        if (json_decode($result)->result == 'success') {
//            echo $result;
//        }
        returnJson("unite/newGoodsList.json", $_GET);
    }
    //查看车源
    public function lookcar(){
        returnJson("unite/queryPublicCar.json", $_GET);
    }
    public function lookCompany(){
        returnJson("unite/queryPublicTransport.json", $_GET);
    }
    //推送货源
    public function pushGoods(){
//        echo json_encode($_POST);
        $_POST['session'] = $_SESSION['session'];
        returnJson('message/pushGoodsMessage.json',$_POST);
    }

    //进行中货单(订单查看)
    public function myGooding()
    {
        $this->display();
    }

    public function listmyGooding()
    {
        $_GET['session'] = $_SESSION['session'];
//        $result = http_post_json(url . "unite/currentGoodsList.json", json_encode($_GET));
//
//        if (json_decode($result)->result == 'success') {
//            echo $result;
//        }
        returnJson("unite/currentGoodsList.json",$_GET);
    }

    //订单跟踪
    public function orderTrack(){
//        $_POST['goodsId'] = "122";
//        $_POST['session'] = "98";
//        $_POST['session'] = $_SESSION['session'];
//        echo json_encode($_POST);
        echo json_encode($_POST);
//        $result = http_post_json("http://101.200.172.223:8080/goods/queryGoodsTrack.json", json_encode($_POST));
//
//        echo $result;
//        if (json_decode($result)->result == 'success') {
//            echo $result;
//        }
//        returnJson("goods/queryGoodsTrack.json",$_POST);

    }
    public function testpost(){
//        $params['goodsId'] = 122;
        $_POST['session'] = $_SESSION['session'];
//        $result = http_post_json(url . "goods/queryGoodsTrack.json", json_encode($_POST));
        returnJson("goods/queryGoodsTrack.json",$_POST);
//        echo $result;
//        $this->display();


    }

    //完成订单（我的回单）
    public function receipt()
    {
        $_GET['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/finishedGoodsList.json", json_encode($_GET));

        if (json_decode($result)->result == 'success') {
            echo $result;
        }
    }

    //查看报价
    public function modal()
    {
        $_SESSION['goodsId'] = $_GET['goodsId'];
        $this->display();
    }

    public function lookpricecompany()
    {

        $_params['indexId'] = 0;
        $_params['direction'] = "";
        $_params['session'] = $_SESSION['session'];
        $_params['goodsId'] = $_SESSION['goodsId'];
        //企业车主
        $result = http_post_json(url . "unite/enterprisePriceList.json", json_encode($_params));
        if (json_decode($result)->result == 'success') {
            $list = json_encode(json_decode($result)->list);
            echo $list;
        }
    }

    public function lookpriceperson()
    {

        $_params['indexId'] = 0;
        $_params['direction'] = "";
        $_params['session'] = $_SESSION['session'];
        $_params['goodsId'] = $_SESSION['goodsId'];
        //企业车主
        $result = http_post_json(url . "unite/personalPriceList.json", json_encode($_params));
        if (json_decode($result)->result == 'success') {
            $list = json_encode(json_decode($result)->list);
            echo $list;
        }
    }
    //重新报价
    public function regect(){
        $_POST['session'] = $_SESSION['session'];
        returnJson("unite/rejectPrice.json",$_POST);
    }

    //让它运，货主选定车主
    public function carry()
    {
        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
            $result = http_post_json(url . "unite/orderCar.json", json_encode($_POST));
            echo $result;
        }
    }

    //输入实际货物信息和运费信息
    public function costGoods()
    {

        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
//            dump($_POST);
            $result = http_post_json(url . "unite/actualGoods.json", json_encode($_POST));
            echo $result;
        }
    }

    //发货
    public function deliver()
    {
        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
            $result = http_post_json(url . "unite/deliveryGoods.json", json_encode($_POST));
            echo $result;
        }
    }

    //送达
    public function arrived()
    {
        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
            $result = http_post_json(url . "unite/arrivedGoods.json", json_encode($_POST));
            echo $result;
        }
    }

    //运损运费报价
    public function extrasGoods()
    {
        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
            $result = http_post_json(url . "unite/extrasGoods.json", json_encode($_POST));
            echo $result;
        }
    }

    //签收
    public function reveiveGoods()
    {
        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
            $result = http_post_json(url . "unite/receiveGoods.json", json_encode($_POST));
            echo $result;
        }
    }

    //发布货源
    public function save()
    {
        if ($_POST) {
            $_POST['session'] = $_SESSION['session'];
            $result = http_post_json(url . "unite/goodsPublish.json", json_encode($_POST));
            echo $result;

        }
    }
    public function lookImage(){
        $_POST['session'] = $_SESSION['session'];
        returnJson("order/submitedGoods.json",$_POST);
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
            $_SESSION['info'] = $list;
        }
        $this->display();
    }

    //认证信息
    public function authentication()
    {
        $params['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/companyAuthentication.json", json_encode($params));
        if (json_decode($result)->result == 'success') {
//            //将子对象转化为数组
            $list = json_decode($result, true);
            $this->assign('list', $list);
        }
        $this->display();
    }

    //提交认证消息
    public function authCompany()
    {
        $_POST['session'] = $_SESSION['session'];
//        print_r($_POST);
        $result = http_post_json(url . "unite/authCompany.json", json_encode($_POST));
        echo $result;
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

    //重置认证
    public function resetAuth()
    {
        $_POST['session'] = $_SESSION['session'];
        $result = http_post_json(url . "unite/resetAuth.json", json_encode($_POST));
        echo $result;
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