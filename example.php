<?php

require('./vendor/autoload.php');

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use PHPUnit\Framework\TestCase;

class Example extends TestCase
{
    protected $webDriver;

    public function setUp(): void
    {
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', DesiredCapabilities::chrome());
    }

    public function tearDown(): void
    {
        $this->webDriver->quit();
    }

    public function testIsTitleCorrect()
    {
        $this->webDriver->get('https://www.github.com/');
        $this->assertEquals(
            'The world’s leading software development platform · GitHub',
            $this->webDriver->getTitle()
        );
    }
}
