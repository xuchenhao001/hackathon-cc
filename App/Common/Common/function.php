<?php
/**
 * Created by PhpStorm.
 * User: KEN
 * Date: 2016/5/13
 * Time: 19:54
 */

/*按照JSON方式输出通信数据
* @param integer $code 状态码
* @param string $message 提示信息
* @param array $data 数据
* return string
*/
function json($code,$message='',$data=array())
{
    if (!is_numeric($code)) {
        return '';
    }
    $result = array('code' => $code,
        'message' => $message,
    );
    if (count($data) > 0) {

     $result['data']=$data;
    }
   return $result;

}
function json_uid($code,$message='',$data=array(),$uid){
     if(!is_null($uid)){
         return array('code'=>$code,
             'uid'=>$uid,
             'message'=>$message,
             'data'=>$data);
     }else{
         return json($code,$message,$data);
     }
    
}

function getParameter($requparam){
    if(!is_null($requparam)) {
        $arr = explode('&', $requparam);
        $result = array();
        foreach ($arr as $value) {
            $node = explode('=', $value);
            $result[$node[0]] = $node[1];
        }

        return $result;
    }else{
        return null;
    }
    
}


