<?php


namespace web\work\assessment;
use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{
    public function testRegex()
    {
        $regex = '/^\/(?P<controller>[a-zA-Z]+)\/(?P<function>[a-zA-Z]+)$/';
        $path = '/hello/world';
        $matches = [];
        $result = preg_match($regex, $path, $matches);
        $this->assertEquals(1, $result);
        $this->assertEquals('hello', $matches['controller']);
        $this->assertEquals('world', $matches['function']);
    }
}