<?php

//This is my controller

//Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//Instantiate F3 Base class
$f3 = Base::instance();

//Define a default route(328/diner)
$f3->route('GET /', function(){

    //Instantiate a view
    $view = new Template();
    echo $view -> render("views/diner-home.html");
});

//Define a breakfast route(328/diner/breakfast)
$f3->route('GET /breakfast', function(){

    //Instantiate a view
    $view = new Template();
    echo $view -> render("views/breakfast.html");
});

//Define a lunch route(328/diner/breakfast)
$f3->route('GET /lunch', function(){

    //Instantiate a view
    $view = new Template();
    echo $view -> render("views/lunch.html");
});
//1. Help each other get caught up

//2. Define a lunch route + page

//3. Add an image to breakfast and/or lunch

//Run Fat Free
$f3->run();