<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "";
    $extension = ".php";
    $fullPath = $path.$className.$extension;
    include_once $fullPath;
}
?>