<?php
return array(
    //'配置项'=>'配置值'

    //数据库配置
    'DB_TYPE' => 'mysql',     // 数据库类型
    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_NAME' => 'qiantai56',          // 数据库名
    'DB_USER' => 'root',      // 用户名
    'DB_PWD' => 'root',          // 密码
    'DB_PORT' => '3306',        // 端口
    'DB_PREFIX' => 'fjw_',    // 数据库表前缀


//    'LOAD_EXT_CONFIG'       =>  'user',     //扩展配置文件
//        'ACTION_SUFFIX'         =>  'Action'    //操作方法后缀
//    'ACTION_BIND_CLASS'     =>  true,       //操作绑定到类
    'URL_MODEL' => 2,           //0：普通模式 2:充血模式
//    'URL_HTML_SUFFIX' => 'shhtml|html',//  伪静态后缀
    'TMPL_PARSE_STRING' => array(
        '__IMG__' => __ROOT__ . '/Uploads/img',

    ),

//    define('url', "http://123.56.90.5/"),
    define('url', "http://101.200.172.223:8080/"),
//    define('url', "http://127.0.0.1:8080/"),
);