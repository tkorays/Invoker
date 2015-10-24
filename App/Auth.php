<?php
namespace App;

class Auth{
    static function say($para){
        var_dump($para);
        echo "say hello from app auth\n";
    }
    static function Login($para){
        echo "Login Page";
    }
}