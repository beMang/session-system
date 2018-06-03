<?php

use bemang\Session\PHPSession;
use bemang\Session\ArraySession;
use bemang\Session\Flash\FlashService;

require_once('vendor/autoload.php');

$array = [];
$service = new FlashService(new PHPSession());
//$service->flash('hello', 'coucou ma biche');
//$service->flash('hello2', 'salut ma couille');
echo $service->get('hello');
echo $service->get('hello');

var_dump($_SESSION);
