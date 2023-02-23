<?php
// order1 route -> views/order-form1.html
// summary route -> views/order-summary.html


//This is my controller

//Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');
//require_once('model/data-layer.php');
//require_once('model/validate.php');
//require_once('classes/order.php');

//Start a session AFTER requiring autoload.php
session_start();


$myOrder = new Order();


/*
$myOrder->setFood("tacos");
echo $myOrder->getFood();
$myOrder->setMeal("tacos1");
echo $myOrder->getMeal();
$myOrder->setCondiments("tacos2");
echo $myOrder->getCondiments();
var_dump($myOrder);*/

/*
$food1 = "tacos";
$food2 = "";
$food3 = "x";
echo validFood($food1) ? "valid" : "not valid";
echo validFood($food2) ? "valid" : "not valid";
echo validFood($food3) ? "valid" : "not valid";
*/

//var_dump(getMeals());

//Instantiate F3 Base class
$f3 = Base::instance();

//Instantiate a Controller object
$con = new Controller($f3);

//Define a default route(328/diner)
$f3->route('GET /', function(){
    $GLOBALS['con']->home();

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

    $GLOBALS['con']->order1();
});

//Define a order2 route(328/diner/order2)
$f3->route('GET|POST /order2', function($f3){

    //Instantiate a view
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move data from POST array to SESSION array
/*        $newOrder = $_SESSION['newOrder'];
        $condString = implode(",",$_POST['conds']);
        $newOrder->setCondiments($condString);
        $_SESSION['newOrder'] = $newOrder;
*/

        $condString = implode(' ,', $_POST['conds']);
        $_SESSION['newOrder']->setCondiments($condString);
        //Redirect to summary page
        $f3->reroute('summary');
    }
    $f3->set('condiments',DataLayer::getCondiments());
    $view = new Template();
    echo $view -> render("views/order2.html");
});


//Define a summary route(328/diner/breakfast)
$f3->route('GET /summary', function(){

    //write to Database
    //Instantiate a view
    $view = new Template();
    echo $view -> render("views/summary.html");

    //Destroy session array so the data won't be saved. order 1 = break, order 2 = breakfast.
    session_destroy();
});

//1. Help each other get caught up

//2. Define a lunch route + page

//3. Add an image to breakfast and/or lunch

//Run Fat Free
$f3->run();