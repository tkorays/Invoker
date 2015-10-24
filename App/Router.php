<?php
namespace App;

return [
    [
        'method'=>['GET','POST'],
        'pattern'=>'/404',
        'handler'=>function(array $param){
            echo '404';
        }
    ],
    [
        'method'=>'GET',
        'pattern'=>'/user/{id:\d+}',
        'handler'=>function(array $param){
            echo "user";
            var_dump($param);
        }
    ],
    [
        'method'=>'GET',
        'pattern'=>'/auth/login',
        'handler'=>"\\App\\Auth::Login"
    ],
    [
        'method'=>'GET',
        'pattern'=>'/info',
        'handler'=>function(array $param){
            echo 'info';
        }
    ]
];