<?php
use PHPUnit\Framework\TestCase;
use CraftPluginGenerator\Classes\StringHelper;

class StringHelperTest extends TestCase
{

    public function testLowerNoSpaces()
    {
        $output = StringHelper::lowerNoSpaces('TeST StRing');
        $this->assertEquals($output, 'teststring');
    }

    /**
     * Return string as uppercase
     * @param $str
     * @return mixed
     */
    public function testUpper()
    {
        $output = StringHelper::upper('TeST StRing');
        $this->assertEquals($output, 'TEST STRING');
    }


    public static function testUpperNoSpaces()
    {
        $output = StringHelper::upperNoSpaces('TeST StRing');
        $this->assertEquals($output, 'TESTSTRING');
    }

    /**
     * Return string as camelCase
     * @param $str
     * @param array $noStrip
     * @return mixed
     */
    public function testCamelCase()
    {
        $output = StringHelper::upperNoSpaces('TeST StRing');
        $this->assertEquals($output, 'testString');
    }

    /**
     * Replace array of strings
     * @param $replaceList
     * @param $string
     * @return mixed
     */
    public function testStringReplaceArray()
    {
        $output = StringHelper::sringReplaceArray(['hello' => 'hola', 'world' => 'mundo'], 'hello world');
        $this->assertEquals($output, 'hola mundo');
    }



}