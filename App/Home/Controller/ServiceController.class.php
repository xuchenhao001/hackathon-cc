<?php
/**
 * Created by PhpStorm.
 * User: chenking
 * Date: 2017/3/12
 * Time: 02:42
 */

namespace Home\Controller;


use Think\Controller\RestController;

class ServiceController extends RestController
{
    protected $defaultType='json';
    protected $defaultMethod='post';
    //给出结束报告
    function getinsurance(){
        $cardid=I('post.cardid',0);
        //根据驾照获取车辆的投保信息，可以从blockchain，也可以从json中获取

        $data=array(

        );
        $this->ajaxReturn($data,'json');


    }

}