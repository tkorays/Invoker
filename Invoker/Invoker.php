<?php
namespace Invoker;
require_once "AutoLoaderPSR4.php";
require_once "Router.php";
require_once "Env.php";

define('INVOKER','inv');

class Invoker {
    static function Bootstrap($app,$config='LoaderConfig'){
        // AutoLoader
        AutoLoaderPSR4::RegNamespaces(include $app.'/'.$config.'.php');
        AutoLoaderPSR4::AutoLoadStart();

        // Router Parse
        Router::Parse(include $app."/Router.php",Env::Method(),Env::Vpath(),Env::AllGETs(),Env::AllPOSTs());
    }
}



