<?php
namespace Test;

use bemang\Session\ArraySession;

class SessionTest extends \PHPUnit\Framework\TestCase
{
    protected $sessionInstance;

    public function testAllFunction()
    {
        require_once(__DIR__ . '/../vendor/autoload.php');
        $array = [];
        $this->sessionInstance = new ArraySession($array);
        $this->sessionInstance->set('testunit', 'test');
        $this->assertEquals('test', $array['testunit']);
        $this->assertEquals('test', $this->sessionInstance->get('testunit'));
        $this->assertTrue($this->sessionInstance->has('testunit'));
        $this->sessionInstance->set('testunit', 'test2');
        $this->assertEquals('test2', $array['testunit']);
        $this->assertEquals('test2', $this->sessionInstance->get('testunit'));
        $this->sessionInstance->delete('testunit');
        $this->assertArrayNotHasKey('testunit', $array);
        $this->assertFalse($this->sessionInstance->has(uniqid()));
    }
}
