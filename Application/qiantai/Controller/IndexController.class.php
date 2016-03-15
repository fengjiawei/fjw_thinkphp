<?php
namespace qiantai\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
{
    $this->assign('user', $_SESSION['user']);
    $this->assign('info', $_SESSION['info']);
    $this->display();
}

    public function home()
    {
        $this->listgood();
        $this->listcar();

        $this->display();
    }

    /**
     * 货源
     */
    public function listgood()
    {
//        $good = new GoodinfoModel('Goodinfo');
//        $goodlist = D('Goodinfo')->getlistgood();
//        $this->assign('good', $goodlist);
        $params['limit'] = 10;
        $params['offset'] = 0;
        $params['startDate'] = "";
        $params['endDate'] = "";
        $params['startStation'] = "";
        $params['endStation'] = "";
//        print_r(json_encode($params));
        $result = http_post_json(url . "unite/queryPublicGoods.json", json_encode($params));

        if (json_decode($result)->result == 'success') {
            //将子对象转化为数组
            $list = json_decode(json_encode(json_decode($result)->rows), true);
            $this->assign('good', $list);
        }

    }

    /**
     * 车源
     */
    public function listcar()
    {

        $params['limit'] = 10;
        $params['offset'] = 0;
        $params['startStation'] = "";
        $params['endStation'] = "";
        $params['carType'] = "";
        $params['carLen'] = "";
        $params['carLoad'] = "";
        $result = http_post_json(url . "unite/queryPublicCar.json", json_encode($params));
        //将返回的json转化为数组
//        $data = json_decode($result,true);
        //将数组转化为对象
//        if(json_decode(json_encode($data))->result=='success'){
        //json转化成对象
        if (json_decode($result)->result == 'success') {
            //将子对象转化为数组
            $this->assign('car', json_decode(json_encode(json_decode($result)->rows), true));
        }


    }

    /**
     * 注册
     */
    public function reg()
    {
        if ($_POST) {
            $result = http_post_json(url . "user/newRegister.json", json_encode($_POST));
            echo $result;
        }
    }

    /**
     * 短信验证码
     */
    public function smsCode()
    {
        if ($_POST) {
        //json
        $result = http_post_json(url . "user/smsCode.json", json_encode($_POST));
        echo $result;
    }
    }

    /**
     *登陆
     */
    public function login()
    {
//        $verify = $_POST['verify'];
//        $result = check_verify($verify);
//
//        if ($result != 1) {
//            $msg['ver'] = 'false';
//            $this->ajaxReturn($msg);
//        } else {
//            if ($_POST) {
//                $result = http_post_json(url . "unite/userLogin.json", json_encode($_POST));
//                $data = json_decode($result);
//                if ($data->result == 'success') {
////                    //用户名
//                    $_SESSION['name'] = $data->name;
////                    //用户类型
//                    $_SESSION['type'] = $data->type;
//                    $_SESSION['authentication'] = $data->authentication;
//                    $_SESSION['account'] = $data->account;
//                    $_SESSION['user'] = json_decode($result, true);
//                    //通信识别码
//                    $_SESSION['session'] = $data->session;
//                }
//            }
//            echo $result;
//        }
        $result = http_post_json(url . "user/newLogin.json", json_encode($_POST));
        $data = json_decode($result);
        if ($data->result == 'success') {
//                    //用户名
            $_SESSION['name'] = $data->name;
//                    //用户类型
            $_SESSION['type'] = $data->type;
            $_SESSION['authentication'] = $data->authent;
            $_SESSION['account'] = $data->account;
            $_SESSION['user'] = json_decode($result, true);
            //通信识别码
            $_SESSION['session'] = $data->session;
        }
        echo $result;

    }

    //退出登陆
    public function close()
    {
        session(null);
    }


    public function verify()
    {
        $config = array(
            'fontSize' => 18,    // 验证码字体大小
            'length' => 4,     // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    //找回密码
    //找回密码
    public function backPw()
    {
        $result = http_post_json(url . "user/findPassword.json", json_encode($_POST));
        echo $result;

    }

//编辑联系人信息
    public function updateContract()
    {
        $_POST['session'] = $_SESSION['session'];
        returnJson("unite/updateContactInfo.json", $_POST);
    }

    //评价
    public function comment()
    {
        //参数：orderId,score,content,session
        $_POST['session'] = $_SESSION['session'];
        returnJson('order/comment.json', $_POST);
    }
        //通过账号查找绑定手机好和绑定email
    public function binding(){
        returnJson('user/queryBinding.json',$_POST);
    }


}