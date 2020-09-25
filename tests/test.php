<?php
//declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class Test extends TestCase
{
    public function testGetUrlLocation()
    {
        //  include $_SERVER['DOCUMENT_ROOT'].'/links/includes/config.php';
        //  include $_SERVER['DOCUMENT_ROOT'].'/links/short/includes/functions.php';
        $this->assertEquals(
            'https://www.google.com/',
            getUrlLocation('google')
        );
    }
}
