<?php 
require "Singleton.php";

class St {
    private $a = null;
    public function test(){
        if(!$this->a){
            $this->a = 5;
        }
        echo $this->a;
        $this->a = 6;
    }
    
}

$t = Boor\Singleton::getInstance();

$t->Wrap(St::class,'st');
$t->Fetch('st')->test();
$t->Remove('st');

$t->Fetch('st')->test();

