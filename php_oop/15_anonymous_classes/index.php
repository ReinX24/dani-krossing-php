<?php

include_once "classes/SimpleClass.class.php";

// Regular class
$obj = new SimpleClass();
$obj->helloWorld();

// Anonymous class
$newObj = new class()
{
    public function helloWorld()
    {
        echo "Hello World!";
    }
};

$newObj->helloWorld();
