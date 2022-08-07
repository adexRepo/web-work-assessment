<?php

namespace web\work\assessment\Config;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testGetConnection()
    {
        $connection = Database::getConnection();
        self::assertNull($connection);
    }

    public function testGetConnectionSingleton()
    {
        $connection1 = Database::getConnection();
        $connection2 = Database::getConnection();
        self::assertSame($connection1,$connection2);
    }
}