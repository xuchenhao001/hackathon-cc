<?php
namespace Home\Model;
/**
 * Created by PhpStorm.
 * User: KEN
 * Date: 2016/5/8
 * Time: 15:12
 */
class File
{
    private $_dir;
    const EXT='.txt';
    public function __construct()
    {
        $this->_dir=dirname(__FILE__);
    }

    
    public function cacheData($key,$value='',$path=''){
        $filename=$this->_dir.$path.$key.self::EXT;
        if($$value!==''){
            if(is_null($value)){
               return  @unlink($filename);
            }

            //写入缓存
            $dir=dirname($filename);
            if(is_dir($dir)){
                mkdir($dir,0777);
            }
            //string 
            return file_put_contents($filename,json_encode($value));
        }
        if(!is_file($filename)){
            return FALSE;
        }else{
            return json_decode(file_get_contents($filename),true);
        }
    }

}