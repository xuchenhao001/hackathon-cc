<?php
/**
 * Created by PhpStorm.
 * User: chenking
 * Date: 2017/3/9
 * Time: 21:40
 */

namespace Home\Controller;


use Think\Controller\RestController;

class DealerController extends RestController
{

    //show data for dealer
    function index(){
        $this->display('./Public/search_car.html');
    }

}