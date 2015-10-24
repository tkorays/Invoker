<?php

namespace Invoker;

class AutoLoaderPSR4 {
    private $prefix_map = [];
    protected static $instance = null;
    public function __construct(){}
    public function __clone(){}
    static function GetInstance(){
        if(!(self::$instance instanceof self)){
            self::$instance = new AutoLoaderPSR4();
        }
        return self::$instance;
    }
    private function _RegNamespace($prefix,$dir){
        array_push($this->prefix_map,[$prefix,$dir]);
    }
    static function RegNamespace($prefix,$dir){
        $inst = self::GetInstance();
        $inst->_RegNamespace($prefix,$dir);
    }
    static function RegNamespaces($m){
        $inst = self::GetInstance();
        foreach($m as $a){
            $inst->_RegNamespace($a[0],$a[1]);
        }
    }
    static function FetchNamespaces(){
        return self::GetInstance()->prefix_map;
    }
    static function AutoLoadStart(){
        spl_autoload_register(function($class){
            $inst = self::GetInstance();
            foreach($inst->prefix_map as $a){
                $len = strlen($a[0]);
                if(strncmp($a[0],$class,$len)!==0){
                    continue;
                }
                $relative_class = substr($class,$len);
                $file = $a[1] . str_replace('\\', '/', $relative_class) . '.php';
                if(file_exists($file)){
                    require $file;
                }
            }
        });
    }

}