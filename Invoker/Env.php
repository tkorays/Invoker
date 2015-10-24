<?php

namespace Invoker;

class Env{

    static function GetRequestInfo(){
        //var_dump($_SERVER);
        $reqstr = substr($_SERVER['REQUEST_URI'],strlen($_SERVER['SCRIPT_NAME']));
        $qstr = $_SERVER['argv'][0];
        $len = strlen($qstr);
        $vpath = substr($reqstr,0,strlen($reqstr)-($len>0?$len+1:$len));
        return [
            'remote_addr'=>$_SERVER['REMOTE_ADDR'],
            'user_agent' =>$_SERVER['HTTP_USER_AGENT'],
            'vpath'      =>rawurldecode($vpath),
            'qstr'       =>$_SERVER['argv'][0],
            'method'     =>$_SERVER['REQUEST_METHOD']
        ];
    }
    static function Method(){
        return $_SERVER['REQUEST_METHOD'];
    }
    static function Vpath(){
        return self::GetRequestInfo()['vpath'];
    }
    static function GET($name){
        if(!array_key_exists($name,$_GET)){
            return null;
        }
        return $_GET[$name];
    }
    static function AllGETs(){
        return $_GET;
    }
    static function POST($name){
        if(!array_key_exists($name,$_POST)){
            return null;
        }
        return $_POST[$name];
    }
    static function AllPOSTs(){
        return $_POST;
    }
}