<?php
/**
 * Created by PhpStorm.
 * User: fengjiawei
 * Date: 15/8/2
 * Time: 上午1:58
 */
function getData(){
    $data = array();
    for($i=0;$i<10;$i++){
        $data[$i]['name']='user-'.$i;
        $data[$i]['age'] = rand(18,90);
    }
    return $data;
}
