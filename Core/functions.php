<?php

use Core\Response;

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "<pre>";

    die();
}

function isURI($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN){
    if(! $condition){
        abort($status);
    }
}

function base_path($value){
    return BASE_PATH . $value;
}

function views($value, $attributes = []){
    extract($attributes);

    require base_path("views/".$value);
}