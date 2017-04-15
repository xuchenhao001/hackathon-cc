<?php

/**
 * Created by PhpStorm.
 * User: KEN
 * Date: 2016/5/8
 * Time: 14:48
 */
namespace Home\Model;
use Think\Controller\RestController;
use Think\Model;

class Response extends RestController
{
    /**
    按照JSON方式输出通信数据
     * @param integer $code 状态码
     * @param string $message 提示信息
     * @param array $data 数据
     * return string
     */
    public  function json($code,$message='',$data=array()){
        if(!is_numeric($code))
        {
            return '';
        }
        $result=array('CODE'=>$code,
            'MESSAGE'=>$message,
            'DATA'=>$data);
        $this->response($code,'json',$result);
      
    }
    
}