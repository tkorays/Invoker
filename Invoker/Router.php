<?php
namespace Invoker;

class Router{
    private $route_map;
    static function Parse($config,$method,$vpath,$get,$post){
        $dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) use($config) {
            foreach($config as $a){
                $r->addRoute($a['method'],$a['pattern'],$a['handler']);
            }
        });
        $info = $dispatcher->dispatch($method,$vpath);
        switch($info[0]){
            case \FastRoute\Dispatcher::NOT_FOUND:
                echo "not found!";
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                echo "method not allowed!";
                break;
            case \FastRoute\Dispatcher::FOUND:
                call_user_func($info[1],$info[2]);
                break;
        }
    }
}