<?php 

namespace Boor;

class Singleton {

    private $singletons = [];

    protected static $instance;
    private function __construct(){}
    private function __clone(){}
    public static function getInstance(){
        if(!(self::$instance instanceof self)){
            self::$instance = new Self();
        }
        return self::$instance;
    }

    public function Wrap($classname,$name=null){
        $usename = $name==null?$classname:$name;
        if(array_key_exists($usename,$this->singletons)){
            return $this->singletons[$usename];
        }
        $this->singletons[$usename] = new $classname();
        return $this->singletons[$usename];
    }
    public function Fetch($name){
        if(array_key_exists($name,$this->singletons)){
            return $this->singletons[$name];
        }else{
            return null;
        }
    }
    public function Remove($name){
        if(array_key_exists($name,$this->singletons)){
            unset($this->singletons[$name]);
        }
    }

}


