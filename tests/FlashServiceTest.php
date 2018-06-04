<?php

namespace Test;

use bemang\Session\ArraySession;
use bemang\Session\Flash\FlashService;

class FlashServiceTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        require(__DIR__ . '/../vendor/autoload.php');
    }

    public function testFlashService(Type $var = null)
    {
        $array = [];
        $session = new ArraySession($array);
        $flashService = new FlashService($session);
        $flashService->flash('test1', 'hello ceci est un test');
        $this->assertEquals($array[FlashService::SESSION_KEY]['test1'], $flashService->get('test1'));
        $this->assertArrayNotHasKey('test1', $array[FlashService::SESSION_KEY]);
        $this->assertEquals('hello ceci est un test', $flashService->get('test1'));
        $this->assertEmpty($flashService->get(uniqid()));
    }

    public function testFlashWithInvalidName()
    {
        $array = [];
        $session = new ArraySession($array);
        $flashService = new FlashService($session);
        $this->expectExceptionMessage('Le ne nom du flash peut pas être vide');
        $flashService->flash('', 'hello ceci est un test');
    }

    public function testFlashWithInvalidMessage()
    {
        $array = [];
        $session = new ArraySession($array);
        $flashService = new FlashService($session);
        $this->expectExceptionMessage('Le message ne peut pas être vide');
        $flashService->flash('test2', '');
    }
}
