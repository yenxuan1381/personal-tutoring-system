<?php
spl_autoload_register('myAutoLoader1');

function myAutoLoader1($className){
    $path = "";
    $extension = ".php";
    $fullPath = $path.$className.$extension;
    include_once  $fullPath;
}
?>