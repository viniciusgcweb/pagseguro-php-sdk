<?php

include_once 'source/Config.php';

class ConfigTest extends \PHPUnit\Framework\TestCase
{
    public function testEnv()
    {
        Conf::setProduction();
        $this->assertEquals(false, Conf::isSandbox());

        Conf::setSandbox();
        $this->assertEquals(true, Conf::isSandbox());
    }
    public function testToken()
    {
        Conf::setProduction();
        $this->assertEquals(32, strlen(Conf::getToken()));

        Conf::setSandbox();
        $this->assertEquals(32, strlen(Conf::getToken()));
    }

    public function testUrl()
    {
        Conf::setProduction();
        $this->assertEquals('https://ws.pagseguro.uol.com.br/', URL::getWs());
        $this->assertEquals('https://pagseguro.uol.com.br/', URL::getPage());
        $this->assertEquals('https://stc.pagseguro.uol.com.br/', URL::getStc());


        Conf::setSandbox();
        $this->assertEquals('https://ws.sandbox.pagseguro.uol.com.br/', URL::getWs());
        $this->assertEquals('https://sandbox.pagseguro.uol.com.br/', URL::getPage());
        $this->assertEquals('https://stc.sandbox.pagseguro.uol.com.br/', URL::getStc());
    }
}
