<?php
namespace Test;

use bemang\Session\PHPSession;
use bemang\Session\ArraySession;

class SessionTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        require_once(__DIR__ . '/../vendor/autoload.php');
    }
    
    public function testArraySession()
    {
        $array = [];
        $session = new ArraySession($array);
        $session->set('testunit', 'test');
        $this->assertEquals('test', $array['testunit']);
        $this->assertEquals('test', $session->get('testunit'));
        $this->assertTrue($session->has('testunit'));
        $session->set('testunit', 'test2');
        $this->assertEquals('test2', $array['testunit']);
        $this->assertEquals('test2', $session->get('testunit'));
        $session->delete('testunit');
        $this->assertArrayNotHasKey('testunit', $array);
        $this->assertFalse($session->has(uniqid()));
    }

    /**
     * @runInSeparateProcess
     */
    public function testPHPSession()
    {
        $session = new PHPSession();
        $this->assertFalse($session->has('test1'));
    }

    public function testSetWithInvalidKey()
    {
        $array = [];
        $session = new ArraySession($array);
        $this->expectExceptionMessage('La clé est invalide');
        $session->set('', 'test');
    }

    public function testGetWithInvalidKey()
    {
        $array = [];
        $session = new ArraySession($array);
        $this->expectExceptionMessage('La clé est invalide');
        $session->get('', 'test');
    }

    public function testGetWithUnknowKey()
    {
        $array = [];
        $session = new ArraySession($array);
        $this->assertEquals('test', $session->get('hello', 'test'));
    }

    public function testDeleteWithInvalidKey()
    {
        $array = [];
        $session = new ArraySession($array);
        $this->expectExceptionMessage('La clé est invalide');
        $session->delete('');
    }

    public function testDeleteWithUnknowKey()
    {
        $array = [];
        $session = new ArraySession($array);
        $this->assertFalse($session->delete('hello'));
    }

    public function testHasWithInvalidKey()
    {
        $array = [];
        $session = new ArraySession($array);
        $this->expectExceptionMessage('La clé est invalide');
        $session->has('');
    }
}
