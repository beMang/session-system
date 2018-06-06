# session-system
Librairie pour gérer les session en php

## Installation

```composer require bemang/session-system```

# Usage

```php
require_once('vendor/autoload.php');

$session = new bemang\Session\PHPSession();
$session->set('hello', 'hello world');
$session->get('hello'); //Return hello world

//or array session
$array = ["hello", "hello world !"];
$session = new bemang\Session\ArraySession($array); //Array is passed as reference
$session->set('hello', 'hello world');
$session->get('hello'); //Return hello world
```
