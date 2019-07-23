<?php


function classAutoloader($class)
{
    $class = strtolower($class);
    $path = "includes/{$class}.php";

    if (file_exists($path)){
        require_once "$path";
    }else{
        die("This file named {$class}.php not found");
    }
}

spl_autoload_register('classAutoloader');



function redirect($location)
{
    header("Location: {$location}");
}
