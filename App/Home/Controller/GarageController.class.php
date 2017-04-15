<?php
/**
 * Created by PhpStorm.
 * User: chenking
 * Date: 2017/3/9
 * Time: 15:09
 */

namespace Home\Controller;


use Home\Model\File;
use Think\Controller\RestController;
use Think\Db;
use Think\Log;
use Think\Model;

class GarageController extends RestController
{

    protected $defaultType = "json";
    protected $defaultMethod = "post";

    function index()
    {
        //展示给汽车维修厂
        $name = I("NAME", "");
        $password = I("PASSWORD", "");
        $arr = array(
            'NAME' => $name,
            'PASSWORD' => $password
        );
        if ($name != null && $password != null) {
            $this->response(json_encode($arr));

        } else {
            $this->response(json_encode(array(
                "STATUS" => "there are some error"
            )));
        }

    }

    function dinastinc()
    {
        //诊断车辆信息

    }

    function addinfo()
    {
        //添加信息到blockchain


    }

    function iot()
    {
        $this->display('./Public/IOT.html');
    }

    function fillForm()
    {
        $this->display('./Public/fillForm.html');
    }

        function backHome()
        {
            $this->display('./Public/index.html');
        }

    // regiser garage save in the database
    function register(){
       

        $name=I('post.name','ken');
        $tel=I('post.tel','1780107');
        $address=I('post.address','shanghai');

        $model=array(
            'username'=>$name,
            'telphone'=>$tel,
            'address'=>$address,
            'type'=>'garage'
        );


        //把数据放到id为关键点的文件中，直接读取
        file_put_contents($name.'.json',json_encode($model));

        $this->response(json_encode(array('status'=>200,'msg'=>'success')),'json');
    }


}