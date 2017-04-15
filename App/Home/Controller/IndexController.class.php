<?php
namespace Home\Controller;

use Home\Model\File;
use Home\Model\Response;
use Org\Util\ArrayList;
use Think\Controller;
use Think\Controller\RestController;
use Think\Log;
use Think\Model;

class IndexController extends RestController
{
    protected $defaultType = 'json';

    public function index()
    {
        $this->display('./Public/index.html');
    }

    public function test()
    {

        $result = Array(
            'NAME' => 'CQB',
            'PASSWORD' => 'BIT_hackthon',
            'SEX' => 'male'
        );


        $this->response(json_encode($result));

    }

    /*
    展示页面,具体的数据

    */

    function jumpToLogin()
    {
        $this->display('./Public/login.html');
    }


    function returnHome()
    {
        $this->display('./Public/index.html');
    }


    //查看video
    function lookvideo()
    {
        $this->display('./Public/searchvideo.html');
    }

    //播放视频
    function playvideo()
    {
        //获取参数，然后去跳转

        $this->assign("src", "1_clip.mp4");
        $this->display('./Public/playvideo.html');

    }

    function jumpToRegister()
    {
        $this->display('./Public/register.html');
    }


    function check()
    {
        $TYPE = $_POST["type"];
        if ($TYPE == "insurance") {
            $result = Array(
                'RESULT' => 'insurance'
            );
        } else if ($TYPE == "garage") {
            $result = Array(
                'RESULT' => 'garage'
            );
        } else if ($TYPE == "customer") {
            $result = Array(
                'RESULT' => 'customer'
            );
        } else if($TYPE == "traffic"){
            $result = Array(
                'RESULT' => 'traffic'
            );
        }else{
        $result = Array(
                        'RESULT' => 'false'
                    );
        }
        $this->response(json_encode($result));
    }

    function jumpToCustomer()
    {
        $this->display('./Public/search_car.html');
    }


    function jumpToGarage()
    {
        $this->display('./Public/fillForm.html');
    }

    function jumpToInsurance()
    {
        $baseinfo=array(
            'Fullname'=>'Kevin Carter',
            'Factory'=>'BMW',
            'Position'=>'hipping Manager',
            'VIN'=>'3XUI78',
            'DriverCard'=>'3213897',
            'CarType'=>'Small',


        );
        $this->assign("baseinfo",$baseinfo);
        $this->display('./Public/report.html');
    }


    function registerForGarage()
    {
        $this->display('./Public/registerForGarage.html');
    }

    function registerForInsurence()
    {
        $this->display('./Public/registerForInsurance.html');
    }

    function registerForCustomer()
    {
        $this->display('./Public/registerForCustomer.html');
    }

    function registerForTraffic()
    {
        $this->display('./Public/registerForTraffic.html');
    }


    /**
     * 发起一个post请求到指定接口
     *
     * @param string $api 请求的接口
     * @param array $params post参数
     * @param int $timeout 超时时间
     * @return string 请求结果
     */
    function postRequest($api, array $params = array(), $timeout = 30)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        // 以返回的形式接收信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 设置为POST方式
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        // 不验证https证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
            'Accept: application/json',
        ));
        // 发送数据
        $response = curl_exec($ch);
        // 不要忘记释放资源
        curl_close($ch);
        return $response;
    }

    //获取保险事件
    function GetInsuranceEvent()
    {
        $carid=I('post.carid','ASDF1234');
        $param = array('CAR_ID' => $carid);
        $api = 'https://ct-test-node.au-syd.mybluemix.net/GetInsuranceEvent';
        $result = $this->postRequest($api, $param);
        $this->ajaxReturn($result,'json');

    }

    //推送数据到数据库blockchain
    /*
     *
     * @param ID event_id
     * @param ID_car
     * @param Image video link
     * @param IOT 所有的IOT字符串组合
     * */
    function PutEvent()
    {

        $id=I('post.id',1);
        $id_card=I('post.id_card','ASDF1234');
        $owner=I('post.owner','Krid Jinklub');
        $daycode=I('post.daycode','2016 Mar 4');
        $location=I('post.location','上海');
        $image=I('post.image','car1.mp4');
        $describe=I('post.describe','test data');
        $iot=I('post.iot',null);
        $api = 'https://ct-test-node.au-syd.mybluemix.net/PutEvent';
        $param = array(
            "ID" => $id,
            "ID_CAR" => $id_card,
            "OWNER" => $owner,
            "DAY_CODE" => $daycode,
            "LOCATION" => $location,
            "IMAGE" => $image,
            "DESCRIBE" => $describe,
            "IOT" => $iot
        );
        $result = $this->postRequest($api, $param);
        //var_dump($result);
        $this->ajaxReturn($result,'json');
    }

    //获取事件线
    function getTimeline()
    {
        //查询所有的历史消息
        $param = array('CAR_ID' => I('post.carid','ASDF1234'));
        $api = 'https://ct-test-node.au-syd.mybluemix.net/GetTimeline';
        $result = $this->postRequest($api, $param);
        $this->ajaxReturn($result,'json');

    }

    //获取insurance
    function insurance_event(){

        $result=file_get_contents('insurance_event.json');
        $this->response($result,'json',200);
    }
    //获取illegalrecord
    function illegalrecord(){
        $result=file_get_contents('illegalrecord_event.json');
        $this->response($result,'json',200);

    }
    //获取维修记录
    function maintenceevent(){
        $result=file_get_contents('maintence_event.json');

        $this->ajaxReturn($result,'json',200);

    }

    function link(){
        $this->display('./Public/linkall.html');
    }






}