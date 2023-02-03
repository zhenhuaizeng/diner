<?php
// order1 route -> views/order-form1.html
// summary route -> views/order-summary.html


//This is my controller

//Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Start a session
session_start();

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

//Define a lunch route(328/diner/breakfast)
$f3->route('GET|POST /order1', function($f3){


    var_dump($_POST);
    //If the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //move data from POST array to SESSION array
        $_SESSION['food'] = $_POST['food'];
        $_SESSION['meal'] = $_POST['meal'];

        //Redirect to summary page
        $f3 -> reroute('order2');
    }
    //Instantiate a view
    $view = new Template();
    echo $view -> render("views/order1.html");
});

//Define a order2 route(328/diner/order2)
$f3->route('GET|POST /order2', function(){

    //Instantiate a view
    $view = new Template();
    echo $view -> render("views/order2.html");
});


//Define a summary route(328/diner/breakfast)
$f3->route('GET /summary', function(){

    //Instantiate a view
    $view = new Template();
    echo $view -> render("views/summary.html");
});

//1. Help each other get caught up

//2. Define a lunch route + page

//3. Add an image to breakfast and/or lunch

//Run Fat Free
$f3->run();