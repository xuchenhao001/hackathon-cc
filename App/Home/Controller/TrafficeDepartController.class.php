<?php
/**
 * Created by PhpStorm.
 * User: chenking
 * Date: 2017/3/11
 * Time: 11:45
 */

namespace Home\Controller;


use Think\Controller\RestController;

class TrafficeDepartController extends RestController
{
    protected $defaultMethod='post';
    protected $defaultType='json';

    function index(){
            $this->display('./Public/searchvideo.html');
    }

}