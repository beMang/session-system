<?php

use bemang\Session\PHPSession;
use bemang\Session\ArraySession;

require_once('vendor/autoload.php');

$session = new PHPSession();
$session->set('test1', 'jkflmdqsjm');
$session->set('test2', ['hello',' m']);

var_dump($_SESSION);

$myArray = [
    "hello" => "coucou ma biche"
];

$arraySession = new ArraySession($myArray);

$arraySession->set('test1', 'hello');

var_dump($myArray);
