<?php
/**
 * Created by PhpStorm.
 * User: KEN
 * Date: 2016/5/12
 * Time: 19:28
 */

namespace Home\Controller;


use Home\Model\Response;
use Home\Service\impl\UserImpl;
use Think\Controller\RestController;
use Think\Model;
use Think\Upload;


define('SALT_MD5', 'andy');

class UserController extends RestController
{


    protected $defaultMethod = 'get';
    protected $defaultType = 'json';


    protected function returnBack($data)
    {
        if (count($data)) {

            $this->response(json(200, 'success', $data), 'json');
            if(!$data){
                $this->response(json(300, 'success', $data), 'json');
            }
        } else {
            $this->response(json(400, 'fail'), 'json');
        }
    }

    /**
     *post
     */
    function insertTbUsers_post()
    {
        $param = getParameter(file_get_contents('php://input'));

        $user = array('login_name' => $param['phone'],
            'password' => $param['password']);
        $userimpl = new UserImpl();
        $data = $userimpl->insertRegisterUsers($user);
        self::returnBack($data);

    }

    /**
     *get
     */
    function login()
    {
        $loginName = $_GET['loginName'];
        // $pass = md5($_GET['password']);
        $pass = $_GET['password'];
        $code = $_GET['device'];
        //
        //   $result=$this->gencode_post($loginName,$code);
        //   $gencode=json_decode($result);
        // if($gencode['status']==200){
        $userimpl = new UserImpl();
        $data = $userimpl->selecetUsersByLoginNameAndPassword($loginName, $pass);

        //把获取的id存储在session中
        if (!is_null($data)) {

            //把用户的id放入session
            $id = $data['user_id'];
            $name = md5(md5(SALT_MD5 . $id));
            session($name, $id);
            if ('wx' == $code) {

                $this->response(json_encode($data), 'json');
            } else {
                $this->response(json_uid(200, 'success', $data, $name), 'json');
            }
        } else {

            $this->response(json(200,'登录失败'), 'json',404);
        }


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


    /**
     *退出登录loginout
     */
    function loginout()
    {
        $userid = $_GET['id'];

        $name = md5(md5(SALT_MD5 . $userid));
        $userimpl=new UserImpl();
        $userimpl->loginout($userid);
        session($name, null);
        cookie('name',null);
        $this->response(json_encode(array("result"=>200)),'json');
        
    }


    /**
     *post
     */
    function updateUsersBySelective_post()
    {
        $userimpl = new UserImpl();
        $param = getParameter(file_get_contents('php://input'));
        $code = $param['device'];
        $userlist = array(
            'phone' => $param['phone'],
            'user_id' => $param['userId'],
            'nickname' => $param['nickname'],
            'gender' => $param['gender'],
            'birthday' => $param['strBirthday'],

            'signature' => $param['signature']
        );
        $guidecardid=$param['guide_id_card_no'];


        $data = $userimpl->updateTbUsersByPrimaryKeySelective($userlist);

        if ('wx' == $code) {
            $resu = array(
                "result" => $data
            );

            $this->ajaxReturn(json_encode($resu), 'json');
        } else {
            self::returnBack($data);
        }
        
    }


    /**
     *post
     */
    function updateApplyVisitorToGuide_post()
    {
        $userimpl = new UserImpl();
        $param = getParameter(file_get_contents('php://input'));

        $data = $userimpl->updateApplyVisitorToGuide($param['userId'], $param['guideIdCardNo']);
        self::returnBack($data);

    }

    /**
     * 上传照片
     */
    function uploadImage_post()
    {
        $content=file_get_contents('php://input');
        $name=getParameter($content);
        $base64=$name['base64'];

        $base64_image = str_replace(' ', '+', $base64);

        //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
        if (preg_match('/^(data:\s*img\/(\w+);base64,)/', $base64_image, $result)){
            var_dump('bogod');
            //匹配成功
            if($result[2] == 'jpeg'){
                $image_name = uniqid().'.jpg';

            }else{
                $image_name = uniqid().'.'.$result[2];
            }
            $image_file = "./Public/userimage/{$image_name}";
            //服务器文件存储路径
            if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))){
                return $image_name;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

}
